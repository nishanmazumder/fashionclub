<?php

/**
 * Site Brand
 * 
 * @package NM_THEME
 */

?>

<a href="<?php echo esc_url(home_url()); ?>">
    <?php
    if (function_exists('the_custom_logo')) {
        $nm_usc_logo_id = get_theme_mod('custom_logo');
        $nm_usc_logo = wp_get_attachment_image_src($nm_usc_logo_id, 'full');

        if (has_custom_logo()) {
            echo '<img src="' . esc_url($nm_usc_logo[0]) . '" alt="' . get_bloginfo('name') . '">'
                . '<h1>' . get_bloginfo('name') . '<span>' . get_bloginfo('description') . '</span>' . '</h1>';
        } else {
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        }
    }
    ?>
</a>