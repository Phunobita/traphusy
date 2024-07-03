<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="contact-form-1-blk <?php echo $fx_setting['class'] ?>">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?> ">

        <div class="fx-layout fx-grid fx-column-2 fx-column-gap">
            <div class="col-headquaters fx-item">
                <?php if (have_rows('heading')) : ?>

                    <!-- HEADING -->
                    <?php while (have_rows('heading')) : the_row(); ?>

                        <?php get_template_part('partials/flexible-content/components/heading'); ?>

                    <?php endwhile; ?>

                <?php endif; ?>

                <?php if (have_rows('paragraph')) : ?>

                    <!-- PARAGRAPH -->
                    <?php while (have_rows('paragraph')) : the_row(); ?>

                        <?php get_template_part('partials/flexible-content/components/content'); ?>

                    <?php endwhile; ?>

                <?php endif; ?>

                <?php if ($custom_html = get_sub_field('custom_html', 'options')) : ?>
                    <div class=" custom-html">
                        <?php echo $custom_html ?>
                    </div>
                <?php endif; ?>


            </div>

            <div class="col-form fx-item">
                <?php if (have_rows('heading_form')) : ?>

                    <!-- HEADING -->
                    <?php while (have_rows('heading_form')) : the_row(); ?>

                        <?php get_template_part('partials/flexible-content/components/heading'); ?>

                    <?php endwhile; ?>

                <?php endif; ?>

                <?php if (have_rows('content_form')) : ?>

                    <!-- PARAGRAPH -->
                    <?php while (have_rows('content_form')) : the_row(); ?>

                        <?php get_template_part('partials/flexible-content/components/content'); ?>

                    <?php endwhile; ?>

                <?php endif; ?>
                <?php if (have_rows('contact_form')) : ?>
                    <!-- SHORTCODE -->
                    <?php while (have_rows('contact_form')) : the_row(); ?>

                        <?php get_template_part('partials/flexible-content/components/shortcode'); ?>

                    <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>