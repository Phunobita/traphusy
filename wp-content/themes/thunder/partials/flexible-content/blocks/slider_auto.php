<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="slider-auto-blk <?php echo $fx_setting['class']; ?> ">
    <div class="wrapper relative <?php echo $fx_setting['block_width']; ?>">

        <?php if (have_rows('slides_list')) : ?>
            <?php while (have_rows('slides_list')) :
                the_row(); ?>

                <?php if (have_rows('slide_item')) : ?>
                    <div class="banner-auto-item fade">

                        <?php while (have_rows('slide_item')) : the_row(); ?>

                            <?php get_template_part('partials/flexible-content/components/banner_full_image'); ?>

                        <?php endwhile; ?>

                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>