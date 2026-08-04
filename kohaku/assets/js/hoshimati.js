// ==========================================
// Vue.js 2.7 によるデータ制御
// ==========================================
new Vue({
  el: "#keion-app",
  data() {
    return {
      // ----------------------------------------------------
      // ★ 誰でも写真を追加・変更しやすい配列構造
      //    ここに { src: '画像へのパス', alt: '代替テキスト', label: '写真の説明' }
      //    を増減させるだけで、スライドショーが自動追従して動作します。
      // ----------------------------------------------------
      roomImages: [
        {
          src: "img/hosimachi1.png",
          alt: "特別室 星待 ベットルーム",
          label: "ベットルーム写真",
        },
        {
          src: "img/hosimachi2.png",
          alt: "特別室 星待 客室全景",
          label: "夜景 写真",
        },
        {
          src: "img/amenityslide.png",
          alt: "特別室 渓音 アメニティ",
          label: "アメニティ",
        },
      ],
      currentImageIndex: 0, // 現在表示中のスライドインデックス

      // ----------------------------------------------------
      // ★ 無料サービス情報
      // ----------------------------------------------------
      freeServices: [
        "ラウンジでのウェルカムドリンク",
        "お部屋のミニバー（ビール・ソフトドリンクフリー）",
        "貸切家族風呂 1回無料（45分間）",
        "お好みの色浴衣・アメニティバー利用無料",
      ],

      // ----------------------------------------------------
      // ★ 備品と備品の紹介（アイコンおよび詳細テキスト）
      // ----------------------------------------------------
      amenities: [
        {
          name: "お香（インセンス）セット",
          icon: "fa-solid fa-spa",
          description:
            "老舗のお香など、上品な和の香りと香炉をお部屋に用意します。お部屋を好きな香りで満たす体験そのものがおもてなしになります。",
        },
        {
          name: "シモンズ製ツインベッド",
          icon: "fa-solid fa-bed",
          description:
            "極上の眠りを届けるSimmons（シモンズ）製高密度マットレスを導入。旅の疲れを優しくほぐします。",
        },
        {
          name: "リファ社製ヘアドライヤー",
          icon: "fa-solid fa-wind",
          description:
            "話題の「ReFa（リファ）」ビューテックドライヤーをお部屋に完備。美髪を叶える上質なアメニティです。",
        },
        {
          name: "厳選オーガニックバスケア",
          icon: "fa-solid fa-pump-soap",
          description:
            "天然の国産植物から抽出した地肌に優しいシャンプー・コンディショナー・ソープをご用意しております。",
        },
        {
          name: "ミニバー＆エスプレッソ",
          icon: "fa-solid fa-mug-hot",
          description:
            "厳選したプレミアムコーヒー豆を使用したカプセル式コーヒーメーカーや各種茶器を揃えております。",
        },
        {
          name: "高速無料Wi-Fi・空気清浄機",
          icon: "fa-solid fa-wifi",
          description:
            "プラズマクラスター機能付き加湿空気清浄機を完備。Wi-Fiも安定した接続環境を整えております。",
        },
      ],

      // ----------------------------------------------------
      // ★ 他のお部屋へのリンク（メインを邪魔しないサイズ感）
      // ----------------------------------------------------
      otherRooms: [
        {
          id: 2,
          name: "渓音",
          kana: "けいおん",
          url: "keion.html",
          src: "img/keionn.png", // 👈 ここに夕霞の画像パスを書く！
        },
        {
          id: 3,
          name: "夕霞",
          kana: "ゆうがすみ",
          url: "yugasumi.html",
          src: "img/yuugasumi1.png", // 👈 ここに星待の画像パスを書く！
        },
      ],
    };
  },
  methods: {
    // スライド操作関数
    nextImage() {
      this.currentImageIndex =
        (this.currentImageIndex + 1) % this.roomImages.length;
    },
    prevImage() {
      this.currentImageIndex =
        (this.currentImageIndex - 1 + this.roomImages.length) %
        this.roomImages.length;
    },
    setCurrentImage(index) {
      this.currentImageIndex = index;
    },
  },
});
