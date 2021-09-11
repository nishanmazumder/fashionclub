<?php

/**
 * Site Navigation
 * 
 * @package NM_USC
 */

$menu = NM_THEME\Classes\Menus::get_instance();
$menu_id = $menu->get_menu_id('nm-theme-main-menu');
$menu_items = wp_get_nav_menu_items($menu_id);

?>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    <div class="nm_usc_nav">
        <a href="javascript:void(0)" onclick="nmNavOpen()"><i class="fas fa-bars fa-3x"></i></a>
    </div>

    <div id="nmNavigation" class="nm-overlay">
        <?php if (!is_user_logged_in()) : ?>
            <div class="nm_user_navi">
                <a href="<?php echo NM_SITE_URL . '/usc-login'; ?>">Login</a> ||
                <a href="<?php echo NM_SITE_URL . '/usc-register'; ?>">Registration</a>
            </div>

        <?php else : ?>

            <div class="nm_user_navi">
                <?php $current_user = wp_get_current_user(); ?>
                Hello <?php echo $current_user->user_login; ?> || <a href="<?php echo learn_press_get_page_link('profile'); ?>">Profile</a>
            </div>

        <?php endif; ?>
        <a href="javascript:void(0)" class="closebtn" onclick="nmNavClose()">&times;</a>
        <div class="nm-overlay-content">
            <?php if (!empty($menu_items) && is_array($menu_items)) { ?>
                <?php foreach ($menu_items as $menu_item) { ?>
                    <a href="<?php echo esc_url($menu_item->url) ?>"><?php echo esc_html($menu_item->title); ?></a>
            <?php  }
            } ?>
        </div>
    </div>

</div>