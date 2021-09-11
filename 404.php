<?php

/**
 * Page 404
 * 
 * @package NM_THEME
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/header/site', 'title'); ?>

<div class="container nm-page">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="text-danger">404</h1>
            <h3>Page Not Found</h3>
            <a href="<?php echo home_url(); ?>">Go to Home!</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>