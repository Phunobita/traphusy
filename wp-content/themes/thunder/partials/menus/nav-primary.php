<?php if (has_nav_menu('primary')) : ?>
<?php
    $defaults = array(
        'theme_location'       => 'actions',
        'container'            => false,
        'menu_class'           => 'menu menu-actions list-none d-flex align-center',
        'depth'                => 2,
        'fallback_cb'          => false,
        // 'walker'               => new WPT_Custom_Nav_Walker(),
    );
    wp_nav_menu($defaults);
?>


<?php
    $defaults = array(
        'theme_location'       => 'primary',
        'container'            => false,
        'menu_class'           => 'menu menu-primary list-none d-flex align-center',
        'depth'                => 3,
        'fallback_cb'          => false,
        'walker'               => new WPT_Custom_Nav_Walker(),
    );
    wp_nav_menu($defaults);
?>
<?php endif; ?>