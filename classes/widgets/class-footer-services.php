<?php

/**
 * Widgets - Gutenberg - Footer Services 
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use WP_Widget;


/**
 * Adds Foo_Widget widget.
 */
class Footer_Services extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'nm_footer_services', // Base ID
            'Footer Services', // Name
            array('description' => __('Services block for footer top', 'nm_theme'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;
        // if (!empty($title)) {
        //     //echo $before_title . $title . $after_title;
        // }

?>
        <i class="<?php echo esc_html__($instance['icon'], 'nm_theme'); ?>"></i>
        <div class="nm_service">
            <h4><?php echo esc_html__($title, 'nm_theme'); ?></h4>
            <p><?php echo esc_html__($instance['description'], 'nm_theme'); ?></p>
        </div>

    <?php

        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Service Name', 'text_domain');
        $icon = !empty($instance['icon']) ? $instance['icon'] : esc_html__('fas fa-atlas', 'text_domain');
        $description = !empty($instance['description']) ? $instance['description'] : esc_html__('Add Description', 'text_domain');

        $icon_link = wp_kses(__('<a style="color: #006BA1;" href="https://fontawesome.com/v5.15/icons?d=gallery&p=2" target="_blank">Icon List</a>', 'nm_theme'), [
            'a' => [
                'style' => [],
                'href' => [],
                'target' => []
            ]
        ]);

    ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />

            <label for="<?php echo $this->get_field_name('icon'); ?>"><?php _e('Icon:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>">
            <span><?php echo $icon_link. '<br>';?></span>

            <label for="<?php echo $this->get_field_name('description'); ?>"><?php _e('Description:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" value="<?php echo esc_attr($description); ?>">
        </p>
<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['icon'] = (!empty($new_instance['icon'])) ? strip_tags($new_instance['icon']) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '';

        return $instance;
    }
} // class Foo_Widget
