<?php
$content_wrap = '';
if ($text_wrap_check = get_sub_field('text_wrap_check')) {
    $content_wrap = $text_wrap_check[0] === 'yes' ? 'wrap' : '';
}
$breadcrumb_check = false;
if ($breadcrumb_check = get_sub_field('breadcrumb_check')) {
    $breadcrumb_check = $breadcrumb_check[0] === 'yes' ? true : false;
}
?>

<div class="banner-full-image-cpt c-white bg-placeholder ">

    <?php if (have_rows('backgroud_image')) : ?>

        <!-- Background Image -->
        <?php while (have_rows('backgroud_image')) : the_row(); ?>

            <?php get_template_part('partials/flexible-content/components/image'); ?>

        <?php endwhile; ?>

    <?php endif; ?>

    <div class="content-box site-container <?php echo $content_wrap; ?>">

        <?php if (have_rows('heading')) : ?>

            <!-- Heading -->
            <?php while (have_rows('heading')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>

        <?php endif; ?>

        <?php if ($breadcrumb_check) : ?>

            <!-- Breadcrumb -->
            <?php get_template_part('partials/content', 'breadcrumb') ?>
            
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

</div>
