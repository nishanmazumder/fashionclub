<?php

/**
 * Single Post Page
 * 
 * @package NM_THEME
 */
?>

<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">

        <!-- Post -->
        <div class="col-md-8">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content/content-single');
                endwhile;
            else :
                get_template_part('template-parts/content/content-none');
            endif;
            ?>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>