<?php

////////////////////////////// Composition and care
add_action('add_meta_boxes', 'create_product_composition_care_meta_box');
function create_product_composition_care_meta_box()
{
    add_meta_box(
        'composition_care_meta_box',
        __('Composition and care', 'cmb'),
        'add_composition_care_meta_box',
        'product',
        'normal',
        'default'
    );
}

// Metabox in product page
function add_composition_care_meta_box($post)
{
    $product = wc_get_product($post->ID);
    $content = $product->get_meta('_composition_care');

    echo '<div class="product_composition_care">';

    wp_editor($content, '_composition_care', ['textarea_rows' => 10]);

    echo '</div>';
}

// Save value
add_action('woocommerce_admin_process_product_object', 'save_composition_care_wysiwyg_field', 10, 1);
function save_composition_care_wysiwyg_field($product)
{
    if (isset($_POST['_composition_care']))
        $product->update_meta_data('_composition_care', wp_kses_post($_POST['_composition_care']));
}

// Display data as shortcode
function nm_woo_additional_info_cac()
{
    global $product;
    echo '<div class="wrapper-technical_specs">' . $product->get_meta('_composition_care') . '</div>';
}
add_shortcode('nm_woo_cac', 'nm_woo_additional_info_cac');


////////////////////////////////// Size Chart
add_action('add_meta_boxes', 'create_product_size_chart_meta_box');
function create_product_size_chart_meta_box()
{
    add_meta_box(
        'size_chart_meta_box',
        __('Size Chart', 'cmb'),
        'add_size_chart_meta_box',
        'product',
        'normal',
        'default'
    );
}

// Metabox in product page
function add_size_chart_meta_box($post)
{
    $product = wc_get_product($post->ID);
    $content = $product->get_meta('_size_chart');

    echo '<div class="product_size_chart">';

    wp_editor($content, '_size_chart', ['textarea_rows' => 10]);

    echo '</div>';
}

// Save value
add_action('woocommerce_admin_process_product_object', 'save_size_chart_wysiwyg_field', 11, 1);
function save_size_chart_wysiwyg_field($product)
{
    if (isset($_POST['_size_chart']))
        $product->update_meta_data('_size_chart', wp_kses_post($_POST['_size_chart']));
}

// Display data as shortcode
function nm_woo_additional_info_size_chart()
{
    global $product;
    echo '<div class="wrapper-size_chart">' . $product->get_meta('_size_chart') . '</div>';
}
add_shortcode('nm_woo_size', 'nm_woo_additional_info_size_chart');

///////////////////////////////// Shipping
add_action('add_meta_boxes', 'create_product_shipping_meta_box');
function create_product_shipping_meta_box()
{
    add_meta_box(
        'shipping_meta_box',
        __('Shipping', 'cmb'),
        'add_shipping_meta_box',
        'product',
        'normal',
        'default'
    );
}

// Metabox in product page
function add_shipping_meta_box($post)
{
    $product = wc_get_product($post->ID);
    $content = $product->get_meta('_shipping');

    echo '<div class="product_shipping">';

    wp_editor($content, '_shipping', ['textarea_rows' => 10]);

    echo '</div>';
}

// Save value
add_action('woocommerce_admin_process_product_object', 'save_shipping_wysiwyg_field', 13, 1);
function save_shipping_wysiwyg_field($product)
{
    if (isset($_POST['_shipping']))
        $product->update_meta_data('_shipping', wp_kses_post($_POST['_shipping']));
}

// Display data as shortcode
function nm_woo_additional_info_shipping()
{
    global $product;
    echo '<div class="wrapper-shipping">' . $product->get_meta('_shipping') . '</div>';
}
add_shortcode('nm_woo_shipping', 'nm_woo_additional_info_shipping');


//////////////////////////////////// Shipping
add_action('add_meta_boxes', 'create_product_returnExchange_meta_box');
function create_product_returnExchange_meta_box()
{
    add_meta_box(
        'returnExchange_meta_box',
        __('RETURNS AND EXCHANGES', 'cmb'),
        'add_returnExchange_meta_box',
        'product',
        'normal',
        'default'
    );
}

// Metabox in product page
function add_returnExchange_meta_box($post)
{
    $product = wc_get_product($post->ID);
    $content = $product->get_meta('_returnExchange');

    echo '<div class="product_returnExchange">';

    wp_editor($content, '_returnExchange', ['textarea_rows' => 10]);

    echo '</div>';
}

// Save value
add_action('woocommerce_admin_process_product_object', 'save_returnExchange_wysiwyg_field', 13, 1);
function save_returnExchange_wysiwyg_field($product)
{
    if (isset($_POST['_returnExchange']))
        $product->update_meta_data('_returnExchange', wp_kses_post($_POST['_returnExchange']));
}

// Display data as shortcode
function nm_woo_additional_info_returnExchange()
{
    global $product;
    echo '<div class="wrapper-size_chart">' . $product->get_meta('_returnExchange') . '</div>';
}
add_shortcode('nm_woo_returnExchange', 'nm_woo_additional_info_returnExchange');

