<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<?php
$id = get_the_ID();
$date = get_the_date();
$location = get_field('location');

$term_ids = wp_get_post_terms($id, array('category'),  array("fields" => "ids"));

?>
<section class="nav-post-fields-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">

        <div class="fields">

            <!-- DATE -->
            <?php if ($date) : ?>
                <div class="post-field">
                    <svg class="icon icon-alarm_on">
                        <use xlink:href="#icon-alarm_on"></use>
                    </svg>
                    <span><?php echo $date; ?></span>
                </div>
            <?php endif; ?>

            <!-- TERM -->
            <?php if ($term_ids) : ?>
                <div class="post-field">
                    <svg class="icon icon-line_weight">
                        <use xlink:href="#icon-line_weight"></use>
                    </svg>
                    <?php foreach ($term_ids as $key => $term_id) : ?>
                        <?php
                        $term_link = get_term_link($term_id);
                        $term_name = get_term($term_id)->name;
                        $comma = '';
                        if ($key !== array_key_last($term_ids)) {
                            $comma = ', ';
                        }
                        ?>
                        <a class="link" href="<?php echo $term_link; ?>"><?php echo $term_name . $comma; ?></a>
                    <?php endforeach;   ?>
                </div>
            <?php endif; ?>

            <!-- LOCATION -->
            <?php if ($location) : ?>
                <div class="post-field">
                    <svg class="icon icon-pin_drop">
                        <use xlink:href="#icon-pin_drop"></use>
                    </svg>
                    <span><?php echo $location; ?></span>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>
