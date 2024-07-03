<?php
$space_bottom = wpt_get_components_spacing_setting_fields(); // Get spacing bottom components

$display_check = get_sub_field('display_check');
if ($display_check === 'none') return;


$content_wrap = '';
if ($text_wrap_check = get_sub_field('text_wrap_check')) {
    $content_wrap = $text_wrap_check[0] === 'yes' ? 't-wrap' : '';
}
$center_class = '';
if ($text_center_check = get_sub_field('text_center_check')) {
    $center_class = $text_center_check[0] === 'yes' ? 't-center' : '';
}

?>

<?php if ($content = get_sub_field('content')) : ?>
    <div class="content-cpt <?php echo $space_bottom . ' ' . $content_wrap . ' ' . $center_class; ?>">
        <?php echo $content; ?>
    </div>
<?php endif; ?>