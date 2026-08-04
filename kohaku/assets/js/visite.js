// 共通データ
const sightseeingData = [
  {
    id: 1,
    sub_name: "どうざんきょう",
    name: "銅山狭",
    category: "nature",
    access: "当館より徒歩約30分",
    location: "山方県御花畑市銅山",
    description:
      "銅山狭は、当館より徒歩約30分の場所に広がる静かな渓谷です。\nかつてこの一帯では銅の採掘が盛んに行われていたと伝えられ、今も坑道跡や石積みの遺構が自然の中にひっそりと残されています。\n四季折々の景色が美しく、春の新緑、夏の清流、秋の紅葉、冬の雪景色が訪れる人を魅了します。\n渓流沿いには遊歩道が整備され、せせらぎを聞きながら歴史と自然が織りなす趣深い風景をゆったりとお楽しみいただけます。",
    image: {
      src: "img/douzankyou.png",
      alt: "銅山狭",
    },
    url: "visite-detail.html?id=1",
  },

  {
    id: 2,
    sub_name: "あかねばし",
    name: "茜橋",
    category: "history",
    access: "当館より徒歩約8分",
    location: "山方県御花畑市銅山",
    description:
      "大正ロマンの風情を今に伝える銅山温泉街。その中心を流れる川に架かる「茜橋」は、総檜造りの美しい漆塗りの木橋です。周囲の深い緑に鮮やかに映える佇まいは、温泉街のシンボルとして長く愛されてきました。格別の美しさを見せるのが夕暮れ時です。周囲の旅館に明かりが灯り、川沿いに並ぶ竹灯籠の温かな光が漆塗りの欄干を茜色に艶やかに照らし出します。川のせせらぎに耳を傾けながら橋の上に佇めば、まるで時が止まったかのような、贅沢で幻想的なひとときを心ゆくまでご堪能いただけます。",
    image: {
      src: "img/visite-detail-2.jpg",
      alt: "茜橋",
    },
    url: "visite-detail.html?id=2",
  },

  {
    id: 3,
    sub_name: "あやとりはし",
    name: "あやとりはし",
    category: "culture",
    access: "当館より徒歩約12分",
    location: "山方県御花畑市銅山",
    description:
      "草月流家元がデザインした、独創的なS字型スチールの紅紫色の橋。斬新な見た目と周囲の大自然が見事な調和を見せています。",
    image: {
      src: "img/",
      alt: "あやとりはし",
    },
    url: "visite-detail.html?id=3",
  },

  {
    id: 4,
    sub_name: "ゆげかいどう",
    name: "ゆげ街道",
    category: "culture",
    access: "当館より徒歩約3分",
    location: "山方県御花畑市銅山",
    description:
      "名産の山中漆器や九谷焼のギャラリー、食べ歩きフード店が立ち並むメインストリート。お土産選びや散策に最適な通りです。",
    image: {
      src: "img/",
      alt: "ゆげ街道",
    },
    url: "visite-detail.html?id=4",
  },

  {
    id: 5,
    sub_name: "なたでら",
    name: "那谷寺",
    category: "history",
    access: "当館より車で約15分",
    location: "山方県御花畑市銅山",
    description:
      "奇岩遊仙境として知られる高野山真言宗の別格本山。秋の紅葉期をはじめ、豊かな自然の中にそびえ立つ美しい本堂が見どころです。",
    image: {
      src: "img/",
      alt: "那谷寺",
    },
    url: "visite-detail.html?id=5",
  },

  {
    id: 6,
    sub_name: "まんようおおたき",
    name: "万葉大滝",
    category: "nature",
    access: "当館より車で約20分",
    location: "山方県御花畑市銅山",
    description:
      "鬱そうとした山林 of の奥地に現れる、知る人ぞ知る名爆。幾重にも分かれ清らかな水が流れ落ちる姿に息を呑みます。",
    image: {
      src: "img/",
      alt: "万葉大滝",
    },
    url: "visite-detail.html?id=6",
  },
];

if (document.getElementById("kankou-app")) {
  new Vue({
    el: "#kankou-app",

    data() {
      return {
        selectedCategory: "all",

        categories: [
          { key: "all", name: "すべて" },
          { key: "nature", name: "自然・景勝" },
          { key: "history", name: "歴史・文化" },
          { key: "culture", name: "体験・芸術" },
        ],

        spots: sightseeingData,
      };
    },

    computed: {
      filteredSpots() {
        if (this.selectedCategory === "all") {
          return this.spots;
        }

        return this.spots.filter(
          (spot) => spot.category === this.selectedCategory,
        );
      },
    },

    methods: {
      setCategory(key) {
        this.selectedCategory = key;
      },

      getCategoryName(key) {
        const cat = this.categories.find((c) => c.key === key);
        return cat ? cat.name : "";
      },
    },
  });
}

if (document.getElementById("kankou-1-app")) {
  const params = new URLSearchParams(location.search);

  const id = Number(params.get("id"));

  new Vue({
    el: "#kankou-1-app",

    data() {
      return {
        sightseeing: sightseeingData.find((item) => item.id === id),
      };
    },
  });
}
