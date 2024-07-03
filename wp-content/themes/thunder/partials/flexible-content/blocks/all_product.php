<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="all-product-blk <?php echo $fx_setting['class'] ?>" ?>
    <div class="<?php echo $fx_setting['block_width']; ?>">
        <!-- Heading -->
        <?php if (have_rows('heading')) : ?>
            <?php while (have_rows('heading')) : the_row(); ?>
                <?php get_template_part('partials/flexible-content/components/heading'); ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <!-- Content -->
        <?php if (have_rows('content')) : ?>
            <?php while (have_rows('content')) : the_row(); ?>
                <?php get_template_part('partials/flexible-content/components/content'); ?>
            <?php endwhile; ?>
        <?php endif; ?>



        <div class="all-product-shortcode">
            <?php if (have_rows('products')) : ?>
                <!-- SHORTCODE -->
                <?php while (have_rows('products')) : the_row(); ?>

                    <?php get_template_part('partials/flexible-content/components/shortcode'); ?>

                <?php endwhile; ?>

            <?php endif; ?>
        </div>

    </div>
</section>