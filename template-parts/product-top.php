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
        <div class="row">
            <?php

            $category = ['tshirts', 'hoodies'];
            $args = [
                'post_type'      => 'product',
                'post_status'         => 'publish',
                'posts_per_page' => 10,
                //'product_cat'    => 'hoodies'
                'tax_query'           => [
                    // Product category filter
                    [
                        'taxonomy' => 'product_cat',
                        'terms'    => $category,
                        'field'    => 'slug',
                    ]
                ]
            ];

            $products = new WP_Query($args);

            // echo '<pre>'; 
            // print_r($products);

            // if ($products->have_posts()) :
            //     while ($products->have_posts()) : $products->the_post();
            //         //global $product;
            //         echo '<br /><a href="' . get_permalink() . '">' . woocommerce_get_product_thumbnail() . ' ' . get_the_title() . '</a>';
            //     endwhile;
            // endif;

            wp_reset_postdata();


            ?>
        </div>
        <div class="sap_tabs">
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <?php
                    $product_cats = [
                        "mens" => "Men's",
                        "women" => "Women",
                        "others" => "Others"
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
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content">
                        <div class="col-md-3 top-product-grids tp1 animated wow slideInUp" data-wow-delay=".5s">
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
                        </div>
                        <div class="col-md-3 top-product-grids tp2">
                            <a href="single.html">
                                <div class="product-img">
                                    <img src="<?php echo NM_DIR_URI; ?>/assets/images/tp2.jpg" alt="" />
                                    <div class="p-mask">
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls1_item" value="Formal shirt" />
                                            <input type="hidden" name="amount" value="190.00" />
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
                            <h4>Formal shirt</h4>
                            <h5>$190.00</h5>
                        </div>
                        <div class="col-md-3 top-product-grids tp3">
                            <a href="single.html">
                                <div class="product-img">
                                    <img src="<?php echo NM_DIR_URI; ?>/assets/images/tp3.jpg" alt="" />
                                    <div class="p-mask">
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls1_item" value="Blazer" />
                                            <input type="hidden" name="amount" value="160.00" />
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
                            <h4>Blazer</h4>
                            <h5>$160.00</h5>
                        </div>
                        <div class="col-md-3 top-product-grids tp4">
                            <a href="single.html">
                                <div class="product-img">
                                    <img src="<?php echo NM_DIR_URI; ?>/assets/images/tp4.jpg" alt="" />
                                    <div class="p-mask">
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls1_item" value="Casual shoes" />
                                            <input type="hidden" name="amount" value="250.00" />
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
                            <h4>Casual shoes</h4>
                            <h5>$250.00</h5>
                        </div>
                        <div class="clearfix"></div>
                        <div class="top-products-set2">
                            <div class="col-md-3 top-product-grids tp5">
                                <a href="single.html">
                                    <div class="product-img">
                                        <img src="<?php echo NM_DIR_URI; ?>/assets/images/ip2.jpg" alt="" />
                                        <div class="p-mask">
                                            <form action="#" method="post">
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="w3ls1_item" value="Inner wear" />
                                                <input type="hidden" name="amount" value="50.00" />
                                                <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to
                                                    cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                <h4>Inner wear</h4>
                                <h5>$50.00</h5>
                            </div>
                            <div class="col-md-3 top-product-grids tp6">
                                <a href="single.html">
                                    <div class="product-img">
                                        <img src="<?php echo NM_DIR_URI; ?>/assets/images/shp8.jpg" alt="" />
                                        <div class="p-mask">
                                            <form action="#" method="post">
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="w3ls1_item" value="Shoes" />
                                                <input type="hidden" name="amount" value="150.00" />
                                                <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to
                                                    cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                <h4>Shoes</h4>
                                <h5>$150.00</h5>
                            </div>
                            <div class="col-md-3 top-product-grids tp7">
                                <a href="single.html">
                                    <div class="product-img">
                                        <img src="<?php echo NM_DIR_URI; ?>/assets/images/cap1.jpg" alt="" />
                                        <div class="p-mask">
                                            <form action="#" method="post">
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="w3ls1_item" value="Formal shirt" />
                                                <input type="hidden" name="amount" value="100.00" />
                                                <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to
                                                    cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                <h4>Formal shirt</h4>
                                <h5>$100.00</h5>
                            </div>
                            <div class="col-md-3 top-product-grids tp4">
                                <a href="single.html">
                                    <div class="product-img">
                                        <img src="<?php echo NM_DIR_URI; ?>/assets/images/wap3.jpg" alt="" />
                                        <div class="p-mask">
                                            <form action="#" method="post">
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="w3ls1_item" value="Watch" />
                                                <input type="hidden" name="amount" value="200.00" />
                                                <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to
                                                    cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                <h4>Watch</h4>
                                <h5>$200.00</h5>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>