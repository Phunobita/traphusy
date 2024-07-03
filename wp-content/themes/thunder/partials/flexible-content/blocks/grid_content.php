<?php $fx_setting = wpt_flexible_content_get_setting_fields(); ?>

<?php
$count = 0;
$rows = get_sub_field('list_content');
if (is_array($rows)) {
    $count = count($rows);
}

if ($count == 1) {
    $count = 1;
} else {
    $count = 2;
}

?>


<section class="grid-content-blk <?php echo $fx_setting['class'] ?>">
    <div class="<?php echo $fx_setting['block_width']; ?>">

        <!-- HEADING -->
        <h2 class="headline heading-medium t-center m-none mb-md">
            <?php if (have_rows('title')) : ?>
                <?php while (have_rows('title')) : the_row(); ?>
                    <?php get_template_part('partials/flexible-content/components/heading'); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </h2>

        <div class="fx-layout fx-grid fx-column-2 fx-column-gap" style="align-items: center;">
            <!-- TAB IMAGE -->
            <div class="tab-image fx-item">
                <!-- HEADING -->
                <?php if (have_rows('heading')) : ?>
                    <?php while (have_rows('heading')) : the_row(); ?>
                        <?php get_template_part('partials/flexible-content/components/heading'); ?>

                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- CONTENT -->
                <?php if (have_rows('content')) : ?>
                    <?php while (have_rows('content')) : the_row(); ?>
                        <?php get_template_part('partials/flexible-content/components/content'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- IMAGE -->
                <?php if (have_rows('image')) : ?>
                    <?php while (have_rows('image')) : the_row(); ?>
                        <?php get_template_part('partials/flexible-content/components/image'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- TAB CONTENT -->
            <div class="tab-content fx-item">
                <?php if (have_rows('title_content')) : ?>
                    <?php while (have_rows('title_content')) : the_row(); ?>
                        <?php get_template_part('partials/flexible-content/components/heading'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="fx-layout fx-grid fx-column-<?php echo $count ?>  fx-column-gap">
                    <?php if (have_rows('list_content')) : ?>
                        <?php while (have_rows('list_content')) : the_row(); ?>
                            <div class="list-content-item fx-item">
                                <?php if ($icon = get_sub_field('icon')) : ?>
                                    <div class="list-content-icon">
                                        <svg class="icon">
                                            <use xlink:href="#icon-<?php echo get_sub_field('icon') ?>"></use>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                <div class="list-content-text">
                                    <?php if (have_rows('title')) : ?>
                                        <?php while (have_rows('title')) : the_row(); ?>
                                            <?php get_template_part('partials/flexible-content/components/heading'); ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php if (have_rows('paragraph')) : ?>
                                        <?php while (have_rows('paragraph')) : the_row(); ?>
                                            <?php get_template_part('partials/flexible-content/components/content'); ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    </div>
</section>