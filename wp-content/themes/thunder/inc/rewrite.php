<?php
// ====== HOOK ACTION - FILTER ======>>

add_action('init', 'wpt_rewrite_url');


// ====== FUNCTIONS ======>>

// REWRITE URL
if (!function_exists('wpt_rewrite_url')) {
    function wpt_rewrite_url() {
        add_rewrite_rule('^projects/page/([0-9]+)', 'index.php?pagename=projects&paged=$matches[1]', 'top');
        add_rewrite_rule('^news/page/([0-9]+)', 'index.php?pagename=news&paged=$matches[1]', 'top');
    }
}