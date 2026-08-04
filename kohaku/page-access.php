<?php

/*
Template Name: アクセスページ
*/

get_header();
?>


  <div id="access-app">
    <!-- ヘッダー領域 -->
    <!-- メインコンテンツ領域 (Vue管理エリア) -->
    <main class="access-main-content">

      <!-- ヒーローエリア -->
      <section class="access-hero">
        <div class="access-hero-inner">
          <h1 class="access-hero-title">交通案内</h1>
        </div>
      </section>

      <!-- 1. 専用シャトルバス「冬霞号」ご利用の推奨 パート -->
      <section class="access-info-section fade-in-up">
        <div class="ryokan-container">
          <div class="access-info-card">
            <h2 class="access-info-title">専用シャトルバス「冬霞号」ご利用の推奨</h2>
            <div class="access-info-content">
              <p>
                銅山温泉街周辺の美しい自然環境を保護するため、通年でマイカーの乗り入れ制限を行っております。お越しの際は、空港から直通の専用シャトルバス「冬霞号」をご利用いただけますと、スムーズにお越しいただけます。
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- 2. 冬霞号（シャトルバス）/時刻表 パート -->
      <section class="access-bus-section fade-in-up">
        <div class="ryokan-container">
          <div class="access-section-header mb-0">
            <h2 class="access-section-title">冬霞号（シャトルバス）時刻表</h2>
            <div class="access-bus-summary">
              <div class="access-badge-box">
                <span class="access-badge">所要時間</span> 約60分
              </div>
              <div class="access-badge-box">
                <span class="access-badge">運行区間</span> 山方空港 ⇔ 旅館 琥珀
              </div>
            </div>
          </div>

          <div class="row g-5 mt-2">
            <!-- 往路（山方空港駅 ⇒ 琥珀） -->
            <div class="col-lg-6">
              <h3 class="access-bus-direction">往路 <span class="access-bus-dir-sub">[ 山方空港発 ⇒ 旅館 琥珀行 ]</span></h3>

              <div class="access-bus-list">
                <div v-for="item in outbound" :key="item.id" class="access-bus-card">
                  <div class="access-bus-card-header">
                    <span class="access-bus-no">{{ item.no }}</span>
                    <div class="access-timeline">
                      <span class="access-time">{{ item.depTime }} <span class="access-place">{{ item.depPlace
                          }}</span></span>
                      <i class="fa-solid fa-chevron-right mx-2 access-arrow"></i>
                      <span class="access-time">{{ item.arrTime }} <span class="access-place">{{ item.arrPlace
                          }}</span></span>
                    </div>
                  </div>
                  <div class="access-bus-card-body">
                    <span class="access-recommend-title"><i class="fa-regular fa-lightbulb me-1"></i>おすすめの過ごし方</span>
                    <p class="access-recommend-desc">{{ item.recommend }}</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- 復路（琥珀 ⇒ 山方空港駅） -->
            <div class="col-lg-6">
              <h3 class="access-bus-direction">復路 <span class="access-bus-dir-sub">[ 旅館 琥珀発 ⇒ 山方空港行 ]</span></h3>

              <div class="access-bus-list">
                <div v-for="item in inbound" :key="item.id" class="access-bus-card">
                  <div class="access-bus-card-header">
                    <span class="access-bus-no">{{ item.no }}</span>
                    <div class="access-timeline">
                      <span class="access-time">{{ item.depTime }} <span class="access-place">{{ item.depPlace
                          }}</span></span>
                      <i class="fa-solid fa-chevron-right mx-2 access-arrow"></i>
                      <span class="access-time">{{ item.arrTime }} <span class="access-place">{{ item.arrPlace
                          }}</span></span>
                    </div>
                  </div>
                  <div class="access-bus-card-body">
                    <span class="access-recommend-title"><i class="fa-regular fa-lightbulb me-1"></i>おすすめの過ごし方</span>
                    <p class="access-recommend-desc">{{ item.recommend }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 3. Google Map パート -->
      <section class="access-map-section fade-in-up">
        <div class="ryokan-container">
          <div class="access-section-header">
            <h2 class="access-section-title">周辺地図</h2>
            <p class="access-section-subtitle">山方空港より「冬霞号（シャトルバス）」で約60分、アクセス良好な湯の街</p>
          </div>

          <!-- Google Map 埋め込み枠 (アスペクト比維持のレスポンシブ枠) -->
          <div class="access-map-wrapper ratio ratio-21x9">
            <!-- ※ 本番用のGoogle Map埋め込みタグ(iframe)を以下と差し替えてください。現在はプレースホルダー表示用 -->
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8280303868285!2d139.76454987642672!3d35.68123620070505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34b58c3!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
              style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
              title="Google Map">
            </iframe>
          </div>
        </div>
      </section>

      <!-- 4.その他の交通手段 パート -->
      <div class="ryokan-container">
        <div class="access-section-header">
          <h2 class="access-section-title mb-4">その他の交通手段</h2>
          <div class="access-other-box">
            <div class="row text-center text-md-start">
              <div class="col-md-4 mb-4 mb-md-0">
                <span class="access-other-label">電車でお越しの方</span>
                <p class="access-other-text">JR「山方空港駅」下車。改札口より「冬霞号（シャトルバス）」にて約60分。</p>
              </div>
              <div class="col-md-4 mb-4 mb-md-0">
                <span class="access-other-label">お車でお越しの方</span>
                <p class="access-other-text">「御花畑IC」より「大正マロン館」駐車場まで約20分。駐車場から路線バスに乗り換えて約10分間。</p>
              </div>
              <div class="col-md-4">
                <span class="access-other-label">路線バスをご利用の方</span>
                <p class="access-other-text">「山方空港前」バス停より、当館まで約70分（料金：大人1,500円、小人750円）。</p>
              </div>
            </div>
          </div>
        </div>
      </div>


    </main>

    <?php get_footer();?>
