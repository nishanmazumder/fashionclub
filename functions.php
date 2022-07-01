<?php

/**
 * Functions
 * @package NM_THEME
 */

/**
 * Theme URL
 */
if (!defined('NM_SITE_URL')) {
   define('NM_SITE_URL', esc_url(get_site_url()));
}

if (!defined('NM_DIR_PATH')) {
   define('NM_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('NM_DIR_URI')) {
   define('NM_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('NM_STYLE_URI')) {
   define('NM_STYLE_URI', untrailingslashit(get_stylesheet_uri()));
}

/**
 * Autoload
 */
require_once NM_DIR_PATH . '/vendor/autoload.php';


/**
 * Theme Bootstrap
 */
nm_theme_get_instance();
function nm_theme_get_instance()
{
   \NM_THEME\Classes\NM_THEME::get_instance();
}

/**
 * Template Functions
 */
require_once NM_DIR_PATH . '/inc/template-functions.php';

/**
 * Template Tags
 */
require_once NM_DIR_PATH . '/inc/template-tags.php';


/**
 * Woocommerce
 */

if (class_exists('WooCommerce')) {
   require_once NM_DIR_PATH . '/inc/wooCommerce.php';
}


/**
 * Load Require plugin by TGM
 */
require_once NM_DIR_PATH . '/inc/tgm-activation.php';
require_once NM_DIR_PATH . '/inc/tgm-config.php';

add_action('customize_register', 'nm_social_customizr');
function nm_social_customizr( $wp_customize ) {
	
	$wp_customize->add_section('nm_social_section', array(
		"title" => 'Social Control',
		"priority" => 28,
		//"description" => __( 'Control Whatsapp and Facebook', 'twentytwelve' )
	));
	$wp_customize->add_setting('nm_wt_img', array(
		'default' => site_url('/wp-content/uploads/2022/04/icon6.png'),
		//'default' => '',
		//'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_setting('nm_wtsap_txt', array(
		'default' => 'WhatsApp',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_setting('nm_wtsap_url', array(
		'default' => 'https://web.whatsapp.com/',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nm_wt_img', array(
		'label' => __( 'Upload Whatsapp Icon', 'twentytwelve' ),
		'section' => 'nm_social_section',
		'settings' => 'nm_wt_img',
			)
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'nm_wtsap_txt', array(
		        'label'    => __( 'Whatsapp icon text', 'twentytwelve' ),
		        'section'  => 'nm_social_section',
		        'settings' => 'nm_wtsap_txt',
		        'type'     => 'text'
		    )
	    )
	);
	
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'nm_wtsap_url', array(
		        'label'    => __( 'Whatsapp url', 'twentytwelve' ),
		        'section'  => 'nm_social_section',
		        'settings' => 'nm_wtsap_url',
		        'type'     => 'text'
		    )
	    )
	);
	
// 	Facebook

	$wp_customize->add_setting('nm_fb_img', array(
		'default' => site_url('/wp-content/uploads/2022/04/icon5-1.png'),
		//'default' => '',
		//'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_setting('nm_fb_txt', array(
		'default' => 'Facebook',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_setting('nm_fb_url', array(
		'default' => 'https://www.facebook.com/',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nm_fb_img', array(
		'label' => __( 'Upload Facebook Icon', 'twentytwelve' ),
		'section' => 'nm_social_section',
		'settings' => 'nm_fb_img',
			)
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'nm_fb_txt', array(
		        'label'    => __( 'Facebook icon text', 'twentytwelve' ),
		        'section'  => 'nm_social_section',
		        'settings' => 'nm_fb_txt',
		        'type'     => 'text'
		    )
	    )
	);
	
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'nm_fb_url', array(
		        'label'    => __( 'Facebook url', 'twentytwelve' ),
		        'section'  => 'nm_social_section',
		        'settings' => 'nm_fb_url',
		        'type'     => 'text'
		    )
	    )
	);
	
}

