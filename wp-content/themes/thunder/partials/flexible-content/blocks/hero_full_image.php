<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="hero-full-image-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">

        <!-- CONTENT -->
        <?php if (have_rows('content')) : ?>
            <?php while (have_rows('content')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/banner_full_image'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>