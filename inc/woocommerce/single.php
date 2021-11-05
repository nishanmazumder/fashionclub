<?php

/**
 *  Woocommerce -Single Product 
 * 
 * @package NM_THEME
 */

function nm_load_single_layout()
{
    if (is_product()) {

        //Remove product image
        remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
        remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

        add_action('woocommerce_before_single_product_summary', 'nm_single_product_image');


        //Remove all product summary
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
        
        //Single Variation data
        remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);

        //   remove_action('woocommerce_single_product_summary', '', );

        add_action('woocommerce_single_product_summary', 'nm_single_product_details', 10);
        add_action('woocommerce_single_product_summary', 'nm_single_add_to_cart', 11);

        // Remove Upsell
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    }
}

function nm_single_add_to_cart()
{
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
}


// Single Product Image + gallery
function nm_single_product_image()
{
    global $product;
    //$product = wc_get_product(get_the_ID());

    $feature_image = esc_url(get_the_post_thumbnail_url());
    $gallery_image_ids = $product->get_gallery_image_ids();
    //$attachment_ids = $product->get_id();
?>

    <div class="flexslider">
        <ul class="slides">
            <?php if (has_post_thumbnail()) : ?>
                <li data-thumb="<?php echo $feature_image; ?>">
                    <div class="thumb-image detail_images"> <img src="<?php echo $feature_image; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                </li>
                <?php
                foreach ($gallery_image_ids as $gallery_image_id) {
                    $attachment_urls = esc_url(wp_get_attachment_url($gallery_image_id)); ?>
                    <li data-thumb="<?php echo $attachment_urls; ?>">
                        <div class="thumb-image detail_images"> <img src="<?php echo $attachment_urls; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                    </li>
                <?php  }
            else :
                foreach ($gallery_image_ids as $gallery_image_id) {
                    $attachment_urls = esc_url(wp_get_attachment_url($gallery_image_id)); ?>
                    <li data-thumb="<?php echo $attachment_urls; ?>">
                        <div class="thumb-image detail_images"> <img src="<?php echo $attachment_urls; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                    </li>
            <?php  }
            endif; ?>

        </ul>
    </div>

<?php }


// Single Product details
function nm_single_product_details()
{
    global $product;
    //$product = wc_get_product(get_the_ID());
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
            ?>
            <li><?php echo get_woocommerce_currency_symbol() . $product->get_price(); ?></li>

            <?php
            if ($product->is_on_sale() && !$product->is_type('grouped')) {

                if ($product->is_type('simple')) {
                    $sale_price = $product->get_sale_price();
                    $regular_price = $product->get_regular_price();
                } elseif ($product->is_type('variable')) {
                    $sale_price = $product->get_variation_price();
                    $regular_price = $product->get_variation_regular_price();
                }
            ?>
                <li>
                    <del>
                        <?php echo get_woocommerce_currency_symbol() . $regular_price; ?>
                    </del>
                </li>

                <li><span class="w3off"> <?php echo round(100 - ($sale_price / $regular_price * 100)); ?>% OFF</span></li>
            <?php } ?>

            <?php
// https://stackoverflow.com/questions/66464462/how-to-get-coupons-from-email-restrictions-with-efficiency-in-woocommerce
// $coupons = get_posts( array(
			// 	'posts_per_page'   => -1,
			// 	'orderby'          => 'name',
			// 	'order'            => 'desc',
			// 	'post_type'        => 'shop_coupon',
			// 	'post_status'      => 'publish'
			// ) );

			// foreach( $coupons as $coupon) {
			// 	$strcode = strtolower($coupon->post_title);	
			// $full_coupon = new WC_Coupon( $strcode );
			// }

            //$has_coupon = count(WC()->cart->applied_coupons) > 0 ? true : false;
            // $coupon_code = WC()->session->get('coupon_code');

            // $coupon_code2 = WC()->cart->get_coupons();

            // $product_id = new WC_Coupon();

            // $parray = $product_id->get_product_ids();

            // echo '<pre>'; 
            // print_r($parray);

            // //if( WC()->cart->get_coupons() ) echo "Coupon applied";


            // if( WC()->cart->get_coupons() ){ 
            ?>
            <li>Ends on: Oct,15th</li>
            <li><a class="nm-coupon" href="#"><i class="fa fa-gift" aria-hidden="true"></i> Coupon</a></li>
            <?php //} 
            ?>
        </ul>
    </div>

    <div class="nm_product_category">
        <ul>
            <li>Category :</li>
            <?php
            $arg = ['taxonomy' => 'product_cat'];
            $product_categories = wp_get_post_terms(get_the_ID(), 'product_cat', $arg);

            if (!empty($product_categories) && is_array($product_categories)) {

                $allowed_tags = [
                    'li' => [],
                    'a' => [
                        'href' => [],
                        'class' => []
                    ]
                ];

                foreach ($product_categories as $product_category) {
                    echo wp_kses('<li><a href="' . site_url('product-category/') . $product_category->slug . '" class="">' . $product_category->name . '</a></li>', $allowed_tags);
                }
            }
            ?>
        </ul>

    </div>
    <!-- 
    <button type="submit" class="w3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
    <button class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button> -->

<?php }
