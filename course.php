<?php

/**
 * Template Name: Project Template
 *
 * @package NM_THEME
 */
?>

<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-8">
            <h3>
            <?php
            
            $user = wp_get_current_user();
            $user_id = get_current_user_id();

            echo "<pre>";

            //print_r($user->roles[0]);
            

            // if(in_array('administrator', $user->roles)){
            //     echo "Nishan";
            // }

            print_r(current_user_can( 'administrator' ));

            
            
            ?>
            </h3>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>