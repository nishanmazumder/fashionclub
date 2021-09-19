<?php

/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($product_tabs)) : ?>

	<div class="collpse tabs">
		<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
			<?php foreach ($product_tabs as $key => $product_tab) : ?>

				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="tab-title-<?php echo esc_attr($key); ?>">
						<h4 class="panel-title">
							<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#tab-<?php echo esc_attr($key); ?>" aria-expanded="true" aria-controls="collapseOne">
								<i class="fa fa-file-text-o fa-icon" aria-hidden="true"></i>
								<?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
								<span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span>
								<i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
							</a>
						</h4>
					</div>

					<div id="tab-<?php echo esc_attr($key); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
						<div class="panel-body">
							<?php
							if (isset($product_tab['callback'])) {
								call_user_func($product_tab['callback'], $key, $product_tab);
							}
							?>
						</div>
					</div>
				</div>

			<?php endforeach; ?>



			<?php do_action('woocommerce_product_after_tabs'); 
			?>
		</div>
	</div>

<?php endif; ?>