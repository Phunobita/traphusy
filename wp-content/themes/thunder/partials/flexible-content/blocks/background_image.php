<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="background-image-blk <?php echo $fx_setting['class']; ?> ">
    <div class="wrapper relative <?php echo $fx_setting['block_width']; ?>">


        <?php if (have_rows('bg_item_list')) : ?>
            <?php while (have_rows('bg_item_list')) :
                the_row(); ?>

                <?php if (have_rows('bg_image_item')) : ?>
                    <div class="banner-item">

                        <?php while (have_rows('bg_image_item')) : the_row(); ?>

                            <?php get_template_part('partials/flexible-content/components/banner_full_image'); ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>
</section>