// ==========================================================
// 1. URLのパラメータ（?room=xxx）またはファイル名から現在の部屋を自動判定
// ==========================================================
function detectActiveRoom() {
  const urlParams = new URLSearchParams(window.location.search);
  const roomParam = urlParams.get("room"); // URLの「?room=yugasumi」などを取得
  const path = window.location.pathname.toLowerCase();
  const title = document.title;

  // ① URLのクエリパラメータによる最優先判定
  if (roomParam === "keion" || roomParam === "渓音") return "keion";
  if (roomParam === "yugasumi" || roomParam === "夕霞") return "yugasumi";
  if (
    roomParam === "hoshimati" ||
    roomParam === "hoshimachi" ||
    roomParam === "星待"
  )
    return "hoshimati";

  // ② URLのファイル名（末尾）による第二判定（旧リンクとの互換性用）
  if (path.indexOf("keion") !== -1) return "keion";
  if (path.indexOf("yugasumi") !== -1) return "yugasumi";
  if (path.indexOf("hoshimati") !== -1 || path.indexOf("hoshimachi") !== -1)
    return "hoshimati";

  // ③ ブラウザのタイトルによる最終保険判定
  if (title.indexOf("渓音") !== -1) return "keion";
  if (title.indexOf("夕霞") !== -1) return "yugasumi";
  if (title.indexOf("星待") !== -1) return "hoshimati";

  // 判定が不能な場合の安全な初期値（渓音を標準とする）
  return "keion";
}

// ==========================================================
// 2. HTMLの解析完了（DOM準備）を待ってから処理を開始
// ==========================================================
jQuery(document).ready(function ($) {
  // ----------------------------------------------------
  // ★ jQuery処理：スクロールフェードイン（元の動きを完全維持）
  // ----------------------------------------------------
  function checkFadeIn() {
    $(".fade-in-up").each(function () {
      const elementTop = $(this).offset().top;
      const windowBottom = $(window).scrollTop() + $(window).height();

      // 要素が画面下部から80px以上入った場合に「is-visible」を付与
      if (windowBottom > elementTop + 80) {
        $(this).addClass("is-visible");
      }
    });
  }

  // スクロール時および初回読み込み時に実行
  $(window).on("scroll", checkFadeIn);
  checkFadeIn();

  // ----------------------------------------------------
  // ★ Vue.js処理：マウント対象の「#room-detail-app」が存在する場合のみ起動
  // ----------------------------------------------------
  if ($("#room-detail-app").length) {
    new Vue({
      el: "#room-detail-app",
      data() {
        return {
          // JSONデータから動的にマッピングされる器
          roomInfo: {},
          roomImages: [],
          otherRooms: [],

          currentImageIndex: 0, // 現在表示中のスライドインデックス

          // ★ 3室共通：無料サービス情報
          freeServices: [
            "ラウンジでのウェルカムドリンク",
            "お部屋のミニバー（ビール・ソフトドリンクフリー）",
            "貸切家族風呂 1回無料（45分間）",
            "お好みの色浴衣・アメニティバー利用無料",
          ],

          // ★ 3室共通：備品と備品の紹介（アイコンおよび詳細テキスト）
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
        };
      },

      // 💡 インスタンス生成時に、外部JSON（data/rooms.json）を非同期取得
      created() {
        const activeRoom = detectActiveRoom();

        $.getJSON(themeData.roomJson)
          .done((data) => {
            const activeData = data[activeRoom] || data.keion;

            // 各変数にJSONの中身を流し込み
            this.roomInfo = activeData;
            this.roomImages = activeData.roomImages.map((img) => ({
              ...img,
              src: themeData.imgUrl + img.src,
            }));
            this.otherRooms = activeData.otherRooms.map((room) => ({
              ...room,
              src: themeData.imgUrl + room.src,
            }));
            // hero画像
            this.roomInfo.heroImage =
              themeData.imgUrl + this.roomInfo.heroImage;
            // 間取り画像
            this.roomInfo.floorPlan =
              themeData.imgUrl + this.roomInfo.floorPlan;
            // タブのタイトル名（<title>）を現在の客室名で自動上書き
            document.title = `${this.roomInfo.roomName} - 銅山温泉 旅館 琥珀`;
          })
          .fail((jqxhr, textStatus, error) => {
            console.error(
              "JSONデータの読み込みに失敗しました:",
              textStatus,
              error,
            );
          });
      },

      methods: {
        // 🔄 スライド操作関数（元の動き・ロジックを完全再現）
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
  }
});
