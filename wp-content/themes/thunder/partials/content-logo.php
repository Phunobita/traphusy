<?php if (is_home() || is_front_page()) : ?>
    <?php echo '<h1 class="m-none">'; ?>
<?php endif; ?>
<a class="logo-wrapper logo-item link c-white" href="<?php echo home_url(); ?>">

    <?php if (have_rows('host_logo', 'options')) : ?>

        <!-- Logo -->
        <?php while (have_rows('host_logo', 'options')) : the_row(); ?>

            <?php get_template_part('partials/flexible-content/components/image'); ?>

        <?php endwhile; ?>

    <?php else : ?>
        <?php bloginfo('name'); ?>
    <?php endif; ?>
</a>
<?php if (is_home() || is_front_page()) : ?>
    <?php echo '</h1>'; ?>
<?php endif; ?>