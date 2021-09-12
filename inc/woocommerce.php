<?php

/**
 *  Woocommerce
 * 
 * @package NM_THEME
 */

//Remove sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');


//Main Container
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_after_main_content', 'nm_woo_main_container_end', 11);
add_action('woocommerce_before_main_content', 'nm_woo_main_container_start', 11);

add_action('template_redirect', 'nm_load_shop_layout');

function nm_load_shop_layout()
{
   if (is_shop()) {

      //Sidebar
      add_action('woocommerce_before_main_content', 'nm_woo_sidebar_container_start', 12);
      add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 13);
      add_action('woocommerce_before_main_content', 'nm_woo_sidebar_container_end', 14);

      //Product
      add_action('woocommerce_before_main_content', 'nm_woo_product_container_start', 15);
      add_action('woocommerce_after_main_content', 'nm_woo_product_container_end', 15);
   }
}

function nm_woo_main_container_start()
{
   echo '<div class="container"><div class="row">';
}

function nm_woo_sidebar_container_start()
{
   echo '<div class="col-md-4">';
}

function nm_woo_sidebar_container_end()
{
   echo '</div>';
}

function nm_woo_product_container_start()
{
   echo '<div class="col-md-8">';
}

function nm_woo_product_container_end()
{
   echo '</div>';
}

function nm_woo_main_container_end()
{
   echo '</div></div>';
}


// Shop title
add_filter('woocommerce_show_page_title', 'nm_remove_title');
function nm_remove_title($bool)
{
   return false;
}

//Page description
add_action('woocommerce_archive_description', 'nm_archive_description');
function nm_archive_description()
{
   echo "this is page description";
}

//Add description after title
add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt');


// Cart Ajax
/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
   global $woocommerce;

   ob_start();

?>
   <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
<?php
   $fragments['a.cart-customlocation'] = ob_get_clean();
   return $fragments;
}

// New section to Woocommerce settings
add_filter('woocommerce_get_sections_products', 'wcslider_add_section');
function wcslider_add_section($sections)
{

   $sections['wcslider'] = __('WC Slider', 'nm_theme');
   return $sections;
}

//Remove rating 

//remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);

// add_action('woocommerce_template_loop_rating', 'nm_rating', 6);

// function nm_rating()
// {
//    echo " bal";
// }

//Optional zip code checkout
add_filter('woocommerce_default_address_fields', 'nm_theme_optional_zip');
function nm_theme_optional_zip($p_fields)
{
   $p_fields['postcode']['required'] = false;
   return $p_fields;
}

//Product Home 
add_action('wp_ajax_get_top_products', 'get_filter_products2');
add_action('wp_ajax_nopriv_get_top_products', 'get_filter_products2');

function get_filter_products2()
{
   $category = $_POST['value'];

   $args = [
      'post_type'      => 'product',
      'post_status'  => 'publish',
      'orderby' => 'publish_date',
      'posts_per_page' => 8,
   ];

   if ($category != 'all') {
      $args['tax_query'] = [
         [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $category,
         ]
      ];
   }

   $products = new WP_Query($args);

   $data = '';

   if ($products->have_posts()) :
      while ($products->have_posts()) : $products->the_post();
         global $product;

         //$data .= '<div id="nmTabClass">';
         $data .= '<div class="col-md-3 top-product-grids">';
         $data .= '<a href="' . esc_url(get_the_permalink()) . '">';
         $data .= '<div class="product-img">';
         $data .= woocommerce_get_product_thumbnail();
         $data .= '<div class="p-mask">';
         $data .= '<button class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> View Product</button>';
         $data .= '</div></div></a>';
         $data .= '<h3>Rating</h3>';
         $data .= '<h4>' . __(get_the_title(), 'nm_theme') . '</h4>';
         $data .= '<h5>' . $product->get_price_html() . '</h5>';
         $data .= '</div>';
      //$data .= '</div></div>';

      endwhile;
   endif;

   wp_reset_postdata();
   wp_send_json_success($data, 200);
   wp_die();
}
