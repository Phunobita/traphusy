</div>
<!-- END - MAIN CONTENT SITE -->


<?php

$column_1_title = get_field('column_1_title', 'options');
$column_2_title = get_field('column_2_title', 'options');
$column_3_title = get_field('column_3_title', 'options');
$column_4_title = get_field('column_4_title', 'options');
$host_social = get_field('host_social', 'options');

?>
<footer class="site-footer">
    <div class="site-container fx-layout fx-grid fx-column-4 flexible fx-column-gap">

        <!-- COL-1 -->
        <div class="footer-col fx-item footer-col-logo">

            <?php if (isset($column_1_title)) : ?>
                <h3 class=" uppercase c-white m-none"><?php echo $column_1_title; ?></h3>
            <?php endif; ?>


            <div class="logo-item">

                <?php if (have_rows('host_logo', 'options')) : ?>
                    <!-- Logo -->
                    <?php while (have_rows('host_logo', 'options')) : the_row(); ?>

                        <?php get_template_part('partials/flexible-content/components/image'); ?>

                    <?php endwhile; ?>

                <?php else : ?>
                    <?php bloginfo('name'); ?>
                <?php endif; ?>

            </div>

            <?php if ($cutom_html_col_1 = get_field('cutom_html_col_1', 'options')) : ?>
                <div class="custom-html">
                    <?php echo $cutom_html_col_1 ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- COL-2 -->
        <div class="footer-col fx-item">
            <?php if (isset($column_2_title)) : ?>
                <h3 class=" uppercase c-white m-none"><?php echo $column_2_title; ?></h3>
            <?php endif; ?>

            <?php if ($cutom_html_col_2 = get_field('cutom_html_col_2', 'options')) : ?>
                <div class="custom-html">
                    <?php echo $cutom_html_col_2 ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- COL-3 -->
        <div class="footer-col fx-item">
            <?php if (isset($column_3_title)) : ?>
            <h3 class=" uppercase c-white m-none"><?php echo $column_3_title; ?></h3>
            <?php endif; ?>

            <?php if ($cutom_html_col_3 = get_field('cutom_html_col_3', 'options')) : ?>
            <div class="header-actions">
                 <?php echo $cutom_html_col_3 ?>
            </div>
            <?php endif; ?>
            <div class="footer-menu">
                <?php get_template_part('partials/menus/nav', 'footer') ?>
            </div>

        </div>

        <!-- COL 4 -->
        <div class="footer-col fx-item footer-col-fanpage">

            <?php if (isset($column_4_title)) : ?>
                <h3 class=" uppercase c-white m-none"><?php echo $column_4_title; ?></h3>
            <?php endif; ?>

            <?php if ($cutom_html_col_4 = get_field('cutom_html_col_4', 'options')) : ?>
                <div class="custom-html">
                    <?php echo $cutom_html_col_4 ?>
                </div>
            <?php endif; ?>
         


        </div>

        <!-- COL-BOTTOM -->
        <div class="footer-bottom footer-col col-full d-flex flex-wrap">

            <p class="m-none">@ <?php echo date("Y"); ?> Copyright by
                <?php if ($site_name = get_bloginfo('name')) : ?>
                    <?php echo esc_html($site_name); ?>
                <?php endif; ?>
            </p>

        </div>

    </div>
    <div class="absolute-footer">
        <?php get_template_part('partials/content', 'cta') ?>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hide the loading overlay
        var loadingOverlay = document.querySelector('.loading-overlay');
        loadingOverlay.style.display = 'none';
    });
</script>
<?php get_template_part('partials/content', 'svgs') ?>
</body>

</html>