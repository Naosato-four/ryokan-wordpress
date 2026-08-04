// ==========================================
// Vue.js 2.7 による客室データ定義
// ==========================================
new Vue({
  el: "#room-app",

  data() {
    return {
      // 3室分の紹介データ
      rooms: [
        {
          id: 1,
          num: "客室 一",
          name: "渓音",
          kana: "けいおん",
          description:
            "自然な清流のせせらぎをテーマにした客室。窓辺から広がる自然を眺めながら、川音を思わせる静けさに包まれる癒やしの空間。 季節を問わず、心をほどく滞在を楽しめます。",
          imageLabel: "客室① 渓音 イメージ画像",
          imageSrc: themeData.imgUrl + "keionn.png",
          url: "/room-detail/?room=keion",
        },
        {
          id: 2,
          num: "客室 二",
          name: "夕霞",
          kana: "ゆうがすみ",
          description:
            "山々が夕日に染まり、霞がやわらかく広がる情景を表現した客室。夕暮れから夜へと移ろう時間をゆったりと味わえる、大人のための落ち着いた空間です。四季折々の景色が美しく映えるよう、控えめで上質な和の設えを採用しています。",
          imageLabel: "客室② 夕霞 イメージ画像",
          imageSrc: themeData.imgUrl + "yuugasumi1.png",
          url: "/room-detail/?room=yugasumi",
        },
        {
          id: 3,
          num: "客室 三",
          name: "星待",
          kana: "ほしまち",
          description:
            "夜空をゆっくり眺めるための客室。大きな天窓や広い窓を設け、照明は最小限。夜は部屋を暗くして星空を眺めながら過ごせます。",
          imageLabel: "客室③ 星待 イメージ画像",
          imageSrc: themeData.imgUrl + "hosimachi1.png",
          url: "/room-detail/?room=hoshimati",
        },
      ],
    };
  },
});
