<?php
$post_type = get_post_type();
$post_title = get_the_title();
$post_link = get_the_permalink();
$post_date_date = get_the_date('j');
$post_date_month = get_the_date('M');
$thumbnail_acf = get_field('thumbnail_acf');
$post_cat = get_categories();

global $product;

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

$class = array(
    'post-item' => '',
    'bg'        => '',
    'margin'    => 'mb-md',
);

if ($post_type === 'solution') {
    $class['post-item'] = 'overlay c-white';
    $class['bg'] = 'bg-overlay';
    $class['margin'] = 'mb-sm';
}
?>

<!-- Content -->
<div class="post-item fx-item <?php echo $class['post-item']; ?> <?php echo $post_type; ?> ani-rotate">

    <?php if ($post_type == 'product') : ?>
        <a class=" box-ratio <?php echo $class['bg']; ?>" href="<?php echo $post_link; ?>">
            <img class="img" src="<?php the_post_thumbnail_url($post_thumbnail) ?>" decoding="async" />

        </a>

        <?php
        ?>
    <?php endif; ?>

    <?php if ($thumbnail_acf) : ?>
        <a class="box-ratio <?php echo $class['bg']; ?>" href="<?php echo $post_link; ?>">
            <img class="img fit-cover" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $thumbnail_acf['url']; ?>" alt="<?php echo $thumbnail_acf['alt']; ?>" loading="<?php echo $lazy_loading; ?>" decoding="async" />
        </a>
        <div class="post-detail-date">
            <div class="post-detail-date_date"><?php echo $post_date_date; ?></div>
            <div class="post-detail-date_month"><?php echo $post_date_month; ?></div>
        </div>
    <?php endif; ?>

    <div class="content">

        <!-- LOCATION -->
        <?php if ($location = get_field('location')) : ?>
            <div class="mb-sm">
                <span><?php echo esc_html($location); ?></span>
                <?php if ($post_type === 'post') : ?>
                    <svg class="icon icon-alarm_on">
                        <use xlink:href="#icon-alarm_on"></use>
                    </svg>
                    <time datetime="<?php echo $post_date; ?>"><?php echo $post_date; ?></time>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Category -->
        <div class="post-category">
            <?php
            $categories = get_the_category(); // Get an array of category objects for the current post

            if ($categories) {
                foreach ($categories as $category) {
                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                }
            }
            ?>

        </div>


        <!-- TITLE -->
        <h2 class="title heading" style="font-size: 18px;">
            <a class="link truncate-text line-2" href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
                <?php echo $post_title; ?>
            </a>
        </h2>


        <!-- post type: product -> description -->

        <?php if ($post_type == 'product') : ?>
            <div class="<?php echo $post_type ?>-information">
                <!-- <div class="<?php echo $post_type ?>-information-category mb-sm">
                    <?php echo $product->get_categories(); ?>
                </div> -->
                <div class="<?php echo $post_type ?>-information-price">
                    <span>

                        <?php echo $product->get_price_html(); ?>

                    </span>
                    <span><?php echo do_shortcode('[ti_wishlists_addtowishlist]') ?></span>
                </div>
                <div class="<?php echo $post_type ?>-add-to-cart">
                    <a class="list-favorite-product-item-btn  ajax_add_to_cart" href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">Thêm vào giỏ hàng</a>

                </div>
            </div>
        <?php endif; ?>

        <!-- SHORT DESCRIPTION -->
        <?php if ($short_description = get_field('short_description')) : ?>
            <div class="m-none mb-sm truncate-text line-3">
                <?php echo $short_description; ?>
            </div>
        <?php endif; ?>

        <!-- LINK -->
        <?php if ($post_type !== 'product') : ?>
            <a class="link c-primary" href="<?php echo $post_link; ?>">
                <span>Chi tiết</span>
                <svg class="icon icon-arrow_right_alt">
                    <use xlink:href="#icon-arrow_right_alt"></use>
                </svg>
            </a>
        <?php endif; ?>

    </div>
</div>