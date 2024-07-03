<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<?php
$post_settings = get_sub_field('post_settings');
if ($post_settings) {

    $post_type = $post_settings['post_type'];
    $categories = $post_settings['category'];
    // var_dump($category);
    $post_attribute = $post_settings['post_attribute'];

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'orderby'        => 'date',
        'order'         => 'DESC',
        'nopaging'      => false,
        'paged' => $paged
    );

    $data_args = array();
    if ($categories) {
        foreach ($categories as $key => $term) {
            $term_id = $term->term_id;
            $taxonomy = $term->taxonomy;

            $args['tax_query'] = array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $term_id
                )
            );

            $data_args[] = array(
                'query' => $args,
                'post_type' => $post_type,
                'tax_name' => $taxonomy,
                'term_id' => $term_id,

            );
        }
    } else {
        if (is_archive()) {
            $objects = get_queried_object();
            $tax_query = array(
                array(
                    'taxonomy' => $objects->taxonomy,
                    'field' => 'term_id',
                    'terms' => $objects->term_id
                )
            );
            $args['tax_query'] = $tax_query;
        }
        $data_args[] = array(
            'query' => $args,
            'post_type' => $post_type,
            'tax_name' => '',
            'term_id' => '',

        );
    }
}

$post_type_item = 'post-item';
if ($post_type == 'team') {
    $post_type_item .= '-team';
}
if (get_sub_field('column_display')) {
    $fx_column = 'fx-column-' . get_sub_field('column_display');
}


?>

<?php $sidebar = get_sub_field('sidebar'); ?>

<section class="grid-posts <?php echo $categories ? 'tab-layout' : ''; ?> <?php echo $fx_setting['class'] ?> <?php echo $post_type; ?>">
    <div class=" <?php echo $fx_setting['block_width']; ?>">

        <?php if (have_rows('heading')) : ?>

        <!-- HEADING -->
        <?php while (have_rows('heading')) : the_row(); ?>

        <?php get_template_part('partials/flexible-content/components/heading'); ?>

        <?php endwhile; ?>

        <?php endif; ?>

        <!-- TABS LINE -->
        <?php if ($categories) : ?>
        <div class=" tab-line">

            <?php foreach ($categories as $key => $term) : ?>
            <div class="tab-link <?php echo $key === 0 ? 'active' : ''; ?>" data-id="<?php echo $term->term_id; ?>"><?php echo esc_html($term->name); ?></div>
            <?php endforeach; ?>

            <?php if ($post_type == 'team') : ?>
            <div class="tab-link chart btn btn-primary ml-auto" data-id="chart">
                <svg class="icon icon-sitemap mr-sm">
                    <use xlink:href="#icon-sitemap"></use>
                </svg>
            </div>
            <?php endif; ?>

        </div>
        <?php endif; ?>

        <!-- TABS BOX -->
        <?php if ($data_args) : ?>
        <div class="" style="<?php if ($sidebar === 'block') {
                                        echo 'display: flex';
                                    } ?>">
            <div class="list-post-news" style="<?php if ($sidebar === 'block') {
                                                        echo 'width: 80%';
                                                    } ?>">

                <!-- POSTS - TERM -->
                <?php foreach ($data_args as $key => $args) : ?>

                <?php $query = $args['query'] ?  new WP_Query($args['query']) : ''; ?>

                <div id="<?php echo $args['term_id']; ?>" class="<?php echo $categories ? 'tab-content' : ''; ?> <?php echo $key === 0 ? 'active' : ''; ?> pagination">
                    <?php if ($query->have_posts()) : ?>

                    <div class="pagination-content fx-layout fx-grid <?php echo $fx_column; ?> fx-column-gap " data-type="<?php echo $post_type; ?>" data-tax="<?php echo $args['tax_name']; ?>"
                        data-term="<?php echo $args['term_id']; ?>">

                        <!-- POSTS -->
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php get_template_part('partials/content',  $post_type_item); ?>
                        <?php endwhile; ?>

                    </div>

                    <!-- PAGINATION -->
                    <?php
                                $total_pages = $query->max_num_pages;
                                if ($total_pages > 1) {
                                    $arrow = '<svg class="icon icon-arrow_right_alt"><use xlink:href="#icon-arrow_right_alt"></use></svg>';
                                    $pagination_args = array(
                                        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                        'format'       => '?page=%#%',
                                        'total'           => $total_pages,
                                        'current'         => max(1, get_query_var('paged')),
                                        'show_all'        => False,
                                        'type'         => 'plain',
                                        'prev_text' =>  $arrow,
                                        'next_text' => $arrow,
                                    );
                                    $paginate_links = paginate_links($pagination_args);
                                    if ($paginate_links) {
                                        echo "<nav class='pagination-nav'>";
                                        echo $paginate_links;
                                        echo "</nav>";
                                    }
                                }
                                ?>

                    <?php wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div>

                <?php endforeach; ?>

                <?php if ($post_type == 'team') : ?>

                <!-- CHART ORGANIZATION -->
                <?php if (have_rows('host_organization_chart', 'options')) : ?>

                <div id="chart" class="tab-content chart">

                    <?php while (have_rows('host_organization_chart', 'options')) : the_row(); ?>

                    <?php get_template_part('partials/flexible-content/components/image'); ?>

                    <?php endwhile; ?>

                </div>

                <?php endif; ?>

                <?php endif; ?>

            </div>
            <div class="sidebar-posts" style="display: <?php echo $sidebar ?>">

                <?php
                    if (is_active_sidebar('sidebar_posts')) {

                        dynamic_sidebar('sidebar_posts');
                    }
                    ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>