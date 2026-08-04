/**
 * 予約確認画面専用スクリプト
 */
$(document).ready(function () {
  const confirmApp = new Vue({
    mixins: [commonMixin],
    el: "#confirmApp",

    data() {
      return {
        // yoyaku.jsの新しいデータ構造と完全連動
        form: {
          checkIn: "",
          checkOut: "",
          peopleAdult: "0名", // 大人
          peopleChild: "0名", // 小人
          roomType: "",
          name: "",
          kana: "",
          email: "",
          tel: "",
          zip: "",
          address: "",
          message: "",
        },
        // 料金計算用の単価設定（yoyaku.htmlの案内と一致させる）
        priceAdult: 16000,
        priceChild: 8000,
      };
    },

    // 【追加】データを元に自動計算を行うプロパティ
    computed: {
      /**
       * 大人・小人の人数から合計金額を計算して、3桁区切りの文字列を返す
       */
      calculateTotalCharge() {
        // "2名" や "3名以上" という文字列から数値だけを抜き出す処理
        const adultCount = parseInt(this.form.peopleAdult) || 0;
        const childCount = parseInt(this.form.peopleChild) || 0;

        // 掛け算して合計を算出
        const total =
          adultCount * this.priceAdult + childCount * this.priceChild;

        // 数字を「15,000」のようにカンマ区切りの見やすい形式に変換して画面に返す
        return total.toLocaleString();
      },
    },

    methods: {
      loadFormData() {
        const savedData = sessionStorage.getItem("ryokan_yoyaku_form");
        if (savedData) {
          this.form = JSON.parse(savedData);
        } else {
          // テスト用ダミーデータ（確認用）
          this.form = {
            checkIn: "2026-07-15",
            checkOut: "2026-07-16",
            peopleAdult: "2名",
            peopleChild: "1名",
            roomType: "露天風呂付客室",
            name: "琥珀 太郎",
            kana: "コハク タロウ",
            email: "sample@example.com",
            tel: "09012345678",
            zip: "916-0029",
            address: "山方県尾花畑市大字銅山 琥珀町1-1",
            message: "アレルギー対応ありがとうございます。",
          };
        }
      },

      submitFinalReservation() {
        $(".confirm-submit-button")
          .prop("disabled", true)
          .css("opacity", "0.6");
        sessionStorage.removeItem("ryokan_yoyaku_form");
        window.location.href = "complete.html";
      },
    },

    mounted() {
      this.loadFormData();
    },
  });
});
