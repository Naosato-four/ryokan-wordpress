<?php

/*
Template Name: 客室詳細ページ
*/

get_header();
?>

<main id="room-detail-app" class="room-detail-main">

    <header class="room-detail-hero">
      <div class="room-detail-hero-inner">
        <img :src="roomInfo.heroImage" :alt="'銅山温泉 旅館 琥珀 客室 ' + roomInfo.roomName" class="bg-gara">
      </div>
    </header>

    <section class="room-detail-intro-section fade-in-up" aria-labelledby="intro-heading">
      <div class="ryokan-container">
        <div class="row g-5 align-items-center">

          <div class="col-lg-7 col-md-6">
            <div class="room-detail-slider-container">
              <div class="room-detail-slider-wrapper">
                <figure v-for="(img, idx) in roomImages" :key="idx" class="room-detail-slider-slide"
                  :class="{ 'active': currentImageIndex === idx }">
                  <div class="room-detail-slider-image-placeholder">
                    <img :src="img.src" :alt="img.alt" class="room-detail-slider-img">
                  </div>
                </figure>
              </div>

              <button class="room-detail-slider-nav prev" @click="prevImage" aria-label="前の画像">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <button class="room-detail-slider-nav next" @click="nextImage" aria-label="次の画像">
                <i class="fa-solid fa-chevron-right"></i>
              </button>

              <nav class="room-detail-slider-dots" aria-label="画像ナビゲーション">
                <span v-for="(img, idx) in roomImages" :key="idx" class="room-detail-slider-dot"
                  :class="{ 'active': currentImageIndex === idx }" @click="setCurrentImage(idx)"></span>
              </nav>
            </div>
          </div>

          <div class="col-lg-5 col-md-6">
            <article class="room-detail-text-card">
              <header class="room-detail-card-header">
                <span class="room-detail-room-type">{{ roomInfo.roomType }}</span>
                <h2 id="intro-heading" class="room-detail-room-name">
                  {{ roomInfo.roomName }} <span class="room-detail-room-kana">{{ roomInfo.roomKana }}</span>
                </h2>
              </header>

              <blockquote class="room-detail-concept-box">
                <p class="room-detail-concept-text" v-html="roomInfo.conceptText"></p>
              </blockquote>

              <ul class="room-detail-specs">
                <li><span class="room-detail-spec-label">間取り</span> {{ roomInfo.layout }}</li>
                <li><span class="room-detail-spec-label">定員</span> {{ roomInfo.capacity }}</li>
              </ul>

              <footer class="room-detail-btn-wrap">
                <a :href="'/yoyaku/?room=' + roomInfo.roomName" class="room-detail-btn-reserve">
                  このお部屋を予約する
                </a>
              </footer>
            </article>
          </div>

        </div>
      </div>
    </section>

    <section class="room-detail-specs-section fade-in-up" aria-labelledby="specs-heading">
      <div class="ryokan-container">
        <h2 id="specs-heading" class="visually-hidden">客室スペック詳細</h2>
        <div class="row g-5">

          <div class="col-lg-6">
            <figure class="room-detail-floorplan-img-wrap">
              <img :src="roomInfo.floorPlan" :alt="roomInfo.roomName + ' 間取り図'" class="img-fluid">
            </figure>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-between">
            <article class="room-detail-info-card">
              <h3 class="room-detail-info-title">基本情報</h3>

              <section class="room-detail-info-group">
                <h4 class="room-detail-info-label">時間区分</h4>
                <table class="table table-borderless room-detail-info-table">
                  <tr>
                    <th class="check-in ps-4">チェックイン</th>
                    <td>15:00 〜 18:00</td>
                  </tr>
                  <tr>
                    <th class="check-out ps-4">チェックアウト</th>
                    <td>〜 11:00</td>
                  </tr>
                </table>
              </section>

              <section class="room-detail-info-group">
                <h4 class="room-detail-info-label">無料特典・サービス</h4>
                <ul class="room-detail-free-services">
                  <li v-for="(service, idx) in freeServices" :key="idx">
                    <i class="fa-solid fa-circle-check room-detail-service-icon"></i>
                    {{ service }}
                  </li>
                </ul>
              </section>
            </article>
          </div>

        </div>
      </div>
    </section>

    <section class="room-detail-amenity-section fade-in-up" aria-labelledby="amenity-heading">
      <div class="ryokan-container">

        <header class="room-detail-amenity-header text-center">
          <h3 id="amenity-heading" class="room-detail-amenity-title">客室備品・アメニティ</h3>
          <p class="room-detail-amenity-intro-text">
            旅人の心を優しく解き放つ、吟味された道具たち。<br>
            お部屋で過ごす一分一秒が極上の寛ぎとなるよう<br>
            細部までこだわり抜いた備品をご用意いたしました。
          </p>
        </header>

        <div class="room-detail-amenity-grid mt-5">
          <div class="row g-4">
            <div v-for="(item, idx) in amenities" :key="idx" class="col-md-6 col-lg-4">
              <article class="room-detail-amenity-card">
                <header class="room-detail-amenity-card-header">
                  <span class="room-detail-amenity-icon-wrap">
                    <i :class="item.icon"></i>
                  </span>
                  <h4 class="room-detail-amenity-item-name">{{ item.name }}</h4>
                </header>
                <p class="room-detail-amenity-item-desc">{{ item.description }}</p>
              </article>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="room-detail-other-section fade-in-up" aria-labelledby="other-heading">
      <div class="ryokan-container">
        <header class="room-detail-other-header">
          <h3 id="other-heading" class="room-detail-other-title">他のお部屋のご案内</h3>
        </header>

        <nav class="row g-4 justify-content-center" aria-label="他の客室ナビゲーション">
          
          <article v-for="room in otherRooms" :key="room.id" class="col-md-4 col-6">
            <a :href="room.url" class="room-detail-other-card">
              
              <figure class="room-detail-other-image-box">
                <img :src="room.src" :alt="room.name" class="room-detail-other-img">
              </figure>
              
              <div class="room-detail-other-info">
                <h4 class="room-detail-other-room-name">
                  {{ room.name }} <span class="room-detail-other-room-kana">({{ room.kana }})</span>
                </h4>
                <span class="room-detail-other-link-text">詳細を見る <i class="fa-solid fa-angle-right ms-1"></i></span>
              </div>

            </a>
          </article>

        </nav>
      </div>
    </section>

  </main>

  <?php get_footer();?>
