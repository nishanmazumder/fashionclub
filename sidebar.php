<?php

/**
 * Sidebar - Woocommerce
 * 
 * @package NM_THEME
 */
?>

<div class="w3ls_dresses_grid_left_grid">
    <h3>Categories</h3>
    <div class="w3ls_dresses_grid_left_grid_sub">
        <div class="ecommerce_dres-type">
            <ul>
                <?php do_action('nm_woo_get_categories');  ?>
            </ul>
        </div>
    </div>
</div>

<div class="w3ls_dresses_grid_left_grid">
    <h3>Color</h3>
    <div class="w3ls_dresses_grid_left_grid_sub">
        <div class="ecommerce_color">
            <ul>
                <?php echo do_action('nm_woo_get_colors'); ?>
            </ul>
        </div>
    </div>
</div>
<div class="w3ls_dresses_grid_left_grid">
    <h3>Size</h3>
    <div class="w3ls_dresses_grid_left_grid_sub">
        <div class="ecommerce_color ecommerce_size">
            <ul>
                <?php echo do_action('nm_woo_get_sizes'); ?>
            </ul>
        </div>
    </div>
</div>


<?php 

if (is_active_sidebar('nm-woo-shop')) {
    dynamic_sidebar('nm-woo-shop');
} else {
    echo "<h1>Sidebar not active!</h1>";
}

?>
