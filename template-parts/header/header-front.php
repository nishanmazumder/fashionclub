<?php

/**
 * Site Header
 * 
 * @package NM_USC
 */

?>

<header class="nm-header-front" style="background-image: url('<?php echo NM_DIR_URI . "/assets/img/main_bg.png"; ?>')">
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="nm_usc_logo">
                    <?php get_template_part('template-parts/header/site', 'brand'); ?>
                </div>
            </div>
            <?php get_template_part('template-parts/header/site', 'navigation'); ?>
        </div>
    </div>

<!-- Site Banner -->