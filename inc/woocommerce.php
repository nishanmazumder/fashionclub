<?php

/**
 *  Woocommerce
 * 
 * @package NM_THEME
 */


// Shop page
require_once NM_DIR_PATH . '/inc/woocommerce/shop.php';

// Single product
require_once NM_DIR_PATH . '/inc/woocommerce/single.php';

require_once NM_DIR_PATH . '/inc/woocommerce/woo-single.php';

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

//Product Home 
add_action('wp_ajax_get_top_products', 'get_filter_products2');
add_action('wp_ajax_nopriv_get_top_products', 'get_filter_products2');

//Sidebar - CATEGORIES || COLOR || SIZE
add_action('nm_woo_get_categories', 'nm_woo_categories', 10);
add_action('nm_woo_get_colors', 'nm_woo_colors', 10);
add_action('nm_woo_get_sizes', 'nm_woo_sizes', 10);

//Cart 
add_action('nm_get_cart', 'nm_cart', 10);
add_filter('woocommerce_add_to_cart_fragments', 'nm_cart_count');
function nm_cart()
{
   echo '<a href="' . wc_get_cart_url() . '" class="w3view-cart" name="nm_cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><div id="mini-cart-count"></div></a>';
}

//Checkout
add_filter('woocommerce_checkout_fields', 'nm_woo_remove_fields');
function nm_woo_remove_fields($fields)
{
   // Add new fields
   // $fields['billing']['billing_user_name'] = array(
   //    'label' => __("Your Name", "nm_theme"),
   //    'type'  => 'text',
   //    'required' => true,
   //    'class' => array('form-row-wide'),
   //    'priority' => 26,
   // );

   $fields['billing']['billing_phone']['priority'] = 26;
   $fields['billing']['billing_email']['priority'] = 27;
   $fields['billing']['billing_state']['priority'] = 28;
   $fields['billing']['billing_city']['priority'] = 29;

   // Remove fields
   // unset($fields['billing']['billing_first_name']);
   // unset($fields['billing']['billing_last_name']);
   unset($fields['billing']['billing_company']);
   unset($fields['billing']['billing_postcode']);
   unset($fields['billing']['billing_country']);
   unset($fields['billing']['billing_address_2']);
   // unset($fields['billing']['billing_state']);

   unset($fields['shipping']['shipping_company']);
   unset($fields['shipping']['shipping_postcode']);
   unset($fields['shipping']['shipping_country']);
   unset($fields['shipping']['shipping_address_2']);

   return $fields;
}

// Add checkout field data to order details
// add_action('woocommerce_checkout_update_order_meta', 'nm_woo_add_new_field_to_oderder');
// function nm_woo_add_new_field_to_oderder($order_id)
// {
//    if (!empty($_POST['billing_user_name'])) {
//       update_post_meta($order_id, 'billing_user_name', sanitize_text_field($_POST['billing_user_name'])); 
//    }
//    // echo '<p><b>Text:</b> '. get_post_meta($order->get_id(), '_user_name', true) . '</p>';
// }


// add_action( 'woocommerce_email_after_order_table', 'nm_woo_add_new_field_to_order_table_email', 10, 4 );
// function nm_woo_add_new_field_to_order_table_email($order, $sent_to_admin, $plain_text, $email){
//    echo '<p><b>Text:</b> '. get_post_meta($order->get_id(), '_user_name', true) . '</p>';
// }

// Set default country Bangladesh
add_filter('default_checkout_billing_country', 'nm_set_default_country');
function nm_set_default_country()
{
   return "BD";
}

function nm_cart_count($fragments)
{
   ob_start();
   $items_count = WC()->cart->get_cart_contents_count();
?>
   <span id="mini-cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
<?php
   $fragments['#mini-cart-count'] = ob_get_clean();
   return $fragments;

   //force refresh : $(document.body).trigger('wc_fragment_refresh');
}

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

// getting taxonomy slug by name
// function get_taxnomy_slug(){

//    $attribute_taxonomies = wc_get_attribute_taxonomies();
//    $taxonomy_terms = array();

//    if ($attribute_taxonomies) :
//       foreach ($attribute_taxonomies as $tax) :
//          if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
//             $taxonomy_terms[$tax->attribute_name] = get_terms(wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0');
//          endif;
//       endforeach;
//    endif;

//    echo '<pre>'; 

//    print_r(wc_attribute_taxonomy_name('size'));
//    print_r($taxonomy_terms);
// }

// Get product Color
function nm_woo_colors()
{

   // style.css line no: 1041
   // .ecommerce_color ul li a i {background: #0000F7;}
   //    .ecommerce_color ul li:nth-child(2) a i {
   //       background: #6D757A;
   //   }
   //   .ecommerce_color ul li:nth-child(3) a i {
   //       background: green;
   //   }
   //   .ecommerce_color ul li:nth-child(4) a i {
   //       background: red;
   //   }
   //   .ecommerce_color ul li:nth-child(5) a i {
   //       background: yellow;
   //   }
   //   .ecommerce_color ul li:nth-child(6) a i {
   //       background: #0000ff;
   //   }

   $get_colors = get_terms([
      'taxonomy' => 'pa_color',
      //'fields' => 'names',
      'hide_empty' => false,
   ]);

   foreach ($get_colors as $color) {
      echo '<li><a href="?filter_color=' . $color->slug . '"><i></i> ' . $color->name . '(' . $color->count . ')</a></li>';
   }
}

// Get product categories
function nm_woo_categories()
{

   $terms = get_terms(array(
      'taxonomy' => 'product_cat',
      'hide_empty' => true,
      'orderby' => 'name',
   ));

   if (!empty($terms) && is_array($terms)) {

      $allowed_tags = [
         'li' => [],
         'a' => [
            'href' => []
         ]
      ];

      foreach ($terms as $term) {
         echo wp_kses('<li><a href="/product-category/' . $term->slug . '">' . $term->name . '</a></li>', $allowed_tags);
      }
   }
}

//Get product sizes
function nm_woo_sizes()
{
   $get_sizes = get_terms('pa_size', array(
      'hide_empty' => false,
   ));

   foreach ($get_sizes as $size) {
      echo '<li><a href="?filter_size=' . $size->slug . '"> ' . $size->name . '</a></li>';
   }
}
