<?php
$post_id = 733; // Page 'News' 
$post_type = get_post_type() . 's';
$post_type_link = get_post_type_archive_link($post_type) . $post_type;

// if ($post_type === 'posts') {
//     if ($lang != 'en') {
//         // $post_id = pll_get_post($post_id);
//     }
//     $post_type = get_the_title($post_id);
//     $post_type_link = get_the_permalink($post_id);
// }
// ?>

<div class="breadcrumb relative mb-md">
    <?php if (!is_page()) : ?>
    <a class="link" href="<?php echo home_url(); ?>">
        <svg class="icon icon-home mr-sm">
            <use xlink:href="#icon-home"></use>
        </svg>
    </a>
    <svg class="icon icon-arrow_right_alt mr-sm">
        <use xlink:href="#icon-arrow_right_alt"></use>
    </svg>
    <a class="link" href="<?php echo $post_type_link; ?>"><?php echo ucfirst($post_type); ?></a>
    <?php endif; ?>
</div>