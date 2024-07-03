<?php
$style = get_sub_field('style');
$style_class = '';
if ($style && $style[0] === 'yes') {
    $style_class = 'highlight';
}
?>

<div class="card-icon-cpt fx-item <?php echo $style_class; ?>">

    <?php if ($icon = get_sub_field('icon')) : ?>

        <!-- Icon -->
        <div class="icon-box">
            <svg class="icon icon-<?php echo $icon; ?>">
                <use xlink:href="#icon-<?php echo $icon; ?>"></use>
            </svg>
        </div>

    <?php endif; ?>

    <?php if ($title = get_sub_field('title')) : ?>

        <!-- Title -->
        <h2 class="title uppercase m-none c-primary mb-md"> <?php echo esc_html($title); ?></h2>

    <?php endif; ?>

    <?php if ($paragraph = get_sub_field('paragraph')) : ?>

        <!-- Paragraph -->
        <p class="m-none"><?php echo $paragraph; ?></p>
        
    <?php endif; ?>

</div>
