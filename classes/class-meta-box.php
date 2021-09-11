<?php

/**
 * Custom Metabox
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class META_BOX
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action('add_meta_boxes', [$this, 'hide_page_meta_box']);
        add_action('save_post', [$this, 'hide_page_meta_box_save']);
    }

    // Register Meta Box
    public function hide_page_meta_box()
    {
        $screens = ['page'];

        foreach ($screens as $screen) {
            add_meta_box(
                'hide_page_meta_box_id',    // Unique ID
                __('Hide Page Title', 'nm_theme'),       // Box title
                [$this, 'hide_page_meta_box_html'],       // Callback function
                $screen,                 // Post type
                'side',                  // Side or Bottom / Location
                'default'

            );
        }
    }

    // Displaying metabox
    public function hide_page_meta_box_html($post)
    {
        $value = get_post_meta($post->ID, '_hide_page_meta_key', true);

        // Create a noncce field for varification this request
        //wp_nonce_field(plugin_basename(__FILE__), 'hide_page_meta_nonce')

?>
        <label for="nm_field"><?php esc_html_e('Hide page title') ?></label>
        <select name="nm_field" id="nm_field" class="postbox">
            <option value=""><?php esc_html_e('Selectr an option') ?></option>
            <option value="yes" <?php selected($value, 'yes'); ?>><?php esc_html_e('Yes') ?></option>
            <option value="no" <?php selected($value, 'no'); ?>><?php esc_html_e('No') ?></option>
        </select>
<?php
    }

    // Save metabox data
    public function hide_page_meta_box_save($post_id)
    {

        /** 
         *nonce field verification
         */
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // if (
        //     !isset($_POST['hide_page_meta_nonce']) ||
        //     wp_verify_nonce($_POST['hide_page_meta_nonce'], plugin_basename(__FILE__))
        // ) {
        //     return;
        // }

        if (array_key_exists('nm_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_hide_page_meta_key',
                $_POST['nm_field']
            );
        }
    }



    //END
}
