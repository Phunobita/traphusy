<?php

// ====== SET UP - DEFINE ======>>

define('THEME_URI', get_theme_file_uri());


// ====== INCLUDES ======>>

require_once(__DIR__ . '/inc/enqueue.php');

require_once(__DIR__ . '/inc/setup.php');

require_once(__DIR__ . '/inc/menu.php');

require_once(__DIR__ . '/inc/acf.php');

require_once(__DIR__ . '/inc/rewrite.php');

require_once(__DIR__ . '/inc/smtp.php');

require_once(__DIR__ . '/inc/ajax.php');

require_once(__DIR__ . '/inc/polylang.php');



add_action('woocommerce_after_cart', function () {
?>
<script>
jQuery(function($) {
    var timeout;
    $('div.woocommerce').on('change textInput input', 'form.woocommerce-cart-form input.qty', function() {
        if (typeof timeout !== undefined) clearTimeout(timeout);

        //Not if empty
        if ($(this).val() == '') return;

        timeout = setTimeout(function() {
            $("[name='update_cart']").trigger("click");
        }, 2000); // 2 second delay
    });
});
</script>
<?php
});

// Auto change quantity product in cart
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
?>
<span class="cart-icon-quantity"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
</span>
<?php
    $fragments['.cart-icon-quantity'] = ob_get_clean();
    return $fragments;
}

// Update Cart Mini
add_filter('add_to_cart_fragments', 'woocommerce_add_to_cart_fragment');
function woocommerce_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
?>
<div class="cart-mini pc">
    <div class="cart-mini-heading">
        <span class="cart-mini-heading-shop">Giỏ hàng</span>
        <label class="cart-mini-heading-times" for="input-cart-mini" title="Đóng"><i class="fas fa-times"></i></label>
    </div>
    <?php global $woocommerce;
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
<?php
    $fragments['.cart-mini'] = ob_get_clean();
    return $fragments;
}


function webkul_add_woocommerce_support()
{
    //Add WoocCommerce theme support to our theme
    add_theme_support('woocommerce');
    // To enable gallery features add WooCommerce Product zoom effect, lightbox and slider support to our theme
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'webkul_add_woocommerce_support');

// add button buy now to page product detail
/*
* Thêm nút mua ngay vào trang chi tiết sản phẩm Woocommerce
*/
add_action('woocommerce_after_add_to_cart_button', 'buy_now_button');
function buy_now_button()
{
    global $product;
?>
<button type="button" class="button buy_now_button">
    <?php _e('Mua ngay', 'buy_now'); ?>
</button>
<input type="hidden" name="is_buy_now" class="is_buy_now" value="0" autocomplete="off" />

<?php
}
add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout($redirect_url)
{
    if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {
        $redirect_url = wc_get_cart_url(); //đổi thành 
    }
    return $redirect_url;
}


// register sidebar

add_theme_support('widgets');
function wc_register_sidebar()
{

    if (function_exists('register_sidebar')) {

        register_sidebar(array(
            'id' => 'sidebar_products',
            'name' => __('Sidebar Products', 'text_domain'),
            'description' => __('This is the main widget area.', 'text_domain'),
            'before_title' => '<h3 class="title">',
            'after_title' => '</h3>',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
        ));

        register_sidebar(array(
            'id' => 'sidebar_posts',
            'name' => 'Sidebar Posts',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));
    }
}
add_action('widgets_init', 'wc_register_sidebar');






// 1. Show plus minus buttons

add_action('woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus');

function bbloomer_display_quantity_minus()
{
    echo '<button type="button" class="btn-quantity minus">-</button>';
}

add_action('woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus');

function bbloomer_display_quantity_plus()
{
    echo '<button type="button" class="btn-quantity plus">+</button>';
}


// -------------
// 2. Trigger update quantity script

add_action('wp_footer', 'bbloomer_add_cart_quantity_plus_minus');

function bbloomer_add_cart_quantity_plus_minus()
{

    if (!is_product() && !is_cart()) return;

    wc_enqueue_js("   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   ");
}




/*
 * Tùy chỉnh hiển thị thông tin chuyển khoản trong woocommerce
 * Author: levantoan.com
 */
add_filter('woocommerce_bacs_accounts', '__return_false');
add_action('woocommerce_email_before_order_table', 'devvn_email_instructions', 10, 3);
function devvn_email_instructions($order, $sent_to_admin, $plain_text = false)
{
    if (!$sent_to_admin && 'bacs' === $order->get_payment_method() && $order->has_status('on-hold')) {
        devvn_bank_details($order->get_id());
    }
}
add_action('woocommerce_thankyou_bacs', 'devvn_thankyou_page');
function devvn_thankyou_page($order_id)
{
    devvn_bank_details($order_id);
}
function devvn_bank_details($order_id = '')
{
    $bacs_accounts = get_option('woocommerce_bacs_accounts');
    if (!empty($bacs_accounts)) {
        ob_start();
        echo '<table class="table_checkout" style=" border: 1px solid #ddd; border-collapse: collapse; width: 100%; ">';
    ?>
<tr>
    <h4> Vui lòng chuyển khoản theo thông tin sau, chúng tôi sẽ liên hệ với bạn ngay khi nhận được thông tin chuyển khoản của bạn.</h4>
    <td colspan="2" style="border: 1px solid #eaeaea;padding: 6px 10px;"><strong>Thông tin chuyển khoản</strong></td>
</tr>
<?php
        foreach ($bacs_accounts as $bacs_account) {
            $bacs_account = (object) $bacs_account;
            $account_name = $bacs_account->account_name;
            $bank_name = $bacs_account->bank_name;
            $stk = $bacs_account->account_number;
            $icon = $bacs_account->iban;
        ?>
<tr>
    <td class="table_checkout-logo-bank" style="border: 1px solid #eaeaea;padding: 6px 10px;"><?php if ($icon) : ?><img src="<?php echo $icon; ?>" alt="" /><?php endif; ?></td>
    <td style="border: 1px solid #eaeaea;padding: 6px 10px;">
        <strong>Số tài khoản:</strong> <?php echo $stk; ?><br>
        <strong>Chủ tài khoản:</strong> <?php echo $account_name; ?><br>
        <strong>Chi Nhánh:</strong> <?php echo $bank_name; ?><br>
        <strong>Nội dung chuyển khoản:</strong> DH<?php echo $order_id; ?>
    </td>
</tr>
<?php
        }
        echo '</table>';
        echo ob_get_clean();;
    }
}