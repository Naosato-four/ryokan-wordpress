<?php
/*
Template Name: お部屋ページ
*/

get_header();
?>

<div id="room-app">

<main class="room-main-content">

  <!-- お部屋 ヒーローエリア -->
    <section class="room-hero">
      <div class="room-hero-inner">
        <h1 class="room-intro-title">客室紹介</h1>
      </div>
    </section>

    <!-- 客室紹介セクション（3室を独立して紹介） -->
    <section class="room-intro-section">
      <div class="ryokan-container">

        <!-- 3部屋分の紹介（Vueデータからループ出力、奇数番目は左右交互レイアウトに自動設定） -->
        <div class="room-detail-list">
          <div v-for="(room, index) in rooms" :key="room.id" class="row room-detail-item align-items-center fade-in-up"
            :class="index % 2 !== 0 ? 'flex-row-reverse' : ''">
            <!-- 客室イメージ画像（プレースホルダー） -->
            <div class="col-lg-7 col-md-6 mb-4 mb-md-0">
              <div class="room-image-box">
                <a :href="room.url" class="room-link">
                  <img :src="room.imageSrc" :alt="room.name" class="room-img">
                </a>
              </div>
            </div>

            <!-- 客室詳細テキスト -->
            <div class="col-lg-5 col-md-6">
              <div class="room-text-box">
                <div class="room-detail-name-wrap">
                  <span class="room-detail-num">{{ room.num }}</span>
                  <h3 class="room-detail-name">
                    {{ room.name }}
                    <span class="room-detail-kana">[{{ room.kana }}]</span>
                  </h3>
                </div>
                <p class="room-detail-desc">{{ room.description }}</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- アメニティ・備品セクション -->
    <section class="room-amenity-area fade-in-up">
      <div class="ryokan-container">
        <div class="room-amenity-section">
          <h2 class="room-amenity-title">アメニティ・備品</h2>
          <p class="room-amenity-subtitle">「肌で触れ、香りに安らぐ。身も心もほどく、琥珀のおもてなし。」</p>
          <div class="room-amenity-desc">
            <p>大人旅の疲れを心からときほぐし、豊かにお過ごしいただくため、客室内や湯上がりにご用意するアメニティにも、この土地ならではのこだわりを宿しました。</p>
            <p>宿のロゴをあしらった館内着は、肌馴染みが良くリラックスできる作務衣とパジャマをご用意。</p>
            <p>
              また、バスアメニティのほか、地元の豊かな実りを感じさせる「米ぬか美容オイル（RICE BRAN OIL）」や、職人の手技を感じる木製コームなど、自然由来の優しさにこだわったプロダクトを厳選いたしました。
            </p>
          </div>
          <div class="room-amenity-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/amenity1.png" alt="客室にご用意している厳選されたアメニティと館内着">
          </div>
        </div>

      </div>
    </section>

</main>

</div>

<?php get_footer(); ?>