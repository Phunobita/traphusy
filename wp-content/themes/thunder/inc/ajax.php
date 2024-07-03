<?php
// PROCESS PAGINATION
add_action('wp_ajax_send_page_data', 'wpt_process_pagination');
add_action('wp_ajax_nopriv_send_page_data', 'wpt_process_pagination');

if (!function_exists('wpt_process_pagination')) {
    function wpt_process_pagination() {

        if (!wp_verify_nonce($_POST['nonce'], 'wpt_ajax_nonce')) {
            die('Permission Denied.');
        }

        $pagedNumber = intval($_POST['pagedNumber']);
        $base = $_POST['base'];

        $post_type = isset($_POST['post_type']) ? $_POST['post_type'] : '';
        $taxonomy = isset($_POST['taxonomy']) ? $_POST['taxonomy'] : '';
        $term_id = isset($_POST['term_id']) ? intval($_POST['term_id']) : '';

        $tax_query = '';
        if ($taxonomy && $term_id) {
            $tax_query = array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $term_id
                )
            );
        }

        $args = array(
            'post_type' => $post_type,
            'tax_query' => $tax_query,
            'post_status' => 'publish',
            'orderby'        => 'date',
            'order'         => 'DESC',
            'nopaging'      => false,
            'paged' =>  $pagedNumber,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :

            ob_start();
            while ($query->have_posts()) : $query->the_post();
                get_template_part('partials/content', 'post-item');
            endwhile;
            $posts = ob_get_clean();

            ob_start();
            $total_pages = $query->max_num_pages;
            if ($total_pages > 1) {
                $arrow = '<svg class="icon icon-arrow_right_alt"><use xlink:href="#icon-arrow_right_alt"></use></svg>';
                $pagination_args = array(
                    'base'         => trailingslashit($base) . '%_%',
                    'format'       => 'page/%#%',
                    'total'           => $total_pages,
                    'current'         => max(1, $pagedNumber),
                    'show_all'        => False,
                    'type'         => 'plain',
                    'prev_text' =>  $arrow,
                    'next_text' => $arrow,

                );
                $paginate_links = paginate_links($pagination_args);
                if ($paginate_links) {
                    echo $paginate_links;
                }
            }
            $pagination = ob_get_clean();

            wp_reset_postdata();

        endif;

        $return = array(
            'posts' => $posts,
            'pagination'      => $pagination
        );

        wp_send_json_success($return);

        die();
    }
}
// END - PROCESS PAGINATION

// PROCESS CONTACT FORM
add_action('wp_ajax_send_contact_form_data', 'wpt_process_contact_form');
add_action('wp_ajax_nopriv_send_contact_form_data', 'wpt_process_contact_form');

if (!function_exists('wpt_process_contact_form')) {
    function wpt_process_contact_form() {
        $deny_text = get_field('deny_text', 'options');

        if (!wp_verify_nonce($_POST['nonce'], 'wpt_ajax_nonce')) {
            die($deny_text);
        }

        $post_type = 'contact';
        $taxonomy = 'intent_tax';
        $term_id = isset($_POST['term_id']) ? intval($_POST['term_id']) : '';
        $term_slug = get_term_by('id', $term_id, $taxonomy)->slug;
        $message_label = '';

        if ($full_name = get_field('full_name', 'options')) {
            $full_name_label = $full_name['label'];
        };
        if ($phone = get_field('phone', 'options')) {
            $phone_label = $phone['label'];
        };
        if ($subject = get_field('subject', 'options')) {
            $subject_label = $subject['label'];
        };
        if ($message = get_field('message', 'options')) {
            $message_label = $message['label'];
        };
        if ($position = get_field('position', 'options')) {
            $position_label = $position['label'];
        };
        if ($term_slug !== 'business') {
            $message_label = $position_label;
        }
        $success_text = get_field('success_text', 'options');
        $file_error = get_field('file_error', 'options');
        $error_field = get_field('error_field', 'options');

        $status = 1; // Success
        $message = [];
        $error_text = [
            'customer_name' => '<strong class="c-primary">* ' . $full_name_label . '</strong> ' . $error_field . '',
            'customer_phone' => '<strong class="c-primary">* ' . $phone_label . '</strong> ' . $error_field . '',
            'customer_subject' => '<strong class="c-primary">* ' . $subject_label . '</strong> ' . $error_field . '',
            'customer_mess' => '<strong class="c-primary">* ' . $message_label . '</strong> ' . $error_field . '',
            'customer_attachment' => '<strong class="c-primary">* ' . $file_error . '</strong>',
            'success' => '<strong class="c-success">' . $success_text . '</strong>',
        ];
        $maxSize = 5;



        $customer_name = isset($_POST['customer_name']) ? sanitize_text_field($_POST['customer_name']) :  '';
        $customer_phone = isset($_POST['customer_phone']) ? sanitize_text_field($_POST['customer_phone']) : $status = 0;
        $customer_subject = isset($_POST['customer_subject']) ? sanitize_text_field($_POST['customer_subject']) : $status = 0;
        $customer_mess = isset($_POST['customer_mess']) ? sanitize_text_field($_POST['customer_mess']) : $status = 0;
        $file_data = isset($_FILES['file_data']) ? $_FILES['file_data'] : '';

        if (!$customer_name) {
            $status = 0;
            $message[] = $error_text['customer_name'];
        }
        if (!$customer_phone) {
            $status = 0;
            $message[] = $error_text['customer_phone'];
        }
        if (!$customer_subject) {
            $status = 0;
            $message[] = $error_text['customer_subject'];
        }
        if (!$customer_mess) {
            $status = 0;
            $message[] = $error_text['customer_mess'];
        }
        if (!$file_data || $file_data['size'] / 1024 / 1024 >  $maxSize || $file_data['type'] != 'application/x-zip-compressed' && $file_data['type'] != 'application/zip') {
            $status = 0;
            $message[] = $error_text['customer_attachment'];
        }

        if ($status == 1) {
            $message[] = $error_text['success'];

            $new_contact = array(
                'post_type' => $post_type,
                'post_status' => 'pending',
                'post_title' =>  wp_strip_all_tags($customer_name),
            );

            $contact_id = wp_insert_post($new_contact);

            $my_post = array(
                'ID'           => $contact_id,
                'post_name' => wp_strip_all_tags($customer_name) . '-' . $contact_id,
            );

            wp_update_post($my_post);

            wp_set_object_terms($contact_id, intval($term_id), $taxonomy);

            update_field('customer_name', $customer_name, $contact_id);
            update_field('customer_phone', $customer_phone, $contact_id);
            update_field('customer_subject', $customer_subject, $contact_id);
            update_field('customer_phone', $customer_phone, $contact_id);
            update_field('customer_message', $customer_mess, $contact_id);

            if (!function_exists('wp_handle_upload')) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

            // Move file to media library
            $movefile = wp_handle_upload($file_data, array('test_form' => false));

            // If move was successful, insert WordPress attachment
            if ($movefile && !isset($movefile['error'])) {
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename($movefile['file']),
                    'post_mime_type' => $movefile['type'],
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($movefile['file'])),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attach_id = wp_insert_attachment($attachment, $movefile['file']);

                // Assign the file as the featured image
                update_field('customer_attachment', $attach_id, $contact_id);
            }
        }

        $return = array(
            'status' =>  $status,
            'message' =>  $message,
        );

        wp_send_json_success($return);

        die();
    }
}
// END - PROCESS CONTACT FORM