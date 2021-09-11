<?php

/**
 * Post Page
 * 
 * @package NM_USC
 */
?>

<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="col-md-4 col-sm-6 col-xs-12 mt-5">
                    <?php get_template_part('template-parts/content/content'); ?>
                </div>
        <?php endwhile;
        else :
            get_template_part('template-parts/content/content-none');
        endif; ?>

        <!-- Pagination -->
        <div class="col-md-12 text-center">
            <nav aria-label="Post navigation">
                <ul class="pagination">
                    <li>
                        <?php if (function_exists('nm_post_pagination')) {
                            nm_post_pagination();
                        } ?>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>

<?php get_footer(); ?>