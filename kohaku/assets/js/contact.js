/**
 * お問い合わせ画面専用ロジック（完全リアルタイムバリデーション版）
 */
Vue.component("contact-form", {
  template: "#tpl-contact-form",
  props: [
    "form",
    "faqUrl",
    "nameError",
    "kanaError",
    "zipError",
    "addressError",
    "telError",
    "mailError",
    "mailConfirmError",
    "contentError",
  ],
});

Vue.component("contact-complete", {
  template: "#tpl-contact-complete",
  props: ["form"],
});

$(document).ready(function () {
  const contactApp = new Vue({
    el: "#contactApp",

    data() {
      return {
        currentView: "contact-form",
        form: {
          name: "",
          kana: "",
          email: "",
          tel: "",
          content: "",
        },
        faqUrl: "/qanda/",
      };
    },

    computed: {
      // お名前のリアルタイムバリデーション
      nameError: function () {
        // 入力中、または一度触って空欄になった場合
        if (this.form.name !== "" && !this.form.name.trim()) {
          return "お名前を入力してください。";
        }
        if (this.form.name.length > 40) {
          return "お名前は40文字以内で入力してください。";
        }
        return "";
      },

      // フリガナのリアルタイムバリデーション
      kanaError: function () {
        if (this.form.kana.length > 40) {
          return "フリガナは40文字以内で入力してください。";
        }
        return "";
      },

      // メールアドレスのリアルタイムバリデーション
      mailError: function () {
        if (this.form.email !== "" && !this.form.email.trim()) {
          return "メールアドレスを入力してください。";
        }
        if (this.form.email) {
          var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
          if (!emailRegex.test(this.form.email)) {
            return "メールアドレスの形式が正しくありません。";
          }
        }
        return "";
      },

      // 電話番号のリアルタイムバリデーション
      telError: function () {
        if (!this.form.tel) {
          return "";
        }
        var telRegex = /^0\d{9,10}$/;
        if (!telRegex.test(this.form.tel)) {
          return "電話番号の形式が正しくありません（10桁または11桁の数字）。";
        }
        return "";
      },

      zipError: function () {
        return "";
      },

      addressError: function () {
        return "";
      },

      mailConfirmError: function () {
        return "";
      },

      // お問い合わせ内容のリアルタイムバリデーション
      contentError: function () {
        if (this.form.content !== "" && !this.form.content.trim()) {
          return "お問い合わせ内容を入力してください。";
        }
        if (this.form.content.length > 300) {
          return "お問い合わせ内容は300文字以内で入力してください。";
        }
        return "";
      },
    },

    methods: {
      fetchAddress: function () {
        return;
      },

      goToComplete: function () {
        this.currentView = "contact-complete";
      },

      filterTel: function () {
        this.form.tel = this.form.tel.replace(/[^\d]/g, "");
      },
      /**
       * 送信処理
       */
      submitContact() {
        // 1. 【新設】送信ボタンが押された瞬間、未入力の項目があればその場でエラー文をセットして強制表示させる
        if (!this.form.name.trim()) {
          // 意図的に触らせて computed のエラーを画面に引きずり出します
          this.form.name = " ";
          this.form.name = "";
          alert("お名前を入力してください。");
          return;
        }
        if (!this.form.email.trim()) {
          this.form.email = " ";
          this.form.email = "";
          alert("メールアドレスを入力してください。");
          return;
        }
        if (!this.form.content.trim()) {
          this.form.content = " ";
          this.form.content = "";
          alert("お問い合わせ内容を入力してください。");
          return;
        }

        // 2. すでに文字は入っているが、文字数オーバーや形式エラーが画面に出ている場合のブロック
        if (
          this.nameError ||
          this.mailError ||
          this.contentError ||
          this.kanaError ||
          this.telError
        ) {
          alert(
            "入力内容に不備があります。画面のエラーメッセージを確認してください。",
          );
          return;
        }

        // 3. すべてのバリデーションをクリアしていれば遷移
        console.log("バリデーション通過:", this.form);
        sessionStorage.setItem(
          "ryokan_contact_form",
          JSON.stringify(this.form),
        );
        window.location.href = "/contact-complete/";
      },
    },
  });
});
