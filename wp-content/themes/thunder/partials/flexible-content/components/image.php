<?php
$style = get_sub_field('style');
$image = get_sub_field('image');
$gallery = get_sub_field('gallery');

$ratio = get_sub_field('ratio');
$crop = get_sub_field('crop')  ? 'fit-cover' : 'fit-contain';
$lazy_loading = get_sub_field('lazy_loading') ? 'lazy' : '';
$logo_style = get_sub_field('logo_style') ? 'logo-style' : '';
$width = get_sub_field('width');
$height = get_sub_field('height');
?>

<?php if ($image && $style === 'single') : ?>

<div class="image-box-cpt">
    <div class="box-ratio <?php echo $ratio; ?>">
        <img class="img <?php echo $crop; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
            loading="<?php echo $lazy_loading; ?>" decoding="async" />
    </div>
</div>

<?php endif; ?>

<?php if ($gallery && $style === 'gallery') : ?>

<?php foreach ($gallery as $image) : ?>

<div class="image-box-cpt gallery fx-item <?php echo $logo_style; ?>">
    <div class="box-ratio <?php echo $ratio; ?>">
        <img class="img <?php echo $crop; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
            loading="<?php echo $lazy_loading; ?>" decoding="async" />
    </div>
</div>

<?php endforeach; ?>

<?php endif; ?>