<?php
$cta_list = get_field('cta_list', 'options');
$add_to_cta_list = get_field('add_to_cta_list', 'options');
$host_info = get_field('host_info', 'options');
// var_dump($add_to_cta_list);
if ($host_info && in_array('phone', $add_to_cta_list)) {
    $phone = $host_info['phone'];
}
if ($host_info && in_array('mail', $add_to_cta_list)) {
    $mail = $host_info['email'];
}
if ($host_info && in_array('map', $add_to_cta_list)) {
    $map = $host_info['map_link'];
}
if ($host_info && in_array('back', $add_to_cta_list)) {
    $back = true;
}
if ($host_info && in_array('social', $add_to_cta_list)) {
    $host_social = get_field('host_social', 'options');
}

?>

<div class="cta">

    <?php if (isset($phone)) : ?>
        <!-- Phone -->
        <a class="item link phone" href="tel:<?php echo esc_html(preg_replace('/\s+/', '', $phone)); ?>">
            <i class="fas fa-phone-alt"></i>
        </a>
    <?php endif; ?>

    <?php if (isset($mail)) : ?>
        <!-- Email -->
        <a class="item link mail" href="mailto:<?php echo $mail; ?>">
            <svg class="icon icon-email">
                <use xlink:href="#icon-email"></use>
            </svg>
        </a>
    <?php endif; ?>

    <?php if (isset($map)) : ?>
        <!-- Map -->
        <a class="item link map" href="<?php echo $map; ?>" target="_blank">
            <svg class="icon icon-pin_drop">
                <use xlink:href="#icon-pin_drop"></use>
            </svg>
        </a>
    <?php endif; ?>

    <!-- Social -->
    <?php if (isset($host_social) && $host_social) : ?>

        <?php foreach ($host_social as $social) : ?>
            <?php foreach ($social as $item) : ?>

                <a class="item link <?php echo $item['class']; ?>" href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target'] == 0 ? '' : '_blank'; ?>">
                    <svg class="icon icon-<?php echo $item['icon']; ?>">
                        <use xlink:href="#icon-<?php echo $item['icon']; ?>"></use>
                    </svg>
                </a>

            <?php endforeach; ?>
        <?php endforeach; ?>

    <?php endif; ?>

    <?php if (isset($cta_list) && $cta_list) : ?>

        <!-- Others -->
        <?php foreach ($cta_list as $cta_button) : ?>
            <?php foreach ($cta_button as $item) : ?>

                <a class="item link <?php echo $item['class']; ?>" href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target'] == 0 ? '' : '_blank'; ?>">
                    <svg class="icon icon-<?php echo $item['icon']; ?>">
                        <use xlink:href="#icon-<?php echo $item['icon']; ?>"></use>
                    </svg>
                </a>

            <?php endforeach; ?>
        <?php endforeach; ?>

    <?php endif; ?>

     <!-- facebook -->
    <div class="shop">
        <a href="https://www.facebook.com/traoolongphusy">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/others/facebook.png" alt="" style="width: 5rem; height: 5rem; border-radius: 12px;" />
        </a>
    </div>

    <!-- zalo -->
    <div class="shop">
        <a href="https://id.zalo.me/account?continue=https://chat.zalo.me">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/others/zalo.png" alt="" style="width: 5rem; height: 5rem; border-radius: 12px;" />
        </a>
    </div>

    <!-- Shopee -->
    <div class="shop">
        <a href="https://shopee.vn/shop/872784549">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/others/logo-shopee-1.jpg" alt="" style="width: 5rem; height: 5rem; border-radius: 12px;" />
        </a>
    </div>



    <!-- Back To Top -->
    <?php if (isset($back)) : ?>
        <a class="item link back" href="#top">
            <svg class="icon icon-publish">
                <use xlink:href="#icon-publish"></use>
            </svg>
        </a>
    <?php endif; ?>

</div>