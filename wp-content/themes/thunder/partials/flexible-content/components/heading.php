<?php
$space_bottom = wpt_get_components_spacing_setting_fields(); // Get spacing bottom components

$display_check = get_sub_field('display_check');

if ($display_check === 'none') return;

$uppercase_class = '';
if ($text_uppercase_check = get_sub_field('text_uppercase_check')) {
    $uppercase_class = $text_uppercase_check[0] === 'yes' ? 'uppercase' : '';
}
$center_class = '';
if ($text_center_check = get_sub_field('text_center_check')) {
    $center_class = $text_center_check[0] === 'yes' ? 'center' : '';
}

$text_overlay = get_sub_field('text_overlay');
$caption = get_sub_field('caption');

$select_title = get_sub_field('select_title');
$post_title = is_archive() ? get_queried_object()->name : get_the_title();

$title = $select_title === 'custom' ? get_sub_field('title') : $post_title;
$check_title_special = $select_title === 'custom' && $display_check === 'special' ? true : false;

?>

<div class="heading-cpt relative <?php echo $space_bottom; ?> <?php echo $center_class; ?>">

    <?php if ($text_overlay && $check_title_special) : ?>

        <!-- Text Overlay -->
        <p class="text-overlay uppercase m-none"><?php echo esc_html($text_overlay); ?></p>

    <?php endif; ?>

    <div class="title-box <?php echo $display_check === 'special' ? 'special' : ''; ?> ">

        <?php if ($title) : ?>

            <!-- Title -->
            <?php if (is_single()) : ?>
                <h1 class="title m-none <?php echo $uppercase_class; ?>" style="font-size:<?php echo get_sub_field('size') ?>px; color:<?php echo get_sub_field('color') ?>; line-height: 1.2">
                    <?php echo esc_html($title); ?>
                </h1>
            <?php else : ?>
                <h2 class="title m-none <?php echo $uppercase_class; ?>" style="font-size:<?php echo get_sub_field('size') ?>px; color:<?php echo get_sub_field('color') ?>; line-height: 1.2">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

        <?php endif; ?>

        <?php if ($caption && $check_title_special) : ?>

            <!-- Caption -->
            <p class="caption t-small uppercase m-none"><?php echo esc_html($caption); ?></p>

        <?php endif; ?>

    </div>

</div>