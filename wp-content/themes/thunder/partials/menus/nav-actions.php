<?php if (has_nav_menu('actions')) : ?>

<!-- Search -->
<div class="nav-search">
    <span class="nav-search-item icon-search">
        <i class="fas fa-search"></i>
    </span>
    <span class="nav-search-item form-search"><?php echo do_shortcode('[aws_search_form]') ?></span>
</div>

<!-- Sản phẩm yêu thích -->
<label class="favorite-product-icon">
    <a href="<?php echo site_url('/wishlist/') ?>">
        <span><i class="far fa-heart"></i></span>
        <!-- <span class="favorite-product-icon-number" style="font-size: 16px"> -->
        <?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>
        <!-- </span> -->

    </a>
</label>

<!-- CART ICON -->
<label for="input-cart-mini" class="cart-icon d-flex">
    <span class="cart-icon-shop"><i class="fas fa-shopping-cart"></i></span>

    <!-- Quantity Product Cart -->
    <?php global $woocommerce; ?>

    <span class="cart-icon-quantity"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
    </span>
</label>

<!-- input checkbox -->
<input type="checkbox" name="" class="input-cart-mini" id="input-cart-mini">
<!-- Overlay -->
<label for="input-cart-mini" class="cart-overlay"></label>

<!-- CART MINI -->
<div class="cart-mini pc">
    <div class="cart-mini-heading">
        <span class="cart-mini-heading-shop">Giỏ hàng</span>
        <label class="cart-mini-heading-times" for="input-cart-mini" title="Đóng"><i class="fas fa-times"></i></label>
    </div>
    <?php global $woocommerce;
        global $product;
        ?>
    <?php $items = $woocommerce->cart->get_cart(); ?>
    <?php if (count($items) >= 1) { ?>
    <ul class="cart-mini-products-list" id="cart-sidebar">
        <?php foreach ($items as $key => $value) { ?>
        <?php $cart_item_remove_url = wc_get_cart_remove_url($key); ?>
        <li class="cart-mini-products-list-item">
            <div class="cart-mini-products-list-item-inner">
                <div class="cart-mini-product-image">
                    <a class="" href="<?php echo get_permalink($value['product_id']); ?>">
                        <?php echo get_the_post_thumbnail($value['product_id'], 'thumbnail', array('class' => 'thumnail')); ?>
                    </a>
                </div>
                <div class="cart-mini-product-details">
                    <div class="cart-mini-product-info">
                        <div class="cart-mini-product-name">
                            <a href="<?php echo get_permalink($value['product_id']); ?>">
                                <?php echo get_the_title($value['product_id']); ?>
                            </a>
                        </div>
                        <div class="cart-mini-product-action">
                            <span><strong><?php echo $value['quantity']; ?></strong> x <span
                                    class="cart-mini-product-price"><?php echo number_format($value['line_total'] / $value['quantity'], 0, ",", "."); ?>
                                    đ</span></span>
                            <span title="Xóa sản phẩm"><a class="jtv-btn-remove" href="<?php echo $cart_item_remove_url; ?>"><i class="fa fa-times"></i></a></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="clear"></div> -->
            </div>
        </li>
        <?php } ?>
    </ul>
    <div class="cart-mini-caculator">
        <div class="cart-mini-total">
            <span>
                Tổng thanh toán:
            </span>
            <span class="cart-mini-total-money"><?php echo WC()->cart->get_cart_total(); ?></span>
        </div>
        <div class="cart-mini-caculator-actions">
            <span> <a href="<?php bloginfo('url'); ?>/thanh-toan"><b>Thanh Toán</b></a></span>
            <span> <a href="<?php bloginfo('url'); ?>/gio-hang"><b>Giỏ hàng</b></a></span>
        </div>
    </div>
    <?php } else { ?>
    <ul id="cart-sidebar" class="mini-products-list count_li">
        <div class="cart-mini-no-item">
            <p>Không có sản phẩm nào trong giỏ hàng.</p>
        </div>
    </ul>
    <?php } ?>
</div>
<?php endif; ?>