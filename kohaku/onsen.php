<?php
/*
Template Name: 温泉ページ
*/

get_header();
?>

<script>
const themePath = "<?php echo get_template_directory_uri(); ?>";
</script>

<div id="onsen-app">

<main class="onsen-main-content">

    <!-- 温泉 ヒーローエリア -->
    <section class="onsen-hero fade-in-up">
      <div class="onsen-hero-bg"></div>
      <h1 class="onsen-hero-title">温泉</h1>
    </section>

    <!-- 温泉紹介セクション（3つの温泉をおしゃれに均等な間隔で並べる） -->
    <section class="onsen-list-section">
      <div class="ryokan-container">

        <!-- 3つの温泉をループ出力（交互レイアウト＆100pxずつの均等間隔） -->
        <div v-for="(spa, index) in spas" :key="spa.id" class="row onsen-item align-items-center fade-in-up"
          :class="index % 2 !== 0 ? 'flex-row-reverse' : ''">
          <!-- 温泉写真エリア（プレースホルダー） -->
          <div class="col-lg-7 col-md-6 mb-4 mb-md-0">
            <div class="onsen-image-box">
              <img :src="spa.imageSrc" :alt="spa.name" class="onsen-img">
            </div>
          </div>

          <!-- 温泉説明エリア（効能・概要をおしゃれに整理した和風デザイン） -->
          <div class="col-lg-5 col-md-6">
            <div class="onsen-text-box">
              <h2 class="onsen-spa-title">
                {{ spa.name }}
                <span class="onsen-spa-subtitle">について</span>
              </h2>

              <!-- 効能 -->
              <div class="onsen-effect-area">
                <span class="onsen-effect-label">効能</span>
                <p class="onsen-effect-text">{{ spa.effects }}</p>
              </div>

              <!-- 概要 -->
              <div class="onsen-desc-area">
                <span class="onsen-desc-label">概要</span>
                <p class="onsen-desc-text">{{ spa.description }}</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>


</div>

<?php get_footer(); ?>