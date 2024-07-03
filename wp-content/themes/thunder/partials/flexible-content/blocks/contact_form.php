<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<?php
$category = get_sub_field('category');
if ($category) {
    $term_id = $category->term_id;
    $term_slug = $category->slug;
}
$mark_dot = '<span class="c-primary"> *</span>';
$message_label = '';
$message_placeholder = '';

if ($full_name = get_field('full_name', 'options')) {
    $full_name_label = $full_name['label'];
    $full_name_placeholder = $full_name['placeholder'];
};
if ($phone = get_field('phone', 'options')) {
    $phone_label = $phone['label'];
    $phone_placeholder = $phone['placeholder'];
};
if ($subject = get_field('subject', 'options')) {
    $subject_label = $subject['label'];
    $subject_placeholder = $subject['placeholder'];
};
if ($message = get_field('message', 'options')) {
    $message_label = $message['label'];
    $message_placeholder = $message['placeholder'];
};
if ($position = get_field('position', 'options')) {
    $position_label = $position['label'];
    $position_placeholder = $position['placeholder'];
};
if ($attachment = get_field('attachment', 'options')) {
    $attachment_label = $attachment['label'];
    $attachment_placeholder = $attachment['placeholder'];
};
$attachment_note = get_field('attachment_note', 'options');
$submit_text = get_field('submit_text', 'options');

if ($term_slug !== 'business') {
    $message_label = $position_label;
    $message_placeholder = $position_placeholder;
}
?>

<section class="contact-form-blk <?php echo $fx_setting['class'] ?> <?php echo get_sub_field('image_position') === 'left' ? '' : 'right-image'; ?>">
    <div class="wrapper <?php echo $fx_setting['block_width']; ?>">

        <div class="col-image">

            <?php if (have_rows('image')) : ?>

            <!-- IMAGE -->
            <?php while (have_rows('image')) : the_row(); ?>

            <?php get_template_part('partials/flexible-content/components/image'); ?>

            <?php endwhile; ?>

            <?php endif; ?>


        </div>

        <div class="col-form">

            <?php if (have_rows('heading')) : ?>

            <!-- HEADING -->
            <?php while (have_rows('heading')) : the_row(); ?>

            <?php get_template_part('partials/flexible-content/components/heading'); ?>

            <?php endwhile; ?>

            <?php endif; ?>

            <?php if (have_rows('paragraph')) : ?>

            <!-- PARAGRAPH -->
            <?php while (have_rows('paragraph')) : the_row(); ?>

            <?php get_template_part('partials/flexible-content/components/content'); ?>

            <?php endwhile; ?>

            <?php endif; ?>

            <!-- FORM -->
            <form class="form" action="" method="post" enctype="multipart/form-data">

                <ul id="message-box" class="list-none"></ul>

                <div class="form-group">
                    <label class="label" class="label" for="customer_name"><?php echo $full_name_label . $mark_dot; ?> </label>
                    <input class="input" type="text" name="customer_name" id="" placeholder="<?php echo $full_name_placeholder; ?>" required>
                </div>
                <div class="form-group">
                    <label class="label" for="customer_phone"><?php echo $phone_label . $mark_dot; ?></label>
                    <input class="input" type="tel" name="customer_phone" id="" placeholder="<?php echo $phone_placeholder; ?>" required>
                </div>
                <div class="form-group">
                    <label class="label" for="customer_subject"><?php echo $subject_label . $mark_dot; ?></label>
                    <input class="input" type="text" name="customer_subject" id="" placeholder="<?php echo $subject_placeholder; ?>" required>
                </div>
                <div class="form-group">
                    <label class="label" for="customer_mess"><?php echo $message_label . $mark_dot; ?></label>
                    <textarea class="input" name="customer_mess" id="" rows="4" placeholder="<?php echo $message_placeholder; ?>" required></textarea>
                </div>
                <div class="form-group">
                    <div>
                        <label class="label" for="customer_attachment"><?php echo $attachment_label; ?></label>
                        <span class="t-small"><?php echo $attachment_note; ?></span>
                    </div>
                    <input class="input" type="file" name="customer_attachment" id="" placeholder="" data-id="<?php echo $attachment_placeholder; ?>">
                </div>

                <input type="hidden" name="term_id" value="<?php echo $term_id; ?>">

                <div class="form-group">
                    <button class="submit btn btn-primary" type="submit" name="submit_form"><?php echo $submit_text; ?></button>
                </div>

            </form>
        </div>

    </div>
</section>