<?php

/**
 * Footer widgets
 * @package NM_USC
 */

?>

<div class="row nm_widget">
    <?php
    if (is_active_sidebar('footer-sidebar')) {
        dynamic_sidebar('footer-sidebar');
    }
    ?>
</div>
</div>