<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>

<div class="col-md-3 col-sm-6">

	<div class="product-grid6">
		<div class="product-image6">

			<?php do_action('woocommerce_before_shop_loop_item_title'); ?>
		</div>
		<div class="product-content">
			<h3 class="title"><?php do_action('woocommerce_shop_loop_item_title'); ?></h3>
			<div class="price">
				<span> 
					<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
				</span>
			</div>

		</div>
		<ul class="social">
			<li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
			<li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
			<li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
		</ul>
	</div>

</div>



<div class="col-md-4 women-grids wp1 animated wow slideInUp" data-wow-delay=".5s">
	<a href="single.html">
		<div class="product-img">
			<?php do_action('woocommerce_before_shop_loop_item_title'); ?>
			<div class="p-mask">
				<button class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> View Product</button>
			</div>
		</div>
	</a>
	<i class="fa fa-star yellow-star" aria-hidden="true"></i>
	<i class="fa fa-star yellow-star" aria-hidden="true"></i>
	<i class="fa fa-star yellow-star" aria-hidden="true"></i>
	<i class="fa fa-star yellow-star" aria-hidden="true"></i>
	<i class="fa fa-star gray-star" aria-hidden="true"></i>
	<h4><?php do_action('woocommerce_shop_loop_item_title'); ?></h4>
	<h5><?php do_action('woocommerce_after_shop_loop_item_title'); ?></h5>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action('woocommerce_before_shop_loop_item');

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action('woocommerce_before_shop_loop_item_title');

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action('woocommerce_shop_loop_item_title');

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action('woocommerce_after_shop_loop_item_title');

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action('woocommerce_after_shop_loop_item');
	?>
</div>