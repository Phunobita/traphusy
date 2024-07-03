<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="address-content-blk <?php echo $fx_setting['class'] ?>">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">

        <?php if (have_rows('heading')) : ?>

            <!-- HEADING -->
            <?php while (have_rows('heading')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>

        <?php endif; ?>

        <!-- HEADQUARTERS ADDRESS -->
        <div class="col-headquarters">

            <?php if (have_rows('host_info', 'options')) : ?>

                <?php while (have_rows('host_info', 'options')) : the_row(); ?>

                    <?php get_template_part('partials/flexible-content/components/branch_info'); ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

        <!-- BRANCHES ADDRESS -->
        <div class="col-branch">

            <?php $branches = get_sub_field('branches'); ?>

            <?php if ($branches) : ?>
                <?php foreach ($branches as $branche_id) : ?>

                    <?php if (have_rows('branch_info', $branche_id)) : ?>

                        <?php while (have_rows('branch_info', $branche_id)) : the_row(); ?>

                            <?php get_template_part('partials/flexible-content/components/branch_info'); ?>

                        <?php endwhile; ?>

                    <?php endif; ?>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>
</section>
