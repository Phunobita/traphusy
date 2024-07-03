<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <?php wp_head(); ?>


</head>

<body <?php body_class('site-width'); ?>>
    <?php wp_body_open(); ?>
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
        <img src="<?php echo home_url() ?>/wp-content/uploads//2023/11/logo.png" />
    </div>
    <div id=" top"></div>
    <header class="site-header">
        <div class="site-container wrapper d-flex align-center">

            <div class="header-primary">

                <?php get_template_part('partials/menus/nav', 'primary') ?>
            </div>
            <div class="header-logo">

                <?php get_template_part('partials/content', 'logo') ?>
            </div>

            <div class="header-actions">
                <?php get_template_part('partials/menus/nav', 'actions') ?>

            </div>

        </div>
    </header>
    <?php
    if (is_front_page()) {
    ?>

    <script>
    // background header
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.querySelector(".site-header").style.backgroundColor = "rgba(0, 0, 0, 0.6)";
        } else {
            document.querySelector(".site-header").style.backgroundColor = "transparent";
        }
    }
    </script>
    <?php
    } else {
    ?>
    <style>
    .site-header {
        background-color: rgba(0, 0, 0, 0.6);
        position: relative;
    }
    </style>
    <?php
    }
    ?>

    <!-- START - MAIN CONTENT SITE -->
    <div class="site-main">