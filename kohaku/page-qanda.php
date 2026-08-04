<?php

/*
Template Name: よくある質問ページ
*/

get_header();?>

<!-- メインコンテンツ領域 (Vue管理エリア) -->
  <main id="qanda-app" class="qanda-main-content">

    <!-- 1. 特によくいただくご質問（あらかじめ5個表示されるアコーディオン） -->
    <section class="qanda-frequent-section">
      <div class="ryokan-container">
        <div class="qanda-section-header">
          <h2 class="qanda-section-title">特によくいただくご質問</h2>
          <p class="qanda-section-subtitle">お客様から特にお問い合わせの多い質問をまとめております</p>
        </div>

        <div class="qanda-accordion-list fade-in-up">
          <!-- ループでよくある質問5件を自動レンダリング -->
          <div v-for="(item, index) in frequentQuestions" :key="item.id" class="qanda-accordion-item"
            :class="{ 'is-open': item.isOpen }">
            <!-- 質問部分 (クリックでアコーディオン開閉) -->
            <button class="qanda-question-btn" @click="toggleFaq(item)">
              <span class="qanda-q-icon">Q</span>
              <span class="qanda-q-text">{{ item.q }}</span>
              <!-- 開閉状態（+ / -）を示すアイコン -->
              <span class="qanda-toggle-icon"></span>
            </button>

            <!-- 回答部分 (滑らかに縦に広がるトランジション) -->
            <div class="qanda-answer-wrapper" :style="getAnswerStyle(item)">
              <div class="qanda-answer-inner">
                <span class="qanda-a-icon">A</span>
                <p class="qanda-a-text">{{ item.a }}</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- 2. カテゴリ別の質問（タブ、または見出しの下にアコーディオン） -->
    <section class="qanda-category-section fade-in-up">
      <div class="qanda-container">
        <div class="qanda-section-header">
          <h2 class="qanda-section-title">カテゴリー別のご質問</h2>
          <p class="qanda-section-subtitle">お知りになりたい項目からご質問をお探しいただけます</p>
        </div>

        <!-- 各カテゴリーの見出し ＆ その中に入っているアコーディオン -->
        <div class="qanda-category-list">
          <div v-for="(cat, cIdx) in categories" :key="cIdx" class="qanda-category-group">
            <h3 class="qanda-category-title">
              <i class="fa-solid fa-hotel me-2 qanda-title-icon" v-if="cIdx === 0"></i>
              <i class="fa-solid fa-utensils me-2 qanda-title-icon" v-if="cIdx === 1"></i>
              <i class="fa-solid fa-bath me-2 qanda-title-icon" v-if="cIdx === 2"></i>
              {{ cat.name }}
            </h3>

            <div class="qanda-accordion-list">
              <!-- 各カテゴリー内のQ&Aをループ出力 -->
              <div v-for="(item, qIdx) in cat.questions" :key="qIdx" class="qanda-accordion-item"
                :class="{ 'is-open': item.isOpen }">
                <!-- 質問 -->
                <button class="qanda-question-btn" @click="toggleFaq(item)">
                  <span class="qanda-q-icon">Q</span>
                  <span class="qanda-q-text">{{ item.q }}</span>
                  <span class="qanda-toggle-icon"></span>
                </button>

                <!-- 回答 -->
                <div class="qanda-answer-wrapper" :style="getAnswerStyle(item)">
                  <div class="qanda-answer-inner">
                    <span class="qanda-a-icon">A</span>
                    <p class="qanda-a-text">{{ item.a }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- 3. ナビゲーションエリア (最初に戻るボタン) -->
    <section class="qanda-nav-section fade-in-up">
      <div class="qanda-container text-center">
        <!-- トップページに戻るための上品な和風ボタン [1] -->
        <a href="contact.html" class="qanda-btn-back">
          <i class="fa-solid fa-arrow-left me-2"></i>お問い合わせ戻る
        </a>
      </div>
    </section>

  </main>

<?php get_footer();?>
