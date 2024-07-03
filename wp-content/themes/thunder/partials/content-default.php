<div class="content-default">
    <!-- <div class="content-sidebar">

        <?php if (is_active_sidebar('Sidebar')) : ?>
        <?php dynamic_sidebar('Sidebar'); ?>
        <?php endif ?>
    </div> -->
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        } // end while
    } // end if
    ?>
</div>