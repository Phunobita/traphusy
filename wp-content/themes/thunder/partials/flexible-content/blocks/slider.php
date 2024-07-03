<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="slider-blk <?php echo $fx_setting['class']; ?> ">
    <div class="wrapper relative <?php echo $fx_setting['block_width']; ?>">

        <?php if (have_rows('slides_list')) : ?>
        <?php while (have_rows('slides_list')) :
                the_row(); ?>

        <?php if (have_rows('slide_item')) : ?>
        <div class="banner-item">

            <?php while (have_rows('slide_item')) : the_row(); ?>

            <?php get_template_part('partials/flexible-content/components/banner_full_image'); ?>

            <?php endwhile; ?>

        </div>
        <?php endif; ?>

        <?php endwhile; ?>

        <!-- ARROW -->
        <div class="nav-slide">
            <span class="slide-arrow next" onclick="plusSlides(1)">
                <svg class="icon icon-arrow_right_alt">
                    <use xlink:href="#icon-arrow_right_alt"></use>
                </svg>
            </span>
            <span class="slide-arrow prev" onclick="plusSlides(-1)">
                <svg class="icon icon-arrow_right_alt">
                    <use xlink:href="#icon-arrow_right_alt"></use>
                </svg>
            </span>
        </div>
        <?php endif; ?>

    </div>
</section>