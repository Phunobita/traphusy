<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>
<?php
$column = get_sub_field('column_display');
?>

<section class="gallery-category-blk <?php echo $fx_setting['class'] ?>" style="background:<?php echo get_sub_field('background_color') ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">
        <?php if (have_rows("heading")) : ?>
            <?php while (have_rows("heading")) : the_row(); ?>
                <?php get_template_part('partials/flexible-content/components/heading'); ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (have_rows("content")) : ?>
            <?php while (have_rows("content")) : the_row(); ?>
                <?php get_template_part('partials/flexible-content/components/content'); ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="list-category fx-layout fx-grid fx-column-<?php echo $column ?> fx-column-gap">
            <?php $args = array(
                'hide_empty' => 0,
                'taxonomy' => 'product_cat',
                'orderby' => 'id',
                'parent' => 0
            );
            $cates = get_categories($args);
            foreach ($cates as $cate) {  ?>
                <?php
                $thumbnail_id = get_woocommerce_term_meta($cate->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_url($thumbnail_id);
                ?>
                <div class="list-category-item fx-item">
                    <img class="list-category-item-img" src="<?php echo $image; ?>" alt="<?php echo $cate->name; ?>">
                    <a class="list-category-item-name" href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                        <?php echo $cate->name; ?><i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

</section>