<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class('ryokan-body'); ?>>
<?php wp_body_open(); ?>

    <!-- ヘッダー領域 -->
    <header class="ryokan-header">
      <div class="ryokan-container">
        <div class="ryokan-header-inner">
          <!-- ロゴ（左側） -->
          <div class="ryokan-logo-area">
            <a href="<?php echo home_url('/'); ?>" class="ryokan-logo-link">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-center.png" alt="">
            </a>
          </div>

          <!-- PC向けナビゲーション ＆ 予約ボタン -->
          <div class="ryokan-header-right-wrap">
						<nav class="ryokan-nav">
              <?php wp_nav_menu(array('theme_location' => 'primary','container'      => false,'menu_class'     => 'ryokan-nav-list','fallback_cb'    => false,
                        ));?>
						</nav>
            

            <a href="<?php echo esc_url(home_url('/yoyaku/'));?>" class="ryokan-btn-reserve ms-3 d-none d-md-inline-block">ご予約</a>

            <!-- スマホ用メニューボタン -->
            <button class="ryokan-mobile-toggle" aria-label="メニュー開閉">
              <i class="fa-solid fa-bars"></i>
            </button>
            
          </div>
        </div>
      </div>
    </header>

    <!-- スマホ・タブレット用ドロワーメニュー -->
<div class="ryokan-mobile-nav">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'ryokan-mobile-nav-list',
        'fallback_cb'    => false,
    ));
?>

    <div class="mt-4 text-center">
        <a href="#booking" class="ryokan-btn-reserve px-5 py-3 d-inline-block">
            ご予約
        </a>
    </div>

</div>