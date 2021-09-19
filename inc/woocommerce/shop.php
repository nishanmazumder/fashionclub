<?php

/**
 *  Woocommerce -Shop 
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

        // Woocommerce remove breadcrumb
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

        // Woocommerce remove notice
        remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

        // Woocommerce remove catalog
        remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

        //Price remove
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
        add_action('woocommerce_after_shop_loop_item_title', 'nm_shop_product_price', 10);
    }
}

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
function nm_product_title()
{
    echo '<h4>' . get_the_title() . '</h4>';
}

//Product price
function nm_shop_product_price()
{
    global $post, $woocommerce;
    $product = wc_get_product($post->ID);

    // if ($product->is_type('simple')) {
    //     if ($product->is_on_sale()) {
    //         echo '<h5 class="price">' . get_woocommerce_currency_symbol() . $product->get_sale_price() . '</h5>';
    //     } else {
    //         echo '<h5 class="price">' . get_woocommerce_currency_symbol() . $product->get_regular_price() . '</h5>';
    //     }
    // } elseif ($product->is_type('variable')) {
    //     echo '<h5 class="price">' . get_woocommerce_currency_symbol() . $product->get_name() . '</h5>';
    // }else{
    //     echo $product->get_price();
    // }

    echo '<h5 class="price">' . get_woocommerce_currency_symbol() . $product->get_price() . '</h5>';

}

//Page description
// add_action('woocommerce_archive_description', 'nm_archive_description');
// function nm_archive_description()
// {
//    echo "this is page description";
// }

//Add description after title
// add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt');

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

//Optional zip code checkout
add_filter('woocommerce_default_address_fields', 'nm_theme_optional_zip');
function nm_theme_optional_zip($p_fields)
{
    $p_fields['postcode']['required'] = false;
    return $p_fields;
}
