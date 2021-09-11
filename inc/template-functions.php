<?php

/**
 *  Template functions
 * 
 * @package NM_THEME
 */



//Enable classic editor for wordpress//
add_filter('use_block_editor_for_post','__return_false');

/**
 * ACF
 */

// if ( is_plugin_active('advanced-custom-fields') ) {
//    // do something
// }

// Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }

/**
 * Learnpress
 */

add_filter('learn-press/override-templates', function () {
   return true;
});

// User redirection for profile
function redirect_for_non_login_user()
{
   global $wp;

   if (is_user_logged_in() && $wp->request == 'usc-login') {
      wp_safe_redirect(NM_SITE_URL . '/usc-profile');
      exit;
   }
   if (!is_user_logged_in() && $wp->request == 'usc-profile') {
      wp_safe_redirect(NM_SITE_URL . '/usc-login');
      exit;
   }
}

add_action('template_redirect', 'redirect_for_non_login_user');

//Hide admin bar for all user
add_filter( 'show_admin_bar' , 'usc_hide_adminbar_all');
function usc_hide_adminbar_all($show_admin_bar) {
    return ( current_user_can( 'administrator' ) ) ? $show_admin_bar : false;
}

// Mail - Apply
require_once NM_DIR_PATH . '/inc/mail-apply.php';
