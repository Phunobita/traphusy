<?php
$class = get_sub_field('class');
$link = get_sub_field('link');
$position = get_sub_field('position');
if ($position === 'after') {
    $postionIcon = "-after";
} else {
    $postionIcon = "-before";
}
?>

<?php if ($link['url']) : ?>
<a class="link-cpt link <?php echo $class; ?>" href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] === "0" ? '' : '_blank'; ?>">

    <div class="link-cpt-icon<?php echo $postionIcon; ?>">
        <?php if ($icon = get_sub_field('icon')) : ?>
        <!-- Icon -->
        <span class="icon-box">
            <svg class="icon icon-<?php echo $icon; ?> mr-sm ml-sm">
                <use xlink:href="#icon-<?php echo $icon; ?>"></use>
            </svg>
        </span>


        <?php endif; ?>
        <!-- Title -->
        <span class="title"><?php echo $link['title']; ?></span>

    </div>

</a>
<?php endif; ?>