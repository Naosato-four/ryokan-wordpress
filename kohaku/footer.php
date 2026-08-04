
<!-- フッター領域 -->
<footer class="ryokan-footer">
  <div class="ryokan-container py-5">
    <div class="row align-items-start justify-content-between">
      <!-- 左側：キャッチコピーとロゴ -->
      <div class="col-md-4 col-12 ryokan-footer-brand-area">
        <p class="ryokan-footer-sub-catch">
          創業大正時代のレトロな木造宿
        </p>

        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-center.png" alt="" width="240" height="110">

      </div>


      <!-- 中央：住所、連絡先、SNS -->
      <div class="col-md-3 col-12 ryokan-footer-info-area">
        <div class="ryokan-footer-address mb-3">
          <p class="m-0">〒916-0029</p>
          <p class="m-0">山方県御花畑市大字銅山</p>
        </div>
        <div class="ryokan-footer-contact">
          <p class="m-0">電話番号：0237-28-2525</p>
          <p class="m-0">営業時間：年中無休</p>
          <p class="m-0">定休日：年中無休</p>
        </div>
        <div class="ryokan-footer-sns">
          <!-- SNSアイコンリンク -->
          <a href="#" class="ryokan-footer-sns-link" aria-label="Facebook"><i
              class="fa-brands fa-square-facebook"></i></a>
          <a href="#" class="ryokan-footer-sns-link" aria-label="Instagram"><i
              class="fa-brands fa-square-instagram"></i></a>
        </div>
      </div>


      <!-- 右側：ナビゲーションメニュー（PCサイズで左右に縦の仕切り線を表示） -->
      <div class="col-md-4 col-12 ryokan-footer-nav-area">
        <div class="ryokan-footer-nav-inner w-100">
          <div class="row align-items-start">
            <!-- メニュー左列 -->
            <div class="col-6 ryokan-footer-menu-col">
              <a href="<?php echo home_url('/kohaku/'); ?>" class="ryokan-footer-menu-link">琥珀</a>
              <a href="<?php echo home_url('/food/'); ?>" class="ryokan-footer-menu-link">お食事</a>
              <a href="<?php echo home_url('/onsen/'); ?>" class="ryokan-footer-menu-link">温泉</a>
              <a href="<?php echo home_url('/room/'); ?>" class="ryokan-footer-menu-link">お部屋</a>
            </div>
            <!-- メニュー右列 -->
            <div class="col-6 ryokan-footer-menu-col">
              <a href="<?php echo home_url('/contact/'); ?>" class="ryokan-footer-menu-link">お便り</a>
              <a href="<?php echo home_url('/access/'); ?>" class="ryokan-footer-menu-link">交通</a>
              <a href="<?php echo home_url('/news/'); ?>" class="ryokan-footer-menu-link">お知らせ</a>
              <a href="<?php echo home_url('/contact/'); ?>" class="ryokan-footer-menu-link">個人情報のお取扱いについて</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>  
</footer>

<!-- 最下部：コピーライト -->
  <div class="ryokan-footer-copy text-center">
    <p>&copy; 銅山温泉 旅館「琥珀」</p>
  </div>

<?php wp_footer(); ?>

</body>

</html>