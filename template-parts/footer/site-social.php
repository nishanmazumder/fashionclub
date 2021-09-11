<?php

/**
 * Footer Social
 * @package NM_USC
 */

?>

<div class="row nm_social">
    <div class="col-md-12 text-center">
        <div class="nm-header-icon">
            <?php
            if (is_active_sidebar('footer-social')) {
                dynamic_sidebar('footer-social');
            }
            ?>
        </div>
    </div>
</div>