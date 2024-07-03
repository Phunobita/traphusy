<?php if (has_nav_menu('footer')) : ?>
<?php
    $defaults = array(
        'theme_location'       => 'footer',
        'container'            => false,
        'menu_class'           => 'menu menu-footer list-none',
        'depth'                => 1,
        'fallback_cb'          => false,
       // 'walker'               => new WPT_Custom_Nav_Walker(),
    );
    wp_nav_menu($defaults);
?>
<?php endif; ?>
