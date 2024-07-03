<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<?php
$post_settings = get_sub_field('post_settings');
if ($post_settings) {
    $post_type = $post_settings['post_type'];
    $categories = $post_settings['category'];
    // var_dump($category);
    $post_attribute = $post_settings['post_attribute'];

    $posts = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'fields' => 'ids',
        'no_found_rows' => true,
    );

    // Recent Posts
    if ($post_attribute === 'recent') {
        if ($categories) {
            $posts['tax_query']['relation'] = 'OR';
            foreach ($categories as $key => $term) {
                $term_id = $term->term_id;
                $taxonomy = $term->taxonomy;

                $posts['tax_query'][] = array(
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $term_id
                );
            }
        }

        if (is_archive()) {
            $objects = get_queried_object();

            $posts['tax_query'][] = array(
                'taxonomy' => $objects->taxonomy,
                'field' => 'term_id',
                'terms' => $objects->term_id
            );
        }
        // var_dump($posts);
    }

    // Select Posts
    if ($post_attribute === 'select') {
        $posts['post_type'] =  'any';
        $posts['post__in'] =  $post_settings['select_posts'];
        // $posts['orderby'] =  'post__in';
    }

    if ($post_type === 'product') {
        $posts['tax_query'] = array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
            ),
        );
    }
    // Related Posts
    if ($post_attribute === 'related' && is_single()) {
        $post_id = get_the_ID();
        $post_type = get_post_type($post_id);
        $posts['post__not_in'] = array($post_id);
        $posts['post_type'] =  $post_type;
        if ($post_type === 'post') {
            $term_ids = wp_get_post_terms($post_id, array('category'),  array("fields" => "ids"));
            $posts['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'ids',
                    'terms'    => $term_ids,
                    'operator' => 'IN',
                ),
            );
        }



        if ($post_type === 'project') {
            $location = get_field('location');

            $posts['meta_query'] = array(
                array(
                    'key'     => 'location',
                    'value'   => array($location),
                    'compare' => 'IN',
                ),
            );
        }
    }

    $posts_query = new WP_Query($posts);
}

$post_type_item = 'post-item';
if ($post_type == 'team') {
    $post_type_item .= '-team';
}

if (get_sub_field('column_display')) {
    $column_display = 'fx-column-' . get_sub_field('column_display');
}

?>

<section class="slider-posts <?php echo $fx_setting['class'] ?> ">
    <div class="slide wrapper <?php echo $fx_setting['block_width']; ?>">

        <?php if (have_rows('heading')) : ?>

            <!-- HEADING -->
            <?php while (have_rows('heading')) : the_row(); ?>

                <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>

        <?php endif; ?>

        <!-- ARROW -->
        <?php if (get_sub_field('arrow_display')) : ?>
            <div class="nav-slide">
                <span class="slide-arrow next">
                    <span class="text">Next</span>
                    <svg class="icon icon-arrow_right_alt">
                        <use xlink:href="#icon-arrow_right_alt"></use>
                    </svg>
                </span>
                <span class="slide-arrow prev">
                    <span class="text">Prev</span>
                    <svg class="icon icon-arrow_right_alt">
                        <use xlink:href="#icon-arrow_right_alt"></use>
                    </svg>
                </span>
            </div>
        <?php endif; ?>

        <!-- POSTS -->
        <?php if ($posts_query->have_posts()) : ?>
            <div class="content-posts slide-container">
                <div class="list-posts slide-list fx-layout <?php echo $column_display; ?> fx-column-gap">
                    <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                        <?php get_template_part('partials/content',  $post_type_item); ?>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <?php get_template_part('partials/content', 'none'); ?>
        <?php endif; ?>

        <!-- DOTS -->
        <?php if (get_sub_field('dots_display')) : ?>
            <div class="slide-dots"></div>
        <?php endif; ?>

    </div>
</section>