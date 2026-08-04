<?php

if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/inc/enqueue.php';


// メニュー機能を有効化
function kohaku_theme_setup()
{
    register_nav_menus(array(
        'primary' => 'ヘッダーメニュー',
    ));
}
add_action('after_setup_theme', 'kohaku_theme_setup');
