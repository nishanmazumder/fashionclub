<?php

/**
 * Theme Enqueue
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Assets
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /***
         * Actions
         ***/
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        wp_enqueue_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css');
        wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css');

        if (is_product()) {
            wp_enqueue_style('flexslider-css', NM_DIR_URI . '/assets/css/flexslider.css'); //footer
            // wp_enqueue_style('flexslider-css', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.4.0/flexslider.css');
        }

        wp_enqueue_style('main-css', NM_DIR_URI . '/assets/css/style.css', [], filemtime(NM_DIR_PATH . '/assets/css/style.css'), 'all');
        wp_enqueue_style('stylesheet', NM_STYLE_URI, [], filemtime(NM_DIR_PATH . '/style.css'), 'all');
    }

    public function register_scripts()
    {
        wp_enqueue_script('jq-v1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js', array('jquery'), '', true); //footer
        wp_enqueue_script('bootstrap-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('nmJqValidator', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js', array('jquery'), '', true);
        wp_enqueue_script('responsive-tab', NM_DIR_URI . '/assets/js/easyResponsiveTabs.js', array('jquery'), '', true);
        wp_enqueue_script('wmu-Slider', NM_DIR_URI . '/assets/js/jquery.wmuSlider.js', array('jquery'), '', true);
        if (is_product()) {
            wp_enqueue_script('flexslider-js', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.4.0/jquery.flexslider-min.js', array('jquery'), '', true);
            wp_enqueue_script('imagezoom', NM_DIR_URI . '/assets/js/imagezoom.js', array('jquery'), '', true);
        }
        wp_enqueue_script('jq-flexisel', NM_DIR_URI . '/assets/js/jquery.flexisel.js', array('jquery'), '', true);
        wp_enqueue_script('minicart', 'https://cdnjs.cloudflare.com/ajax/libs/minicart/3.0.6/minicart.min.js', array('jquery'), '', true);
        wp_enqueue_script('main-js', NM_DIR_URI . '/assets/js/main.js', array('jquery'), filemtime(NM_DIR_PATH . '/assets/js/main.js'), true); //footer

         //Ajax Localize
         wp_localize_script('main-js', 'ajax_obj', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nmnonce' => wp_create_nonce("23#as14blak&&90ad1584")
        ]);
    }
}
