<?php
// ====== HOOK ACTION - FILTER ======>>
add_filter('wp_nav_menu_items', 'wpt_add_to_nav', 10, 2);

add_filter('nav_menu_submenu_css_class', 'wpt_add_class_on_submenu');

add_filter('nav_menu_link_attributes', 'wpt_add_class_on_a', 10, 4);

// ====== FUNCTIONS ======>>

if (!function_exists('wpt_add_to_nav')) {
    function wpt_add_to_nav($items, $args)
    {
        if ($args->theme_location == 'actions') {
            $add_HTML = '
            <li class="menu-item toggle-menu" onclick="myFunction()"><svg class="icon icon-reorder"><use xlink:href="#icon-reorder"></use></svg></li>';
            $items = $add_HTML . $items;
        }
        if ($args->theme_location == 'primary') {
            $add_HTML = '<li class="menu-item toggle-menu close" onclick="myFunction()"><svg class="icon icon-clear"><use xlink:href="#icon-clear"></use></svg></li>';
            $items = $add_HTML . $items;
        }

        return $items;
    }
}

if (!function_exists('wpt_add_class_on_submenu')) {
    function wpt_add_class_on_submenu($classes)
    {
        $classes[] = 'list-none';
        return $classes;
    }
}

if (!function_exists('wpt_add_class_on_a')) {
    function wpt_add_class_on_a($atts, $item, $args, $depth)
    {
        $atts['class'] = 'link';
        return $atts;
    }
}

class WPT_Custom_Nav_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $output .= '<li class="' .  implode(' ', $item->classes) . '">';

        if ($args->theme_location == 'footer') {
            $output .= '<svg class="icon icon-arrow_right_alt fill-primary mr-sm shrink-0">
                    <use xlink:href="#icon-arrow_right_alt"></use>
                </svg>';
        }
        if ($item->url && $item->url != '#') {
            $output .= '<a class="link" href="' . $item->url . '">';
        } else {
            $output .= '<span class="link">';
        }

        $output .= $item->title;

        if ($item->url && $item->url != '#') {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }

        if ($args->walker->has_children) {
            $output .= '<svg class="icon icon-keyboard_arrow_down"><use xlink:href="#icon-keyboard_arrow_down"></use></svg>';
        }
    }
}
