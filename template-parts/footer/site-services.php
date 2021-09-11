<?php

/**
 * Footer Services
 * @package NM_USC
 */

?>

<!--Footer section strat-->
<footer>
    <div class="container">
        <div class="row nm_service_area">
            <?php
            if (is_active_sidebar('footer-services')) {
                dynamic_sidebar('footer-services');
            }
            ?>
        </div>