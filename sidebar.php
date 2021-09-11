<?php

/**
 * Sidebar - Post
 * 
 * @package NM_THEME
 */
?>

<aside>
    <?php
    if (is_active_sidebar('post-sidebar')) {
        dynamic_sidebar('post-sidebar');
    } else {
        echo "<h1>Sidebar not active!</h1>";
    }

    ?>
</aside>