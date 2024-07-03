<div class="counter-cpt">

    <div class="number-box">

        <div class="number-content">

            <?php if ($number_text = get_sub_field('number_text')) : ?>

                <!-- Number -->
                <span class="number bold m-none c-primary counter-number" data-target="<?php echo preg_replace('/[^0-9]/', '', $number_text); ?>"><?php echo esc_html($number_text); ?></span>

            <?php endif; ?>

            <?php if ($unit_text = get_sub_field('unit_text')) : ?>

                <!-- Unit -->
                <span class="unit uppercase m-none c-primary t-small"><?php echo esc_html($unit_text); ?></span>

            <?php endif; ?>

        </div>

        <?php if ($number_text) : ?>

            <!-- Number Overlay -->
            <span class="number-overlay m-none"><?php echo esc_html($number_text); ?></span>

        <?php endif; ?>

    </div>

    <?php if ($caption = get_sub_field('caption')) : ?>

        <!-- Caption -->
        <p class="caption bold m-none"><?php echo esc_html($caption); ?></p>

    <?php endif; ?>

</div>