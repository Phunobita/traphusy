<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="distribution-system-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">
        <div class="ist_branchs-title">
            <?php if (have_rows('title')) : ?>
                <?php while (have_rows('title')) : the_row(); ?>
                    <?php get_template_part('partials/flexible-content/components/heading'); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <select class="list_branchs-select">
            <?php if (have_rows('list_branchs')) : ?>
                <?php while (have_rows('list_branchs')) : the_row(); ?>

                    <option class="list_branchs-select-item" value="<?php echo get_field('branch_item') ?>"><?php echo get_sub_field('branch_item') ?></option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </div>
</section>