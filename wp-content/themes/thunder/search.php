<?php get_header(); ?>

<?php
$s = get_search_query();
$args = array(
    's' => $s
);
// The Query
$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()) : ?>

    <?php _e("<h2 style='font-weight:bold;color:#000'>Search Results for: " . get_query_var('s') . "</h2>"); ?>

    <div class="fx-layout fx-grid fx-column-4 fx-column-gap site-container">

        <!-- POSTS -->
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php get_template_part('partials/content', 'post-item'); ?>
        <?php endwhile; ?>

    </div>>

<?php else : ?>

    <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
    <div class="alert alert-info">
        <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
    </div>

<?php endif; ?>

<?php get_footer(); ?>