<?php
/*
Template Name: 琥珀ページ
*/

get_header();
?>
<div id="kohaku-app">
<main>
  <!-- 琥珀（旅館コンセプト）ヒーローエリア（写真が入るエリア） -->
  <section class="kohaku-hero">
    <div class="kohaku-hero-overlay"></div>
    <div class="kohaku-hero-inner">
      <h1 class="kohaku-hero-title">琥珀</h1>
    </div>
  </section>

  <!-- コンセプトメッセージ領域 -->
  <section class="kohaku-concept fade-in-up">
    <div class="kohaku-container">
      <div class="kohaku-concept-text">
        <p>
          ようこそ、銀世界の別邸へ。<br />ここは、大人のための「隠れ家」です。
        </p>
        <p>
          創業当初から変わらぬ、木造建築の温もりと川のせせらぎ。<br />
          喧騒を忘れ、ただ、移ろう季節を愛でる。<br />
          私たちが提供するのは、一生の記憶に残る「静かな感動」です。
        </p>
      </div>
    </div>
  </section>

  <!-- 各セクションリスト -->
  <section class="kohaku-sections">
    <div class="ryokan-container">
      <!-- 雪見風呂エリア -->
      <div class="kohaku-card-item fade-in-up">
        <div class="row g-0 align-items-stretch">
          <!-- 左側：自動フェードスライドショーエリア（3枚） -->
          <div class="col-lg-7 col-md-6">
            <div class="kohaku-slideshow-container">
              <div v-for="(img, idx) in sliders[1].images" :key="idx" class="kohaku-slide"
                :class="{ 'active': idx === sliders[1].currentIndex }">
                <img :src="img.src" :alt="img.alt" class="kohaku-slide-img" />
              </div>
            </div>
          </div>
          <!-- 右側：雪見風呂 文言エリア -->
          <div class="col-lg-5 col-md-6 d-flex align-items-center">
            <div class="kohaku-text-card">
              <h3 class="kohaku-text-card-title">雪見風呂</h3>
              <p class="kohaku-text-card-catch">
                雪煙の向こう、大正レトロに浮かぶ銀世界。澄み渡る湯に心ほどける、至高の雪見風呂。
              </p>
              <p class="kohaku-text-card-desc">
                伝統ある木造宿に響く川のせせらぎと、優しく灯る竹灯籠の明かり。凜とした冬の空気の中、幻想的なライトアップが魅せる雪景色を眺めながら、ただ刻（とき）を忘れて名湯に身を委ねる静かな感動をお届けします。
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- 竹灯籠（スライドショー ＆ 文言エリア） -->
      <div class="kohaku-card-item fade-in-up">
        <div class="row g-0 align-items-stretch">
          <!-- 左側：自動フェードスライドショーエリア（3枚） -->
          <div class="col-lg-7 col-md-6">
            <div class="kohaku-slideshow-container">
              <div v-for="(img, idx) in sliders[0].images" :key="idx" class="kohaku-slide"
                :class="{ 'active': idx === sliders[0].currentIndex }">
                <img :src="img.src" :alt="img.alt" class="kohaku-slide-img" />
              </div>
            </div>
          </div>
          <!-- 右側：竹灯籠 文言エリア -->
          <div class="col-lg-5 col-md-6 d-flex align-items-center">
            <div class="kohaku-text-card">
              <h3 class="kohaku-text-card-title">竹灯籠</h3>
              <p class="kohaku-text-card-catch">
                川のせせらぎと、自然の息吹が灯す光。<br />一年を通じて出逢える、極上の夜。
              </p>
              <p class="kohaku-text-card-desc">
                創業当初から変わらぬ木造建築の温もりと川のせせらぎ。その豊かな水が生む水力発電が、銅山温泉街に新たな息吹をもたらしました。職人仕立ての竹灯籠に灯るのは御花畑市の自然エネルギー。琥珀の冬の「雪見風呂」をはじめ、四季を通して訪れる人を幻想的な光景へと誘います。
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- 送迎バス「冬霞号」（写真 ＆ 文言が入る仕様） -->
      <div class="kohaku-card-item fade-in-up">
        <div class="row g-0 align-items-stretch">
          <!-- 左側：写真が入るエリア -->
          <div class="col-lg-7 col-md-6">
            <div class="kohaku-photo-placeholder">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/huyukasumi3.png" alt="冬霞号">
            </div>
          </div>
          <!-- 右側：文言エリア -->
          <div class="col-lg-5 col-md-6 d-flex align-items-center">
            <div class="kohaku-text-card">
              <h3 class="kohaku-text-card-title">送迎バス「冬霞号」</h3>
              <p class="kohaku-text-card-catch">
                心躍る、贅沢な旅の一歩へ。<br />山方空港からの直行シャトルバス「冬霞号」運行
              </p>
              <p class="kohaku-text-card-desc">
                雪国のマイカー規制による乗換の手間をなくし、山方空港から当館まで直行60分で結びます。移動のストレスなく、大正レトロな佇まいと極上の雪見風呂へ貴方をお連れいたします。
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- 周辺施設（写真が入るエリア） -->
      <div class="kohaku-card-item fade-in-up">
        <div class="kohaku-photo-only-card">
          <a href="visite.html" class="kohaku-photo-link">
            <div class="kohaku-photo-placeholder">
              <h2 class="kohaku-photo-title">周辺施設</h2>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>
</div>

<?php get_footer(); ?>