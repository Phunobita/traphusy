<?php
// ====== HOOK ACTION - FILTER ======>>

add_action('phpmailer_init', 'wpt_config_smtp');


// ====== FUNCTIONS ======>>

if (!function_exists('wpt_config_smtp')) {
    function wpt_config_smtp($phpmailer) {

        if (!is_object($phpmailer)) {
            $phpmailer = (object) $phpmailer;
        }

        $phpmailer->isSMTP();
        $phpmailer->Host       = 'smtp.gmail.com';
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Port       = 587;
        $phpmailer->Username   = 'gmailcuaban@gmail.com'; //điền tài khoản gmail của bạn
        $phpmailer->Password   = 'matkhauungdunggmail'; //điền mật khẩu ứng dụng mà bạn đã tạo ở trên
        $phpmailer->SMTPSecure = 'ssl';
        $phpmailer->From       = 'gmailcuaban@gmail.com'; //điền tài khoản gmail của bạn
        $phpmailer->FromName   = 'Tên gửi';
        
    }
}
