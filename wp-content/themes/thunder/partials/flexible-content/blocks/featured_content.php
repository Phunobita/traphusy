<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="featured-content-blk <?php echo $fx_setting['class'] ?>">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">

        <?php if (have_rows('columns_list')) : ?>
            <?php while (have_rows('columns_list')) :
                the_row(); ?>

                <div class="content-column c-white relative">

                    <!-- CAPTION -->
                    <?php if ($caption = get_sub_field('caption')) : ?>
                        <p class="caption t-small uppercase bg-primary m-none"> <?php echo esc_html($caption); ?></p>
                    <?php endif; ?>

                    <!-- PARAGRAPH -->
                    <?php if ($paragraph = get_sub_field('paragraph')) : ?>
                        <h3 class="paragraph heading-medium m-none"><?php echo $paragraph; ?></h3>
                    <?php endif; ?>

                    <!-- ICON -->
                    <?php if ($icon = get_sub_field('icon')) : ?>
                        <div class="icon-box">
                            <svg class="icon icon-<?php echo $icon; ?> mr-sm">
                                <use xlink:href="#icon-<?php echo $icon; ?>"></use>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- LINE -->
                <?php if (get_row_index() === 0) : ?>
                    <div class="line-break"></div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>
