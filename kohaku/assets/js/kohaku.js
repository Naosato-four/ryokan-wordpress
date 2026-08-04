// ==========================================
// Vue.js 2.7 によるフェードスライド制御
// ==========================================
new Vue({
  el: "#kohaku-app",

  data() {
    return {
      sliders: [
        {
          currentIndex: 0,
          interval: null,
          speed: 4000,
          images: [
            { src: themeData.imgUrl + "taketourou1.png", alt: "竹灯籠1" },
            { src: themeData.imgUrl + "taketourou2.png", alt: "竹灯籠2" },
            { src: themeData.imgUrl + "taketourou3.png", alt: "竹灯籠3" },
          ],
        },

        {
          currentIndex: 0,
          interval: null,
          speed: 3500,
          images: [
            { src: themeData.imgUrl + "yukimiburo2.png", alt: "雪見風呂1" },
            { src: themeData.imgUrl + "yukimiburo.png", alt: "雪見風呂2" },
            { src: themeData.imgUrl + "yukimiburo5.png", alt: "雪見風呂3" },
          ],
        },
      ],
    };
  },

  mounted() {
    this.sliders.forEach((_, i) => {
      this.startSlide(i);
    });
  },

  beforeDestroy() {
    this.sliders.forEach((s) => {
      clearInterval(s.interval);
    });
  },

  methods: {
    startSlide(i) {
      const slider = this.sliders[i];

      slider.interval = setInterval(() => {
        this.nextSlide(i);
      }, slider.speed);
    },

    nextSlide(i) {
      const slider = this.sliders[i];

      slider.currentIndex = (slider.currentIndex + 1) % slider.images.length;
    },
  },
});
