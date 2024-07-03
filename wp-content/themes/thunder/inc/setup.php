<?php
// ====== HOOK ACTION - FILTER ======>>

add_action('after_setup_theme', 'wpt_disable_core');

add_action('after_setup_theme', 'wpt_theme_setup');

add_filter('use_widgets_block_editor', '__return_false'); // The Editor and Widgets is back to the old version
// add_filter('use_block_editor_for_post', '__return_false');

add_filter('intermediate_image_sizes','wpt_remove_default_image_sizes_wp');

add_action('wp_head', 'wpt_add_favicon');

// ====== FUNCTIONS ======>>

// SETUP THEME
if (!function_exists('wpt_theme_setup')) {
    function wpt_theme_setup() {
        load_theme_textdomain('wpt', get_template_directory() . '/languages');

        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
        add_theme_support('title-tag');
        add_theme_support('menus');

        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'wpt'),
                'actions' => __('Actions Menu', 'wpt'),
                'footer' => __('Footer Menu', 'wpt'),
            )
        );
    }
}

// DISABLE CORE FUNCTIONS
if (!function_exists('wpt_disable_core')) {
    function wpt_disable_core() {

        // Disable the emoji's
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

        // Remove unnecessary things in wp_head
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head, 10, 0');
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    }
}

// REMOVE IMAGE SIZES OF WP DEFAULT
if (!function_exists('wpt_remove_default_image_sizes_wp')) {
    function wpt_remove_default_image_sizes_wp($sizes) {
        return array_diff($sizes, ['medium_large', '1536x1536', '2048x2048']);  // Medium Large (768 x 0)
    }
}

// ADD THEME FAVICOM
if (!function_exists('wpt_add_favicon')) {
    function wpt_add_favicon() {
        $favicon = get_field('site_favicon', 'options');
        if (!empty($favicon)) {
            echo '<link rel="shortcut icon" href="' . $favicon['image']['url'] . '"/>';
        }
    }
}