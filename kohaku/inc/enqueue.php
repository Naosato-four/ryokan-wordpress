<?php

function kohaku_enqueue_assets()
{

    /*
    |--------------------------------------------------------------------------
    | CSS
    |--------------------------------------------------------------------------
    */

    // Google Fonts (Shippori Mincho B1)
    wp_enqueue_style(
        'google-fonts-shippori',
        'https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1&display=swap',
        [],
        null
    );


    // Bootstrap
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        [],
        '5.3.0'
    );

    // FontAwesome
    wp_enqueue_style(
        'fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        [],
        '6.4.0'
    );

    // 共通CSS
    wp_enqueue_style(
        'kohaku-style',
        get_template_directory_uri() . '/assets/css/style.css',
        ['bootstrap'],
        filemtime(get_template_directory() . '/assets/css/style.css')
    );



    // トップページCSS
    if (is_front_page()) {
        wp_enqueue_style(
            'kohaku-index',
            get_template_directory_uri() . '/assets/css/index.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/index.css')
        );
    }

    // 琥珀ページCSS
    if (is_page('kohaku')) {
        wp_enqueue_style(
            'kohaku-page',
            get_template_directory_uri() . '/assets/css/kohaku.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/kohaku.css')
        );
    }

    // お部屋ページCSS
    if (is_page('room')) {
        wp_enqueue_style(
            'room-page',
            get_template_directory_uri() . '/assets/css/room.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/room.css')
        );
    }


    // 客室詳細ページCSS
    if (is_page('room-detail')) {
        wp_enqueue_style(
            'room-detail-page',
            get_template_directory_uri() . '/assets/css/room-detail.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/room-detail.css')
        );
    }

    // 温泉ページCSS
    if (is_page('onsen')) {
        wp_enqueue_style(
            'onsen-page',
            get_template_directory_uri() . '/assets/css/onsen.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/onsen.css')
        );
    }

    // お食事ページCSS
    if (is_page('food')) {
        wp_enqueue_style(
            'food-page',
            get_template_directory_uri() . '/assets/css/food.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/food.css')
        );
    }

    // お問い合わせページCSS
    if (is_page('contact')) {
        wp_enqueue_style(
            'contact-page',
            get_template_directory_uri() . '/assets/css/contact.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/contact.css')
        );
    }

    // アクセスページCSS
    if (is_page('access')) {
        wp_enqueue_style(
            'access-page',
            get_template_directory_uri() . '/assets/css/access.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/access.css')
        );
    }

    // ニュースページCSS
    if (is_page('news')) {
        wp_enqueue_style(
            'news-page',
            get_template_directory_uri() . '/assets/css/news.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/news.css')
        );
    }

    // 予約ページCSS
    if (is_page('yoyaku')) {
        wp_enqueue_style(
            'yoyaku-page',
            get_template_directory_uri() . '/assets/css/yoyaku.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/yoyaku.css')
        );

        wp_enqueue_style(
            'jquery-ui-css',
            'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css',
            [],
            '1.12.1'
        );

        wp_enqueue_style(
            'choices-css',
            'https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css',
            [],
            null
        );
    }

    // 女将ページCSS
    if (is_page('okami')) {
        wp_enqueue_style(
            'okami-page',
            get_template_directory_uri() . '/assets/css/okami.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/okami.css')
        );
    }

    // 女将ページCSS
    if (is_page('qanda')) {
        wp_enqueue_style(
            'qanda-page',
            get_template_directory_uri() . '/assets/css/qanda.css',
            ['kohaku-style'],
            filemtime(get_template_directory() . '/assets/css/qanda.css')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | JavaScript
    |--------------------------------------------------------------------------
    */

    // WordPress標準jQueryを解除
    wp_deregister_script('jquery');

    // jQuery 3.6.0
    wp_enqueue_script(
        'jquery',
        'https://code.jquery.com/jquery-3.6.0.min.js',
        [],
        '3.6.0',
        true
    );

    // Bootstrap
    wp_enqueue_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        '5.3.0',
        true
    );

    // Vue2
    wp_enqueue_script(
        'vue',
        'https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.min.js',
        [],
        '2.7.16',
        true
    );

    // 共通JS
    wp_enqueue_script(
        'kohaku-common',
        get_template_directory_uri() . '/assets/js/common.js',
        ['jquery'],
        filemtime(get_template_directory() . '/assets/js/common.js'),
        true
    );

    // Swiper
    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11',
        true
    );

    // トップページ用JS
    if (is_front_page()) {
        wp_enqueue_script(
            'kohaku-index',
            get_template_directory_uri() . '/assets/js/index.js',
            ['vue', 'swiper', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/index.js'),
            true
        );
    }

    // 琥珀ページ用JS
    if (is_page('kohaku')) {
        wp_enqueue_script(
            'kohaku-page',
            get_template_directory_uri() . '/assets/js/kohaku.js',
            ['vue', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/kohaku.js'),
            true
        );
    }

    // お部屋ページ用JS
    if (is_page('room')) {
        wp_enqueue_script(
            'room-page',
            get_template_directory_uri() . '/assets/js/room.js',
            ['vue', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/room.js'),
            true
        );
    }

    // 客室詳細ページ用JS
    if (is_page('room-detail')) {
        wp_enqueue_script(
            'room-detail-page',
            get_template_directory_uri() . '/assets/js/room-detail.js',
            ['vue', 'jquery', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/room-detail.js'),
            true
        );
    }

    // 温泉ページ用JS
    if (is_page('onsen')) {
        wp_enqueue_script(
            'onsen-page',
            get_template_directory_uri() . '/assets/js/onsen.js',
            ['vue', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/onsen.js'),
            true
        );
    }

    // お食事ページ用JS
    if (is_page('food')) {
        wp_enqueue_script(
            'food-page',
            get_template_directory_uri() . '/assets/js/food.js',
            ['vue', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/food.js'),
            true
        );
    }

    // お問い合わせページ用JS
    if (is_page('contact')) {
        wp_enqueue_script(
            'contact-page',
            get_template_directory_uri() . '/assets/js/contact.js',
            ['vue', 'jquery', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/contact.js'),
            true
        );
    }

    // アクセスページJS
    if (is_page('access')) {
        wp_enqueue_script(
            'access-page',
            get_template_directory_uri() . '/assets/js/access.js',
            ['vue', 'jquery', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/access.js'),
            true
        );
    }

    // ニュースページJS
    if (is_page('news')) {
        wp_enqueue_script(
            'news-page',
            get_template_directory_uri() . '/assets/js/news.js',
            ['vue', 'jquery', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/news.js'),
            true
        );
    }

    // 女将ページJS
    if (is_page('okami')) {
        wp_enqueue_script(
            'okami-page',
            get_template_directory_uri() . '/assets/js/okami.js',
            ['vue', 'jquery', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/okami.js'),
            true
        );
    }

    // よくある質問ページJS
    if (is_page('qanda')) {
        wp_enqueue_script(
            'qanda-page',
            get_template_directory_uri() . '/assets/js/qanda.js',
            ['vue', 'jquery', 'kohaku-common'],
            filemtime(get_template_directory() . '/assets/js/qanda.js'),
            true
        );
    }

    // 予約ページJS
    if (is_page('yoyaku')) {

        wp_enqueue_script(
            'jquery-ui',
            'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
            ['jquery'],
            '1.12.1',
            true
        );

        wp_enqueue_script(
            'jquery-ui-ja',
            'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/i18n/jquery.ui.datepicker-ja.min.js',
            ['jquery-ui'],
            null,
            true
        );

        wp_enqueue_script(
            'choices',
            'https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js',
            [],
            null,
            true
        );

        wp_enqueue_script(
            'yoyaku-page',
            get_template_directory_uri() . '/assets/js/yoyaku.js',
            ['vue', 'jquery', 'kohaku-common', 'choices', 'jquery-ui'],
            filemtime(get_template_directory() . '/assets/js/yoyaku.js'),
            true
        );
    }

    wp_localize_script(
        'food-page',
        'themeData',
        array(
            'imgUrl' => get_template_directory_uri() . '/assets/img/'
        )
    );

    wp_localize_script(
        'kohaku-page',
        'themeData',
        array(
            'imgUrl' => get_template_directory_uri() . '/assets/img/'
        )
    );


    wp_localize_script(
        'room-page',
        'themeData',
        array(
            'imgUrl' => get_template_directory_uri() . '/assets/img/'
        )
    );


    wp_localize_script(
        'room-detail-page',
        'themeData',
        array(
            'imgUrl' => get_template_directory_uri() . '/assets/img/',
            'roomJson' => get_template_directory_uri() . '/assets/js/room-detail.json'
        )
    );


}

add_action('wp_enqueue_scripts', 'kohaku_enqueue_assets');
