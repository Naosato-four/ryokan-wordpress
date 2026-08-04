// ==========================================
// 【共通】jQuery による演出処理
// ==========================================
$(document).ready(function () {
  // スクロール時のヘッダースタイル切替（全ページ共通）
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 50) {
      $(".ryokan-header").addClass("scrolled");
    } else {
      $(".ryokan-header").removeClass("scrolled");
    }
  });

  // 画面スクロールに応じたフェードイン処理（全ページ共通）
  function checkFadeIn() {
    $(".fade-in-up").each(function () {
      const elementTop = $(this).offset().top;
      const windowBottom = $(window).scrollTop() + $(window).height();

      if (windowBottom > elementTop + 100) {
        $(this).addClass("is-visible");
      }
    });
  }
  // スクロール時および初回読み込み時に確認
  $(window).on("scroll", checkFadeIn);
  checkFadeIn();
});

// ==========================================
// ハンバーガーメニュー
// ==========================================
$(function () {
  $(".ryokan-mobile-toggle").on("click", function () {
    $(".ryokan-mobile-nav").toggleClass("is-active");

    const icon = $(this).find("i");

    if ($(".ryokan-mobile-nav").hasClass("is-active")) {
      icon.removeClass("fa-bars").addClass("fa-xmark");
    } else {
      icon.removeClass("fa-xmark").addClass("fa-bars");
    }
  });

  $(".ryokan-mobile-nav a").on("click", function () {
    $(".ryokan-mobile-nav").removeClass("is-active");

    $(".ryokan-mobile-toggle i").removeClass("fa-xmark").addClass("fa-bars");
  });
});
