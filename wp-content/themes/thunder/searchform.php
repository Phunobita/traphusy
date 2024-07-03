<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search…', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
    </label>
    <button type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>">
        <svg class="icon icon-search">
            <use xlink:href="#icon-search"></use>
        </svg>
    </button>
</form>