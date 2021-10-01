<?php

/**
 * Sidebar - Woocommerce
 * 
 * @package NM_THEME
 */

// if (is_active_sidebar('post-sidebar')) {
//     dynamic_sidebar('post-sidebar');
// } else {
//     echo "<h1>Sidebar not active!</h1>";
// }
?>

<div class="w3ls_dresses_grid_left_grid">
    <h3>Categories</h3>
    <div class="w3ls_dresses_grid_left_grid_sub">
        <div class="ecommerce_dres-type">
            <ul>
                <?php do_action('nm_woo_sidebar_categories');  ?>
            </ul>
        </div>
    </div>
</div>
<div class="w3ls_dresses_grid_left_grid">
    <h3>Color</h3>
    <div class="w3ls_dresses_grid_left_grid_sub">
        <div class="ecommerce_color">
            <ul>
                <li><a href="#"><i></i> Red(5)</a></li>
                <li><a href="#"><i></i> Brown(2)</a></li>
                <li><a href="#"><i></i> Yellow(3)</a></li>
                <li><a href="#"><i></i> Violet(6)</a></li>
                <li><a href="#"><i></i> Orange(2)</a></li>
                <li><a href="#"><i></i> Blue(1)</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="w3ls_dresses_grid_left_grid">
    <h3>Size</h3>
    <div class="w3ls_dresses_grid_left_grid_sub">
        <div class="ecommerce_color ecommerce_size">
            <ul>
                <li><a href="#">Medium</a></li>
                <li><a href="#">Large</a></li>
                <li><a href="#">Extra Large</a></li>
                <li><a href="#">Small</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="w3ls_dresses_grid_left_grid">
    <div class="dresses_img_hover">
        <img src="<?php echo NM_DIR_URI;?>/assets/images/offer2.jpg" alt=" " class="img-responsive" />
        <div class="dresses_img_hover_pos">
            <h4>Upto<span>50%</span><i>Off</i></h4>
        </div>
    </div>
</div>