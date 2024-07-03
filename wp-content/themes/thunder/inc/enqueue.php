<?php
// ====== HOOK ACTION - FILTER ======>>
add_action('wp_enqueue_scripts', 'wpt_enqueue');

// ====== FUNCTIONS ======>>

if (!function_exists('wpt_enqueue')) {
    function wpt_enqueue()
    {

        // CSS
        wp_register_style('wpt_front_style', THEME_URI . '/assets/css/front-style.css');
        wp_enqueue_style('wpt_front_style');

        wp_register_style('wpt_my_style', THEME_URI . '/assets/css/my-style.css');
        wp_enqueue_style('wpt_my_style');

        wp_register_style('wpt_my_responsive', THEME_URI . '/assets/css/my-responsive.css');
        wp_enqueue_style('wpt_my_responsive');

        $custom_css = get_field('custom_css', 'options');
        wp_add_inline_style('wpt_front_style', $custom_css);


        // JS
        wp_register_script('wpt_front_script', THEME_URI . '/assets/js/front-script.js', array(), false, true);
        wp_enqueue_script('wpt_front_script');

        wp_register_script('wpt_my_javascript', THEME_URI . '/assets/js/my-javascript.js', array(), false, true);
        wp_enqueue_script('wpt_my_javascript');

        $custom_javascript = get_field('custom_javascript', 'option');
        wp_add_inline_script('wpt_front_script', $custom_javascript);


        //  LOCALIZE
        wp_localize_script('wpt_front_script', 'wpt_objects_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'wpt_nonce' => wp_create_nonce('wpt_ajax_nonce')
        ));

        // Remove embed js
        wp_deregister_script('wp-embed');

        // Remove Gutenberg CSS
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
    }
}
