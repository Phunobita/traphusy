<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<?php $card_total = count(get_sub_field('cards_list')); ?>

<section class="cards-icon-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">

        <!-- CARDS LIST-->
        <?php if (have_rows('cards_list')) : ?>
            <div class="cards-list fx-layout fx-grid fx-column-<?php echo $card_total; ?> fx-column-mobile-2 fx-column-gap">
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

