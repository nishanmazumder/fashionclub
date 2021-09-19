<?php

/**
 *  Woocommerce
 * 
 * @package NM_THEME
 */

//Main Container
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'nm_woo_main_container_start', 11);
add_action('woocommerce_after_main_content', 'nm_woo_main_container_end', 11);

//Remove sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

//Shop Layout
add_action('template_redirect', 'nm_load_shop_layout');

//Single Layout
add_action('template_redirect', 'nm_load_single_layout');

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

      //Product after loop
      remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash');

      //Rating remove
      remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

      //title tag change
      remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
      add_action('woocommerce_shop_loop_item_title', 'nm_product_title', 10);

      //add to cart remove
      remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
   }
}

//Single product
function nm_load_single_layout()
{
   if (is_product()) {
      //Remove all product summary
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
      //   remove_action('woocommerce_single_product_summary', '', );

      add_action('woocommerce_single_product_summary', 'nm_single_product_details', 99);

      // Remove Upsell
      remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
   }
}

function nm_single_product_details()
{

   global $post;
   $product = wc_get_product($post->ID);

   // echo '<pre>'; 
   // print_r($product);
   // wp_die();

?>

   <h3 class="item_name"><?php echo $product->get_name(); ?></h3>
   <p><?php echo $product->get_short_description(); ?></p>
   <div class="single-rating">
      <ul>
         <?php
         $average = $product->get_average_rating();
         $rating_left = 5 - $average;

         for ($i = 0; $i < round($average); $i++) {
            echo '<i class="fa fa-star yellow-star" aria-hidden="true"></i>';
         }

         for ($i = 0; $i < round($rating_left); $i++) {
            echo '<i class="fa fa-star gray-star" aria-hidden="true"></i>';
         }
         ?>
         <li class="rating"><?php echo $product->get_review_count(); ?> reviews</li>
         <li><a href="#">Add your review</a></li>
      </ul>
   </div>
   <div class="single-price">
      <ul>
         <?php
         $sale_price = $product->get_sale_price();
         $regular_price = $product->get_regular_price();
         ?>
         <li>$<?php echo $sale_price; ?></li>
         <?php if ($product->is_on_sale()) : ?>
            <li><del>$<?php echo $regular_price; ?></del></li>
            <li><span class="w3off"> <?php echo round(100 - ($sale_price / $regular_price * 100)); ?>% OFF</span></li>
            <li>Ends on: Oct,15th</li>
         <?php endif; ?>
         <li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Coupon</a></li>
      </ul>
   </div>

   <div class="nm_product_category">
      <ul>
         <li>Category :</li>
         <?php
         $arg = ['taxonomy' => 'product_cat'];
         $product_categories = wp_get_post_terms($post->ID, 'product_cat', $arg);

         if (!empty($product_categories) && is_array($product_categories)) {

            $allowed_tags = [
               'li' => [],
               'a' => [
                  'href' => [],
                  'class' => []
               ]
            ];

            foreach ($product_categories as $product_category) {
               echo wp_kses('<li><a href="'.site_url('product-category/').$product_category->slug.'" class="">' . $product_category->name . '</a></li>', $allowed_tags);
            }
         }
         ?>
      </ul>

   </div>

   <button type="submit" class="w3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
   <button class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>


<?php }


//Shop
function nm_woo_main_container_start()
{
   if (is_shop()) {
      echo '<div class="content"><div class="container">';
   } elseif (is_product()) {
      echo '<div class="products"><div class="container">';
   } else {
      echo '<div class="container">';
   }
}

function nm_woo_sidebar_container_start()
{
   echo '<div class="col-md-4 w3ls_dresses_grid_left">';
}

function nm_woo_sidebar_container_end()
{
   echo '</div>';
}

function nm_woo_product_container_start()
{
   echo '<div class="col-md-8 col-sm-8 women-dresses">';
}

function nm_woo_product_container_end()
{
   echo '</div>';
}

function nm_woo_main_container_end()
{
   if (is_shop() || is_product()) {
      echo '</div></div>';
   } else {
      echo '</div>';
   }
}


// Shop title
add_filter('woocommerce_show_page_title', 'nm_remove_title');
function nm_remove_title($bool)
{
   return false;
}

//Product Title
function nm_product_title(){
   echo '<h4>'.get_the_title().'</h4>';
}

//Page description
// add_action('woocommerce_archive_description', 'nm_archive_description');
// function nm_archive_description()
// {
//    echo "this is page description";
// }

//Add description after title
// add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt');

// Woocommerce remove breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// Woocommerce remove notice
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// Woocommerce filter
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

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

   check_ajax_referer('23#as14blak&&90ad1584', 'nonce');

   $category = $_POST['value'];
   $category_all = ['tshirts', 'hoodies', 'accessories'];

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
   } else {
      $args['tax_query'] = [
         [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $category_all,
         ]
      ];
   }

   $products = new WP_Query($args);

   $data = '';

   if ($products->have_posts()) :
      while ($products->have_posts()) : $products->the_post();
         global $product;

         $average = $product->get_average_rating();
         $rating_left = 5 - $average;

         $yellow_rate = '';
         for ($i = 0; $i < round($average); $i++) {
            $yellow_rate .= '<i class="fa fa-star yellow-star" aria-hidden="true"></i>';
         }

         $gray_rate = '';
         for ($i = 0; $i < round($rating_left); $i++) {
            $gray_rate .= '<i class="fa fa-star gray-star" aria-hidden="true"></i>';
         }

         $data .= '<div class="col-md-3 top-product-grids">';
         $data .= '<a href="' . esc_url(get_the_permalink()) . '">';
         $data .= '<div class="product-img">';
         $data .= woocommerce_get_product_thumbnail();
         $data .= '<div class="p-mask">';
         $data .= '<button class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> View Product</button>';
         $data .= '</div></div></a>';
         $data .= $yellow_rate . $gray_rate;
         $data .= '<h4>' . __(get_the_title(), 'nm_theme') . '</h4>';
         $data .= '<h5>' . $product->get_price_html() . '</h5>';
         $data .= '</div>';

      endwhile;
   endif;

   wp_reset_postdata();
   wp_send_json_success($data, 200);
   wp_die();
}
