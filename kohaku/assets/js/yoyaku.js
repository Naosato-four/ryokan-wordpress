// ==========================================================
// 1. フォーム画面コンポーネント（入力画面）
// ==========================================================
Vue.component("order-form", {
  template: "#tpl-order-form",
  props: [
    "orderForm",
    "errors",
    "mailError",
    "telError",
    "todayDate",
    "currentView",
  ],

  mounted() {
    // 💡 宿泊日カレンダー（datepicker）の初期化
    $(this.$el)
      .find("#date")
      .datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: "yy-mm-dd",
        minDate: new Date(),
        beforeShow: function (input, inst) {
          setTimeout(function () {
            var inputOffset = $(input).offset();
            var inputHeight = $(input).outerHeight();
            inst.dpDiv.css({
              top: inputOffset.top + inputHeight + 4,
              left: inputOffset.left,
            });

            // 💡 【重要】開いた一瞬に勝手に選択される白・青のチラつきを消去
            inst.dpDiv.find(".ui-state-active").removeClass("ui-state-active");
          }, 0);
        },
        onChangeMonthYear: function (year, month, inst) {
          // 月を切り替えたときのチラつきも防止
          setTimeout(function () {
            inst.dpDiv.find(".ui-state-active").removeClass("ui-state-active");
          }, 0);
        },
        onSelect: (dateText) => {
          this.$emit("update:orderForm", { ...this.orderForm, date: dateText });

          const nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
          $(this.$el).find("#dateOut").datepicker("option", "minDate", nextDay);
        },
      });

    // 💡 チェックアウト日カレンダー（datepicker）の初期化
    $(this.$el)
      .find("#dateOut")
      .datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: "yy-mm-dd",
        minDate: new Date(),
        beforeShow: function (input, inst) {
          setTimeout(function () {
            var inputOffset = $(input).offset();
            var inputHeight = $(input).outerHeight();
            inst.dpDiv.css({
              top: inputOffset.top + inputHeight + 4,
              left: inputOffset.left,
            });

            // 💡 【重要】チェックアウト側も、開いた瞬間の勝手な選択クラス（チラつきの原因）を完全に消去
            inst.dpDiv.find(".ui-state-active").removeClass("ui-state-active");
          }, 0);
        },
        onChangeMonthYear: function (year, month, inst) {
          // 月を切り替えたときのチラつきも防止
          setTimeout(function () {
            inst.dpDiv.find(".ui-state-active").removeClass("ui-state-active");
          }, 0);
        },
        onSelect: (dateText) => {
          this.$emit("update:orderForm", {
            ...this.orderForm,
            dateOut: dateText,
          });
        },
      });

    // 初期化時にすでに日付が入っている場合の最小値連動
    if (this.orderForm.date) {
      const nextDay = new Date(this.orderForm.date);
      nextDay.setDate(nextDay.getDate() + 1);
      $(this.$el).find("#dateOut").datepicker("option", "minDate", nextDay);
    }
    const selectIds = ["#guestsAdult", "#guestsChild", "#rooms"];

    selectIds.forEach((id) => {
      const element = $(this.$el).find(id)[0]; // Vueコンポーネント内からselect要素を探す
      if (element) {
        new Choices(element, {
          searchEnabled: false /* 検索窓は不要なのでオフ */,
          itemSelectText: "" /* マウスを乗せた時の余計な文字を消す */,
          shouldSort: false /* 1名、2名…の順番を勝手に並び替えない */,

          // 🔥 【最重要】これで画面のどこにいても、100%絶対下に開くようになります
          position: "bottom",
        });
      }
    });
  },

  beforeDestroy() {
    $(this.$el).find("#date").datepicker("destroy");
    $(this.$el).find("#dateOut").datepicker("destroy");
  },
});

// ==========================================================
// 2. 確認画面コンポーネント
// ==========================================================
Vue.component("order-confirm", {
  template: "#tpl-order-confirm",
  props: ["orderForm", "calculatedTotal", "nights", "currentView"],
  filters: {
    formatPrice(value) {
      if (!value) return "0";
      return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
  },
});

// ==========================================================
// 3. 完了画面コンポーネント
// ==========================================================
Vue.component("order-complete", {
  template: "#tpl-order-complete",
  props: ["currentView"],
});

// ==========================================================
// 親インスタンス
// ==========================================================
new Vue({
  el: "#app",
  data: {
    currentView: "order-form",
    currentOrderNumber: "",
    // HTML側の変数構造と完全一致
    orderForm: {
      date: "",
      dateOut: "",
      guestsAdult: "", // 大人の初期値を2名に設定（お好みで空文字でもOK）
      guestsChild: "", // 小人の初期値を0名に設定
      roomType: "",
      rooms: "",
      hasAllergy: "なし", // 💡 初期値は「なし」
      allergyItems: [], // 💡 チェックされた品目を入れる配列
      allergyNote: "", // 💡 テキストエリア用
      customerName: "",
      mail: "",
      phone: "",
      zip: "",
      address: "",
      note: "",
    },
    // 高級旅館「琥珀」の部屋単価マスター設定
    roomPrices: { 渓音: 16000, 夕霞: 16000, 星待: 16000 },
    lastOrder: {},
    errors: {
      date: [],
      dateOut: [],
      guests: [],
      roomType: [],
      rooms: [],
      name: [],
      email: [],
      tel: [],
      zip: [],
      address: [],
    },
  },
  computed: {
    todayDate() {
      const today = new Date();
      return `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, "0")}-${String(today.getDate()).padStart(2, "0")}`;
    },
    // チェックインとチェックアウトから泊数（nights）をリアルタイム自動計算
    nights() {
      if (!this.orderForm.date || !this.orderForm.dateOut) return 0;
      const inDate = new Date(this.orderForm.date);
      const outDate = new Date(this.orderForm.dateOut);
      const diffMs = outDate - inDate;
      const days = Math.floor(diffMs / (1000 * 60 * 60 * 24));
      return days > 0 ? days : 0;
    },
    // 金額自動計算（単価 × 人数 × 泊数 × 部屋数）
    calculatedTotal() {
      const pricePerPerson = this.roomPrices[this.orderForm.roomType] || 0;
      const adultCount = parseInt(this.orderForm.guestsAdult) || 0;
      const childCount = parseInt(this.orderForm.guestsChild) || 0;
      const nights = this.nights || 0;
      const rooms = parseInt(this.orderForm.rooms) || 0;

      // 小人は大人料金の50%（0.5倍）として計算するロジック例
      const totalGuestPrice =
        pricePerPerson * adultCount + pricePerPerson * 0.5 * childCount;

      return totalGuestPrice * nights * rooms;
    },
    mailError() {
      if (!this.orderForm.mail) return "";
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return emailRegex.test(this.orderForm.mail)
        ? ""
        : "メールアドレス形式ではありません";
    },
    telError() {
      if (!this.orderForm.phone) return "";
      const telRegex = /^0\d{9,10}$/;
      return telRegex.test(this.orderForm.phone)
        ? ""
        : "電話番号の形式が正しくありません";
    },
  },
  watch: {
    // リアルタイム・バリデーションおよび入力値の自動クレンジング（サニタイズ）
    "orderForm.customerName"(newValue) {
      this.errors.name = [];
      if (!newValue) return;
      if (!/^[ァ-ヶー\s ]+$/.test(newValue))
        this.errors.name.push("全角カタカナで入力してください。");
      if (newValue.length > 20)
        this.errors.name.push("20文字以内で入力してください。");
    },
    "orderForm.mail"(newValue) {
      if (newValue) this.errors.email = [];
    },
    "orderForm.phone"(newValue) {
      if (newValue) {
        this.errors.tel = [];
        this.orderForm.phone = newValue.replace(/[^\d]/g, "").slice(0, 11);
      }
    },
    "orderForm.date"() {
      this.errors.date = [];
    },
    "orderForm.dateOut"() {
      this.errors.dateOut = [];
    },
    "orderForm.guests"() {
      this.errors.guests = [];
    },
    "orderForm.roomType"() {
      this.errors.roomType = [];
    },
    "orderForm.rooms"() {
      this.errors.rooms = [];
    },
    "orderForm.zip"(val) {
      if (val) {
        this.errors.zip = [];
        this.orderForm.zip = val.replace(/[^\d]/g, "").slice(0, 7);
      }
    },
    "orderForm.address"() {
      this.errors.address = [];
    },
  },
  created() {
    this.generateOrderNumber();

    // 💡 URLのパラメータ（?room=〇〇）を解析する
    const urlParams = new URLSearchParams(window.location.search);
    const roomParam = urlParams.get("room"); // URLから「room」の値を取り出す

    // もしURLに部屋名が入っていたら、予約フォームの初期値にセットする
    if (roomParam) {
      this.orderForm.roomType = roomParam;
    }

    //（既存の完了画面チェック処理がある場合はそのままでOK）
    if (urlParams.get("view") === "order-complete")
      this.currentView = "order-complete";
  },
  mounted() {
    this.$on("finalize-order", this.handleOrderFinalSubmit);
    this.$on("reset-to-order", this.resetToOrderPage);
  },
  methods: {
    generateOrderNumber() {
      this.currentOrderNumber = Math.floor(1000 + Math.random() * 9000);
    },
    // 確認画面へ進む前の必須チェック
    goToConfirm() {
      let hasError = false;
      this.errors = {
        date: [],
        dateOut: [],
        guests: [],
        roomType: [],
        rooms: [],
        name: [],
        email: [],
        tel: [],
      };

      if (!this.orderForm.date) {
        this.errors.date.push("宿泊日を選択してください。");
        hasError = true;
      }
      if (!this.orderForm.dateOut) {
        this.errors.dateOut.push("チェックアウト日を選択してください。");
        hasError = true;
      }
      if (this.orderForm.date && this.orderForm.dateOut) {
        const inDate = new Date(this.orderForm.date);
        const outDate = new Date(this.orderForm.dateOut);
        if (outDate <= inDate) {
          this.errors.dateOut.push(
            "チェックアウト日は宿泊日の翌日以降で選択してください。",
          );
          hasError = true;
        }
      }
      if (!this.orderForm.guestsAdult) {
        this.errors.guests.push("大人のご利用人数を選択してください。");
        hasError = true;
      }
      if (!this.orderForm.roomType) {
        this.errors.roomType.push("ご希望のお部屋を選択してください。");
        hasError = true;
      }
      if (!this.orderForm.rooms) {
        this.errors.rooms.push("部屋数を選択してください。");
        hasError = true;
      }
      if (!this.orderForm.customerName) {
        this.errors.name.push("お名前を入力してください。");
        hasError = true;
      }
      if (!this.orderForm.phone) {
        this.errors.tel.push("電話番号を入力してください。");
        hasError = true;
      }
      if (!this.orderForm.mail) {
        this.errors.email.push("メールアドレスを入力してください。");
        hasError = true;
      }

      if (
        hasError ||
        this.errors.name.length > 0 ||
        this.mailError !== "" ||
        this.telError !== ""
      ) {
        alert("入力内容に不備があります。修正してください。");
        window.scrollTo({ top: 0, behavior: "smooth" });
        return;
      }

      this.currentView = "order-confirm";
      window.scrollTo({ top: 0, behavior: "smooth" });
    },
    goToOrder() {
      this.currentView = "order-form";
      window.scrollTo({ top: 0, behavior: "smooth" });
    },
    resetToOrderPage() {
      this.currentView = "order-form";
      this.orderForm = {
        date: "",
        dateOut: "",
        guestsAdult: "",
        guestsChild: "",
        roomType: "",
        rooms: "",
        hasAllergy: "なし",
        allergyItems: [],
        allergyNote: "",
        customerName: "",
        mail: "",
        phone: "",
        zip: "",
        address: "",
        note: "",
      };
      this.generateOrderNumber();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
    handleOrderFinalSubmit() {
      this.lastOrder = {
        orderNumber: this.currentOrderNumber,
        totalPrice: this.calculatedTotal,
        ...this.orderForm,
      };

      this.currentView = "order-complete";

      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
  },
});
