<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="free-content-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">
        <!-- TITLE -->
        <?php if (have_rows('title')) : ?>
        <?php while (have_rows('title')) : the_row(); ?>

        <?php get_template_part('partials/flexible-content/components/heading'); ?>

        <?php endwhile; ?>
        <?php endif; ?>

        <!-- Content -->
        <?php if ($editor = get_sub_field('editor')) : ?>
        <div class="content">
            <?php echo $editor; ?>
        </div>
        <?php endif; ?>

    </div>
</section>