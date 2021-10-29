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

//Sidebar Categories - Category display
add_action('nm_woo_sidebar_categories', 'nm_woo_sidebar_categories_display', 10);
add_action('nm_woo_get_variation', 'nm_woo_get_variation_color', 10);

//Sidebar Categories - Color display
function nm_woo_get_variation_color()
{
   global $product;
   //$product = wc_get_products(get_the_id());

   //$color = $product->get_attribute('color' );

   //$koostis = array_shift( wc_get_product_terms( $product->id, 'color', array( 'fields' => 'names' ) ) );

   //$test = wc_get_attribute_taxonomies();

   // foreach(wc_get_attribute_taxonomies() as $attr){
   //    echo $attr->attribute_name;
   // } 

   // $args = [
   //    'post_type'      => 'product',
   //    'post_status'  => 'publish',
   //    'orderby' => 'publish_date',
   //    'posts_per_page' => 8,
   // ];

   // $args['tax_query'] = [
   //    [
   //       'taxonomy' => 'pa_color',
   //       'hide_empty' => false,
   //       'field'    => 'slug',
   //       'terms'    => 'yellow',
   //    ]
   // ];

   // $products = new WP_Query($args);

   // foreach($products as $test){
   //    echo '<pre>'; 
   //    print_r($test);
   // }

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

   $get_terms_color = get_terms([
      'taxonomy' => 'pa_color',
      //'fields' => 'names',
      'hide_empty' => false,
   ]);

   foreach ($get_terms_color as $color) {
      echo '<li><a href="' . $color->slug . '"><i></i> ' . $color->name . '(' . $color->count . ')</a></li>';
   }
}

function nm_woo_sidebar_categories_display()
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
