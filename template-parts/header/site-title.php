<?php

/**
 * Title - Page
 * 
 * @package NM_THEME
 */

?>
<?php
$page_title_show = get_post_meta(get_the_ID(), '_hide_page_meta_key');

if (is_array($page_title_show) && in_array('yes', $page_title_show)) {?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo esc_html(wp_title('')); ?></h1>
            </div>
        </div>
    </div>
<?php  } ?>