<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="hero-images-content-blk relative <?php echo $fx_setting['class'] ?>">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">

        <!-- HEADING -->
        <?php if (have_rows('heading')) : ?>
            <?php while (have_rows('heading')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

        <!-- PARAGRAPH -->
        <?php if (have_rows('paragraph')) : ?>
            <?php while (have_rows('paragraph')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/content'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

        <!-- IMAGES -->
        <?php if (have_rows('images_list')) : ?>
            <div class="fx-layout fx-grid fx-column-gap fx-column-change-3 fx-column-mobile-2">
                <?php while (have_rows('images_list')) :
                    the_row(); ?>

                    <div class="image-item fx-item relative">

                        <!-- IMAGE -->
                        <?php if (have_rows('image')) : ?>
                            <?php while (have_rows('image')) : the_row(); ?>

                                <?php get_template_part('partials/flexible-content/components/image'); ?>

                            <?php endwhile; ?>
                        <?php endif; ?>

                        <!-- TEXT -->
                        <div class="content">
                            <?php if ($title = get_sub_field('title')) : ?>
                                <h2 class="heading-medium m-none mb-sm"><?php echo esc_html($title); ?></h2>
                            <?php endif; ?>

                            <?php if ($content = get_sub_field('content')) : ?>
                                <p class="heading m-none"><?php echo esc_html($content); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <!-- BACKGROUND IMAGES -->
        <?php if (have_rows('backgroud_image')) : ?>
            <div class="bg-image">

                <?php while (have_rows('backgroud_image')) : the_row(); ?>

                    <?php get_template_part('partials/flexible-content/components/image'); ?>

                <?php endwhile; ?>

            </div>
        <?php endif; ?>

    </div>
</section>
