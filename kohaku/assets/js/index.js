new Vue({
  el: "#top-page",

  data() {
    return {
      newsItems: [
        { text: "本日より公式サイトオープンしました" },
        { text: "【割引キャンペーン】「名湯プラン」を開始" },
        { text: "秋の膳をご用意いたしました" },
        { text: "ホームページ公開のお知らせ" },
      ],
    };
  },
  mounted() {
    this.$nextTick(() => {
      new Swiper(".ryokan-hero-swiper", {
        loop: true,
        effect: "fade",
        speed: 1000,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        on: {
          slideChangeTransitionStart: function () {
            $(".anim-box").removeClass("is-animated");
          },
          slideChangeTransitionEnd: function () {
            $(".swiper-slide-active .anim-box").addClass("is-animated");
          },
        },
      });
    });
  },
});
