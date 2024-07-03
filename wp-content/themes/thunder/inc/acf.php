<?php
// ====== HOOK ACTION - FILTER ======>>

// Update value of site name in Theme Option
add_action('update_option_blogname', 'wpt_update_acf_field_host_site_name', 10, 2);

// Update option 'blogname' in Theme Option
add_filter('acf/update_value/name=host_site_name', 'wpt_update_option_before_acf_update_value', 10, 3);

// Customize URL Template Render of Flexible Content
add_filter('acfe/flexible/render/template/name=flexible_content', 'wpt_acf_layout_template', 10, 4);

// Customize URL thumbnail of Flexible Content
add_filter('acfe/flexible/thumbnail/name=flexible_content', 'wpt_acf_layout_thumbnail', 10, 3);

// Modify the path to the icons directory
add_filter('acf_icon_path_suffix', 'wpt_acf_icon_path_suffix');

// Enable Single Meta on specific Options Post ID (default: disabled)
add_filter('acfe/modules/single_meta/options', 'wpt_acfe_single_meta_options');


// ====== FUNCTIONS ======>>

// THEME OPTION 
if (!function_exists('wpt_update_acf_field_host_site_name')) {
    function wpt_update_acf_field_host_site_name($old_value, $new_value)
    {
        update_field('host_site_name', $new_value, 'options');
    }
}

if (!function_exists('wpt_update_option_before_acf_update_value')) {
    function wpt_update_option_before_acf_update_value($value, $post_id, $field)
    {
        update_option('blogname', $value);
        return $value;
    }
}

// FLEXIBLE CONTENT
if (!function_exists('wpt_acf_layout_template')) {
    function wpt_acf_layout_template($file, $field, $layout, $is_preview)
    {
        if (!$is_preview) {
            $file = get_stylesheet_directory() . '/partials/flexible-content/blocks/' . $layout['name'] . '.php';
        }
        return $file;
    }
}

if (!function_exists('wpt_acf_layout_thumbnail')) {
    function wpt_acf_layout_thumbnail($thumbnail, $field, $layout)
    {
        $thumbnail = THEME_URI . '/assets/images/layouts/' . $layout['name'] . '.png';
        // Must return an URL or Attachment ID
        return $thumbnail;
    }
}

if (!function_exists('wpt_acf_icon_path_suffix')) {
    function wpt_acf_icon_path_suffix($path_suffix)
    {
        return 'assets/svgs/';
    }
}

if (!function_exists('wpt_flexible_content_get_setting_fields')) {
    function wpt_flexible_content_get_setting_fields()
    {
        $setting = [];
        if (have_settings()) :
            while (have_settings()) : the_setting();
                $class = get_sub_field('class');
                $width = get_sub_field('width');
                $space_top = get_sub_field('space_top');
                $space_bottom = get_sub_field('space_bottom');
                $background_placeholder = get_sub_field('background_color') !== 'default' ? 'bg-placeholder' : '';
                switch ($width) {
                    case 'container':
                        $setting['block_width'] = 'site-container';
                        break;
                    case 'gap':
                        $setting['block_width'] = 'site-gap';
                        break;
                    default:
                        $setting['block_width'] = '';
                        break;
                }
                $setting['class'] = $background_placeholder . ' ' . $space_top . ' ' . $space_bottom . ' ' . $class;
            endwhile;
        endif;
        return $setting;
    }
}

if (!function_exists('wpt_get_components_spacing_setting_fields')) {
    function wpt_get_components_spacing_setting_fields()
    {
        $space_class = '';
        if (have_rows('space_bottom')) :
            while (have_rows('space_bottom')) : the_row();

                $component_gap = get_sub_field('component_gap');
                switch ($component_gap) {
                    case 'small':
                        $space_class = 'mb-sm';
                        break;
                    case 'large':
                        $space_class = 'mb-md';
                        break;
                    default:
                        $space_class = '';
                        break;
                }

            endwhile;
        endif;

        return $space_class;
    }
}

function wpt_acfe_single_meta_options($options_ids)
{

    $options_ids = array('options');

    // Disable all options id (default behavior)
    // return false;

    return $options_ids;
}
