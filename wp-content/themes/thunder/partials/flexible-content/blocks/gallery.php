<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>
<?php

if ($column_display = get_sub_field('column_display')) {
    $column_display_class = 'fx-column-' . $column_display;
}

$column_gap = get_sub_field('column_gap') ? 'fx-column-gap' : '';
$column_flexible = get_sub_field('column_flexible') ? 'flexible' : '';
$flexible_grid = get_sub_field('flexible_grid') ? 'fx-grid' : '';

?>
<section class="gallery-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">

        <!-- HEADING -->
        <?php if (have_rows('heading')) : ?>
        <?php while (have_rows('heading')) : the_row(); ?>

        <?php get_template_part('partials/flexible-content/components/heading'); ?>

        <?php endwhile; ?>
        <?php endif; ?>

        <!-- PARAGRAPH -->
        <?php if (have_rows('paragraph')) : ?>
        <?php while (have_rows('paragraph')) : the_row(); ?>

        <?php get_template_part('partials/flexible-content/components/content'); ?>

        <?php endwhile; ?>
        <?php endif; ?>

        <!-- GALLERY -->
        <?php if (have_rows('gallery')) : ?>
        <div class="gallery-blk-item fx-layout <?php echo implode(" ", [$flexible_grid, $column_display_class, $column_flexible, $column_gap]); ?>">

            <?php while (have_rows('gallery')) : the_row(); ?>

            <?php get_template_part('partials/flexible-content/components/image'); ?>

            <?php endwhile; ?>

        </div>
        <?php endif; ?>

    </div>
</section>