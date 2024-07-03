<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="about-us-blk <?php echo $fx_setting['class'] ?>" style="background-image: url(<?php echo esc_url(get_sub_field('background_image')['url']); ?>); background-color:<?php echo get_sub_field("background_color") ?>; background-position: center;">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">
        <!-- TITLE -->
        <?php if (have_rows('title')) : ?>
            <?php while (have_rows('title')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>
        <?php endif; ?>
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

        <!-- BUTTON -->
        <?php if (have_rows('button')) : ?>
            <?php while (have_rows('button')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/link'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>