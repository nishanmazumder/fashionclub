<?php

/**
 * Header template
 * @package NM_USC
 */

?>

<head>
    <!--Meta tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Change Title and Meta tags-->
    <title>FashionClud</title>
    <meta name="description" content="Ecommerce | Cloth Selling | Fashion Items">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Nishan M">

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>

    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    get_template_part('template-parts/header/header');
