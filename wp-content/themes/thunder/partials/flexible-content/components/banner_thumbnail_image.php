<?php
$icon = get_sub_field('background_layer_icon');
if (!$icon) {
    $icon = 'apps';
}
$image_position = get_sub_field('image_position');
if ($image_position === 'left') {
    $image_position = 'left-image';
}
$background_layer_position = get_sub_field('background_layer_position');
if ($background_layer_position === 'top') {
    $background_layer_position = 'top-bg';
}
?>

<div class="banner-thumbnail-image-cpt <?php echo $image_position . ' ' . $background_layer_position; ?>">

    <div class="col-text">

        <?php if (have_rows('heading')) : ?>

            <!-- Heading -->
            <?php while (have_rows('heading')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>

        <?php endif; ?>

        <?php if (have_rows('paragraph')) : ?>

            <!-- Paragraph -->
            <?php while (have_rows('paragraph')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/content'); ?>

            <?php endwhile; ?>

        <?php endif; ?>

        <?php if (have_rows('button')) : ?>

            <!-- Button -->
            <?php while (have_rows('button')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/link'); ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

    <div class="col-image relative">

        <!-- Background Color Layer -->
        <div class="bg-fill d-flex flex-center bg-primary">
            <div class="icon-box">
                <svg class="icon icon-<?php echo $icon; ?>">
                    <use xlink:href="#icon-<?php echo $icon; ?>"></use>
                </svg>
            </div>
        </div>

        <?php if (have_rows('thumbnail_image')) : ?>

            <!-- Background Image -->
            <?php while (have_rows('thumbnail_image')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/image'); ?>

            <?php endwhile; ?>
            
        <?php endif; ?>

    </div>

</div>
