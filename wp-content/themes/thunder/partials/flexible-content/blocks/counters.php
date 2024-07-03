<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="counters-blk <?php echo $fx_setting['class'] ?> ">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">

        <!-- COUNTERS -->
        <?php if (have_rows('counters_list')) : ?>
            <div class="counters-list d-flex flex-wrap flex-center">
                <?php while (have_rows('counters_list')) : the_row(); ?>

                    <?php if (have_rows('counter')) : ?>
                        <?php while (have_rows('counter')) : the_row(); ?>

                            <?php get_template_part('partials/flexible-content/components/counter'); ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
