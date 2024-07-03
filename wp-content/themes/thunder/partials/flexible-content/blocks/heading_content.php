<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="heading-content-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">

        <!-- HEADING -->
        <?php if (have_rows('heading')) : ?>
            <?php while (have_rows('heading')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

        <!-- CONTENT -->
        <?php if (have_rows('content')) : ?>
            <?php while (have_rows('content')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/content'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>
