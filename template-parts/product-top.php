<?php

/**
 * Home - Product section
 * 
 * @package NM_FC
 */

?>

<div class="top-products">
    <div class="container">
        <h3>Top Products</h3>
        <div class="sap_tabs">
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <?php
                    $product_cats = [
                        "tshirts" => "Men's",
                        "hoodies" => "Women",
                        "accessories" => "Others"
                    ];

                    if (!empty($product_cats) && is_array($product_cats)) {
                        $allowed_tags = [
                            'li' => [
                                'class' => [],
                                'data-slug' => []
                            ],
                            'span' => []
                        ];

                        echo wp_kses('<li class="resp-tab-item" data-slug="all"><span>All</span></li>', $allowed_tags);
                        foreach ($product_cats as $product_slug => $product_cat) {
                            echo wp_kses('<li class="resp-tab-item" data-slug="' . $product_slug . '"><span>' . $product_cat . '</span></li>', $allowed_tags);
                        }
                    }

                    ?>
                </ul>
                <div class="clearfix"> </div>

                <div class="resp-tabs-container" id="nmProductsHome">
                    <div class="tab-1 resp-tab-content">

                        <?php

                        $category = ['tshirts', 'hoodies', 'accessories'];

                        $args = [
                            'post_type'      => 'product',
                            'post_status'         => 'publish',
                            'orderby' => 'publish_date',
                            'posts_per_page' => 8,
                            //'product_cat'    => 'hoodies'
                            'tax_query'           => [
                                [
                                    'taxonomy' => 'product_cat',
                                    'terms'    => $category,
                                    'field'    => 'slug',
                                ]
                            ]
                        ];

                        $products = new WP_Query($args);

                        if ($products->have_posts()) :
                            while ($products->have_posts()) : $products->the_post();
                                global $product;

                                $average = $product->get_average_rating();
                                $rating_left = 5 - $average;

                        ?>
                                <div class="col-md-3 top-product-grids">
                                    <a href="<?php esc_url(the_permalink()); ?>">
                                        <div class="product-img">
                                            <?php echo woocommerce_get_product_thumbnail(); ?>
                                            <div class="p-mask">
                                                <button class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> View Product</button>
                                            </div>
                                        </div>
                                    </a>

                                    <?php
                                    for ($i = 0; $i < round($average); $i++) {
                                        echo '<i class="fa fa-star yellow-star" aria-hidden="true"></i>';
                                    }

                                    for ($i = 0; $i < round($rating_left); $i++) {
                                        echo '<i class="fa fa-star gray-star" aria-hidden="true"></i>';
                                    }
                                    ?>

                                    <h4><?php esc_html_e(the_title(), 'nm_theme'); ?></h4>
                                    <h5><?php echo $product->get_price_html(); ?></h5>
                                </div>

                        <?php
                            endwhile;
                        endif;

                        wp_reset_postdata();


                        ?>


                        <!-- <div class="col-md-3 top-product-grids animated wow slideInUp" data-wow-delay=".5s">
                            <a href="single.html">
                                <div class="product-img">
                                    <img src="<?php echo NM_DIR_URI; ?>/assets/images/tp1.jpg" alt="" />
                                    <div class="p-mask">
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls1_item" value="Formal shoes" />
                                            <input type="hidden" name="amount" value="220.00" />
                                            <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                            <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                            <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                            <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                            <h4>Formal shoes</h4>
                            <h5>$220.00</h5>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>