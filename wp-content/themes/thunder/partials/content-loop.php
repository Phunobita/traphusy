<?php
$objects = get_queried_object();
if (is_archive() && !is_post_type_archive()) {
    $term_id = $objects->taxonomy . '_' . $objects->term_id;
} else {
    $term_id = '';
}



// LOOP
if (has_flexible('flexible_content', $term_id)) :

    the_flexible('flexible_content', $term_id);

else :
    get_template_part('partials/content', 'default');

endif;