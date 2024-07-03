<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="hero-content-blk <?php echo $fx_setting['class'] ?>" style="--bg-top: <?php echo get_sub_field('background_color_top') === '' ? '#333' : get_sub_field('background_color_top'); ?>;--bg-bottom: <?php echo get_sub_field('background_color_bottom') === '' ? '#e5e5e5 ' : get_sub_field('background_color_bottom'); ?>">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">

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
