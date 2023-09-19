<?php
/*
Plugin Name: muaseo
Description: Plugin đếm ngược và hiển thị đoạn text - Phát triển bởi MuaSeo.
Version: 1.0.4
*/

// Plugin define
define('MUASEO_PATH', plugin_dir_path( __FILE__ ));
define('MUASEO_URI' , plugin_dir_url( __FILE__ ));

// Đăng ký shortcode
include_once MUASEO_PATH . '/src/inc/shortcodes.php';

// Plugin settings
include_once MUASEO_PATH . '/src/inc/settings.php';

