/**
 * 女将ページ専用JavaScript (okami.js)
 * スクロール連動フェードインアニメーションの制御
 */
document.addEventListener("DOMContentLoaded", function () {
  const fadeElements = document.querySelectorAll(".fade-in-up");

  const appearanceObserver = new IntersectionObserver(
    function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          // 一度表示されたら監視を解除してパフォーマンスを維持
          observer.unobserve(entry.target);
        }
      });
    },
    {
      root: null,
      rootMargin: "0px 0px -10% 0px", // 画面下部より少し手前で発火
      threshold: 0.1,
    },
  );

  fadeElements.forEach(function (element) {
    appearanceObserver.observe(element);
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // お告げのバリエーション（いくらでも増やせます！）
  const fortunes = [
    {
      title: "【満福】お肉が呼んでいる一日",
      desc: "本日のあなた様は、エネルギーが満ち溢れる強運の相。総料理長が魂を込めて焼き上げる名物料理で肉汁と愛をチャージすれば、向かうところ敵なしでございます。",
      url: "food.html",
      btnText: "弥武景庵のお食事を見る",
    },
    {
      title: "【静穏】ゆったり心の洗濯日",
      desc: "少しお疲れではありませんか？本日は館内の生け花をのんびり眺めたり、当旅館の湯で温泉のせせらぎに耳を傾けるのが吉。湯上がりには冷たい地酒『蜻野（せいや）』が心に染み渡ります。",
      url: "onsen.html",
      btnText: "自慢の温泉を見る",
    },
    {
      title: "【新風】新しい出会いの予感",
      desc: "日常にちょっとしたワクワクが訪れそうな日。周辺施設のアクティビティを体験したり、売店のちょっと珍しいお土産を覗いてみてください。女将の手書きお品書きにも、小さな隠しメッセージ（遊び心）が眠っているかもしれません。",
      url: "visite.html",
      btnText: "周辺施設一覧を見る",
    },
  ];

  const btn = document.getElementById("uranai-btn");
  const modal = document.getElementById("fortune-modal");
  const resultBox = document.getElementById("fortune-result");
  const closeBtn = document.getElementById("fortune-close");

  if (btn && modal && resultBox && closeBtn) {
    // ボタンを押した時の処理
    btn.addEventListener("click", function () {
      // 0〜配列の数の間でランダムな数字を1つ選ぶ
      const randomIndex = Math.floor(Math.random() * fortunes.length);
      const selected = fortunes[randomIndex];

      // ポップアップの中身を書き換える
      resultBox.innerHTML = `
        <h4>${selected.title}</h4>
        <p>${selected.desc}</p>
      `;

      // ポップアップを表示する（CSSのis-openクラスをつける）
      modal.classList.add("is-open");
    });

    // 閉じるボタンを押した時、または背景をクリックした時に閉じる
    closeBtn.addEventListener("click", function () {
      modal.classList.remove("is-open");
    });
    modal.addEventListener("click", function (e) {
      if (e.target === modal) modal.classList.remove("is-open");
    });
  }
});
