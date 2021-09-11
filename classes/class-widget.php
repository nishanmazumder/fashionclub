<?php

/**
 * Widgets
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Widget
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Register Elementor Widgets
        add_action('init', [$this, 'nm_elementor_widgets_register']);
    }

    public function nm_elementor_widgets_register()
    {
        //Banner Section
        require_once __DIR__ . '/widgets/class-el-banner.php';
        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_USC_BANNER);

        //Video Section
        require_once __DIR__ . '/widgets/class-el-course.php';
        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_USC_COURSE);

        //Application Section
        require_once __DIR__ . '/widgets/class-el-info.php';
        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_USC_INFO);

        //Application Fee
        require_once __DIR__ . '/widgets/class-el-application-fee.php';
        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_USC_FEE);

        //Course List
        require_once __DIR__ . '/widgets/class-el-course-list.php';
        \Elementor\Plugin::instance()->widgets_manager
            ->register_widget_type(new \NM_THEME\Classes\Widget\NM_USC_COURSE_LIST);
    }
}
