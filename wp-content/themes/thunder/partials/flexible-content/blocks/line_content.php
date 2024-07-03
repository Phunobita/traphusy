<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>
<?php $heading_position = get_sub_field('heading_position') ? '' : 'on-right'; ?>
<section class="line-content-blk <?php echo $fx_setting['class'] ?> <?php echo $heading_position ?>">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">

        <!-- HEADING -->
        <?php if (have_rows('heading')) : ?>
            <?php while (have_rows('heading')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

        <!-- CONTENT -->
        <div class="content-col">
            <?php if (have_rows('paragraphs_list')) : ?>
                <?php while (have_rows('paragraphs_list')) :
                    the_row(); ?>

                    <!-- PARAGRAPH -->
                    <?php if ($paragraph = get_sub_field('paragraph')) : ?>
                        <p class="paragraph m-none"> <?php echo esc_html($paragraph); ?></p>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>