<?php

/**
 *  Woocommerce -Single Product 
 * 
 * @package NM_THEME
 */

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
            <?php if ($product->is_on_sale()) :
                $sale_price = $product->get_sale_price();
                $regular_price = $product->get_regular_price();
            ?>



                <li><del><?php echo get_woocommerce_currency_symbol() . $regular_price; ?></del></li>
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
                    echo wp_kses('<li><a href="' . site_url('product-category/') . $product_category->slug . '" class="">' . $product_category->name . '</a></li>', $allowed_tags);
                }
            }
            ?>
        </ul>

    </div>

    <button type="submit" class="w3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
    <button class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>


<?php }
