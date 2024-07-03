<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<?php $icons_total = count(get_sub_field('icons_list')); ?>

<section class="featured-icons-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">

        <!-- FEATURED LIST-->
        <?php if (have_rows('icons_list')) : ?>
            <div class="icons-list">
                <?php while (have_rows('icons_list')) : the_row(); ?>

                    <?php if (have_rows('icon')) : ?>
                        <?php while (have_rows('icon')) : the_row(); ?>

                            <?php get_template_part('partials/flexible-content/components/featured_icon'); ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
