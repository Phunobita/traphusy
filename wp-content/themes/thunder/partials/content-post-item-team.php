<?php
$thumbnail_acf = get_field('thumbnail_acf');
$post_type = get_post_type();

$field = $post_type . '_thumbnail';
$post_thumbnail = get_field($field, 'options');
if ($post_thumbnail) {
    $box_ratio = $post_thumbnail['ratio'];
    $width = $post_thumbnail['width'];
    $height = $post_thumbnail['height'];
    $crop = $post_thumbnail['crop'] === true ? 'fit-cover' : 'fit-contain';
    $lazy_loading = $post_thumbnail['lazy_loading'] === true ? 'lazy' : '';
    
    if (!$thumbnail_acf) {
        $thumbnail_acf = $post_thumbnail['image'];
    }
}
?>

<div class="post-item fx-item <?php echo $post_type ?>">
    <div class="thumbnail-box relative mb-sm">

        <!-- IMAGE -->
        <?php if ($thumbnail_acf) : ?>
            <div class="box-ratio <?php echo $box_ratio; ?>">
                <img class="img <?php echo $crop; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $thumbnail_acf['url']; ?>" alt="<?php echo $thumbnail_acf['alt']; ?>" loading="<?php echo $lazy_loading; ?>" decoding="async" />
            </div>
        <?php endif; ?>

        <!-- SHORT DES -->
        <?php if ($short_description = get_field('short_description')) : ?>
            <div class="short-des"><?php echo get_field('short_description') ?></div>
        <?php endif; ?>

    </div>

    <!-- POSITION -->
    <?php if ($position = get_field('position')) : ?>
        <p class="c-primary m-none"><?php echo esc_html($position); ?></p>
    <?php endif; ?>

    <!-- TITLE -->
    <h2 class="title bold uppercase m-none"><?php echo get_the_title() ?></h2>

</div>