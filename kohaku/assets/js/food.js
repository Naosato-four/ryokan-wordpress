// ==========================================
// Vue.js 2.7 による制御 (スライドショー)
// ==========================================
new Vue({
  el: "#food-app",
  data() {
    return {
      // 現在表示しているスライドの番号（0〜2番目）
      currentBreakfastIndex: 0,
      currentDinnerIndex: 0,
      currentRyoteiIndex: 0,

      ryoteiImages: [
        themePath + "/assets/img/ryoutei1.png", // 💡 1枚目：共有いただいた「弥武景 庵」の外観
        themePath + "/assets/img/ryoutei2.png", // 2枚目：入口内観
        themePath + "/assets/img/ryoutei3.png", // 3枚目：座敷内観
        themePath + "/assets/img/ryoutei4.png", // 4枚目：テーブル席内観
      ],

      // 💡 朝食の画像3枚と、それぞれのテキストセット
      breakfastSlides: [
        {
          img: themePath + "/assets/img/tyousyoku1.png",
          subTitle: "一日を彩る、炊きたての土鍋御飯と滋味豊かな和朝食。",
          desc: "湯気立つ特製土鍋御飯を主役に、<br>ふっくら香ばしい焼き魚や<br>職人手作りの出し巻き卵など、<br>五感で楽しむ地産の味をお届けします。",
        },
        {
          img: themePath + "/assets/img/tyousyoku2.png",
          subTitle: "旅疲れの身体に染み渡る至福の特製朝粥。",
          desc: "地元の湧き水で炊く朝粥小鍋。<br>地鶏の西京焼きや薬味小鉢、<br>ご飯のお供に香の物を添えた、<br>身体を優しく調える目覚め膳です。",
        },
        {
          img: themePath + "/assets/img/tyousyoku3.png",
          subTitle: "目覚めたての五感を呼び覚ます、旬の焼き魚。",
          desc: "炭火で香ばしく焼いた川魚に温泉卵。<br>地魚の出汁小鍋や<br>佃煮などのお供とともに、<br>極上の釜揚げ御飯を心ゆくまでどうぞ。",
        },
      ],

      // 💡 夕食の画像3枚と、それぞれのテキストセット
      dinnerSlides: [
        {
          img: themePath + "/assets/img/yuusyoku1.png",
          subTitle: "鮮度際立つお造りと、素材を味わう炊き込みご飯。",
          desc: "旨味が染み渡る熱々の炊き込みご飯と、<br>美しく透き通るお造り。<br>選び抜かれた山海の幸が競演する、<br>贅沢な夜の幕開けをどうぞ。",
        },
        {
          img: themePath + "/assets/img/yuusyoku2.png",
          subTitle: "四季の贅を尽くした至高の本格和懐石。",
          desc: "極上和牛ステーキや炙り寿司を主役に、<br>旬魚のお造りや焼き物まで。<br>料理長渾身の山海の幸を心ゆくまでご堪能ください。",
        },
        {
          img: themePath + "/assets/img/yuusyoku3.png",
          subTitle: "旅の夜を華やかに彩る贅を尽くした逸品。",
          desc: "熱々の特製小鍋や芳醇な松茸の焼き物、<br>美しく輝く水菓子。<br>琥珀の丁寧な手仕事が光る美味で、<br>特別な夜の余韻をどうぞ。",
        },
      ],
    };
  },

  // 画面が読み込まれたら自動でタイマーをスタートさせる
  mounted() {
    this.startRyoteiRotation();
    this.startSlideShow();
  },

  methods: {
    startRyoteiRotation() {
      setInterval(() => {
        this.currentRyoteiIndex =
          (this.currentRyoteiIndex + 1) % this.ryoteiImages.length;
      }, 4000); // 💡 4秒ごとに自動ローテーション
    },

    startSlideShow() {
      // 💡 5000ms（5秒）ごとに画像とテキストを次のものに切り替える
      setInterval(() => {
        this.currentBreakfastIndex =
          (this.currentBreakfastIndex + 1) % this.breakfastSlides.length;
      }, 7000);

      // 夕食側は、少しタイミングをズラして6秒ごとに回すと、サイト全体の動きが上品になります
      setInterval(() => {
        this.currentDinnerIndex =
          (this.currentDinnerIndex + 1) % this.dinnerSlides.length;
      }, 7000);
    },
  },
});
