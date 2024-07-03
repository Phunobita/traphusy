<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>
<?php $card_total = count(get_sub_field('cards_list')); ?>

<section class="hero-cards-icon-image-blk <?php echo $fx_setting['class'] ?> relative">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">

        <div class="text-box mb-md">

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

        </div>

        <!-- BACKGROUND IMAGE -->
        <?php if (have_rows('backgroud_image')) : ?>
            <?php while (have_rows('backgroud_image')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/image'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

        <!-- CARDS LIST-->
        <?php if (have_rows('cards_list')) : ?>
            <div class="cards_list space-between fx-layout fx-grid fx-column-<?php echo $card_total; ?> fx-column-mobile-2 fx-column-gap">
                <?php while (have_rows('cards_list')) : the_row(); ?>

                    <?php if (have_rows('card')) : ?>
                        <?php while (have_rows('card')) : the_row(); ?>

                            <?php get_template_part('partials/flexible-content/components/card_icon'); ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
