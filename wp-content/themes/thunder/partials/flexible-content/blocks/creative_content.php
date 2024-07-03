<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<section class="creative-content-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">

        <!-- HEADING -->
        <?php if ($title = get_sub_field('title')) : ?>
            <h2 class="headline heading-medium t-center m-none mb-md"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="content-box d-flex">
            <div class="paragraph">

                <!-- MAIN CONTENT -->
                <?php if ($main_content = get_sub_field('main_content')) : ?>
                    <p class="heading c-primary bold m-none mb-sm "><?php echo $main_content; ?></p>
                <?php endif; ?>

                <!-- SUB CONTENT -->
                <?php if ($sub_content = get_sub_field('sub_content')) : ?>
                    <p class="m-none"><?php echo $sub_content; ?></p>
                <?php endif; ?>

            </div>

            <!-- LARGE TEXT -->
            <?php if ($large_text = get_sub_field('large_text')) : ?>
                <p class="large-text heading-large uppercase c-primary m-none "><?php echo esc_html($large_text); ?></p>
            <?php endif; ?>

        </div>

    </div>
</section>
