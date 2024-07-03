<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>
<?php
$column = get_sub_field('column_display');
?>

<section class="gallery-content-blk <?php echo $fx_setting['class'] ?>" style="background:<?php echo get_sub_field('background_color') ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">
        <div class="fx-layout fx-grid fx-column-<?php echo $column ?> fx-column-gap">
            <?php if (have_rows("list_item")) : ?>
                <?php while (have_rows("list_item")) : the_row(); ?>
                    <div class="gallery-content-item fx-item">
                        <!-- ICON -->
                        <div class="gallery-content-item-div">
                            <div class="gallery-content-blk-icon">
                                <?php echo get_sub_field('icon') ?>
                            </div>
                            <div class="gallery-content-blk-content">
                                <!-- Heading -->
                                <?php if (have_rows('heading')) : ?>
                                    <?php while (have_rows('heading')) : the_row(); ?>
                                        <?php get_template_part('partials/flexible-content/components/heading'); ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <!-- Content -->
                                <?php if (have_rows('paragraph')) : ?>
                                    <?php while (have_rows('paragraph')) : the_row(); ?>
                                        <?php get_template_part('partials/flexible-content/components/content'); ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>