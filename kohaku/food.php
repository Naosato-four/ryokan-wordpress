<?php
/*
Template Name: お食事ページ
*/

get_header();
?>
<script>
const themePath = "<?php echo get_template_directory_uri(); ?>";
</script>

<div id="food-app">

<main class="food-main-content">

    <!-- お食事 ヒーローエリア -->
    <section class="food-hero">
      <div class="food-hero-inner">
        <h1 class="food-hero-title">お食事</h1>
      </div>
    </section>

    <!-- コンセプトメッセージ領域 -->
    <section class="food-concept fade-in-up">
      <div class="ryokan-container">
        <div class="food-concept-text">
          <p>地元の豊かな恵み、四季折々の新鮮な美味。<br>
            当館が最もこだわり、誇りを持つのが、真心を込めたお料理です。</p>
          <p>一皿一皿に美しく表現された季節の移ろい、五感で味わう至福のひとときをご堪能ください。<br>
            歴史に磨かれた技と、温かなおもてなしの心でお迎えいたします。</p>
        </div>
      </div>
    </section>

    <!-- 料亭案内セクション -->
    <section class="food-ryotei-section food-container fade-in-up">
      <div class="row g-0 food-ryotei-inner shadow-lg">

        <!-- 左側：お食事処の空間写真（ローテーション版） -->
        <div class="col-md-6">
          <div class="food-ryotei-img-box">
            <!-- 各画像をループで回し、現在のインデックスの画像だけ visible クラスを付与 -->
            <img v-for="(img, index) in ryoteiImages" :key="index" :src="img" alt="御食事処 弥武景 庵 内観"
              :class="{ 'visible': index === currentRyoteiIndex }">
          </div>
        </div>

        <div class="col-md-6">
          <div class="food-ryotei-text-box">
            <span class="food-ryotei-subtitle">御 食 事 処</span>
            <h2 class="food-ryotei-title">弥武景 庵<span class="food-ryotei-title-kana">（やんけあん）</span></h2>

            <p class="food-ryotei-desc">
              四季折々の美しい景観を望む、洗練された大人のためのモダン空間。<br>
              職人の技を目の前で愉しむ鉄板焼き、または繊細な日本料理にて、<br>琥珀自慢の味わいをご堪能いただけます。ご夕食、ご朝食ともにこちらのお食事処にてご提供いたします。
            </p>

            <div class="food-time-info-table">
              <div class="food-time-row">
                <div class="food-time-label">朝食</div>
                <div class="food-time-value">
                  8:00 〜 10:00 <span class="food-time-note">（最終開始時刻）</span>
                </div>
              </div>
              <div class="food-time-row">
                <div class="food-time-label">夕食</div>
                <div class="food-time-value">
                  18:00 〜 20:30 <span class="food-time-note">（最終開始時刻）</span><br>
                </div>
              </div>
            </div>

            <p class="food-ryotei-alert">※アレルギーや苦手な食材などはご予約時にお申し付けください。</p>
          </div>
        </div>

      </div>
    </section>

    <!-- 朝食 ＆ 夕食セクション（写真と説明欄のあるデザイン） -->
    <section class="food-menu-section mb-4">
      <div class="container shadow-lg p-0">

        <div class="row g-0 align-items-stretch food-split-row">

          <div class="col-12 col-md-6 food-text-col order-2 order-md-1 d-flex flex-column justify-content-center">
            <transition name="food-fade" mode="out-in">
              <div class="food-vertical-wrapper" :key="currentBreakfastIndex">
                <h3 class="food-menu-sub-title">{{ breakfastSlides[currentBreakfastIndex].subTitle }}</h3>
                <div class="food-menu-vertical-desc">
                  <h2 class="food-menu-main-title">朝食</h2>
                  <p v-html="breakfastSlides[currentBreakfastIndex].desc"></p>
                </div>
              </div>
            </transition>
          </div>

          <div class="col-12 col-md-6 food-img-col order-1 order-md-2">
            <div class="food-split-img-box">
              <transition name="food-fade" mode="out-in">
                <img :src="breakfastSlides[currentBreakfastIndex].img" alt="朝食" :key="currentBreakfastIndex">
              </transition>
            </div>
          </div>

        </div>

        <div class="row g-0 align-items-stretch food-split-row">

          <div class="col-12 col-md-6 food-img-col">
            <div class="food-split-img-box">
              <transition name="food-fade" mode="out-in">
                <img :src="dinnerSlides[currentDinnerIndex].img" alt="夕食" :key="currentDinnerIndex">
              </transition>
            </div>
          </div>

          <div class="col-12 col-md-6 food-text-col d-flex flex-column justify-content-center">
            <transition name="food-fade" mode="out-in">
              <div class="food-vertical-wrapper" :key="currentDinnerIndex">
                <h3 class="food-menu-sub-title">{{ dinnerSlides[currentDinnerIndex].subTitle }}</h3>
                <div class="food-menu-vertical-desc">
                  <h2 class="food-menu-main-title">夕食</h2>
                  <p v-html="dinnerSlides[currentDinnerIndex].desc"></p>
                </div>
              </div>
            </transition>
          </div>

        </div>

      </div>
    </section>

    <!-- 地酒紹介 -->

    <section class="food-drink-section food-container fade-in-up">
      <div class="text-center food-drink-header">
        <span class="food-drink-subtitle">銘 酒 撰</span>
        <h2 class="food-drink-title">料理を引き立てる至高の銘酒</h2>
        <p class="food-drink-lead">
          総料理長・翁義 磨満が選び抜いた地酒や、一皿一皿の味わいを極限まで高める至高の銘酒。<br>
          「弥武景 庵」でのひとときを、さらに深く贅沢に彩ります。
        </p>
      </div>

      <div class="row g-0">

        <div class="col-md-6">
          <div class="food-drink-card">
            <div class="food-drink-card-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sake1.png" alt="琥珀">
            </div>
            <div class="food-drink-card-body">
              <h3>"琥珀" 時を味わう一献。</h3>
              <p>
                山々の清らかな水と厳選した米を用い、丹念に仕込んだ日本酒です。<br>
                純米吟醸酒は、華やかで上品な香りと、なめらかな口当たりが特徴。<br>
                やさしい甘みと澄んだ余韻が、旬の料理をより一層引き立てます。<br>
                特別純米酒は、米本来の豊かな旨味と穏やかな香りが調和した、落ち着きのある味わい。<br>
                冷やしても燗でも楽しめ、食卓に寄り添う一杯です。<br>
                琥珀の名のように、ゆっくりと積み重ねた時の恵みを感じながら、<br>心ほどけるひとときをお楽しみください。
              </p>
              <span class="food-drink-price">グラス 1,200円（税込）〜</span>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="food-drink-card">
            <div class="food-drink-card-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sake2.png" alt="蜻野">
            </div>
            <div class="food-drink-card-body">
              <h3>"蜻野" 冴え渡る辛さ、静かに酔い深まる。</h3>
              <p>
                研ぎ澄まされた切れ味と、米の旨みを大切に仕上げた超辛口純米酒です。<br>
                口に含めば、凛とした辛さがすっと広がり、後味は驚くほど澄みやか。<br>
                重たさを残さず、次の一杯へと自然に誘います。<br>
                焼き魚や刺身はもちろん、揚げ物や煮物とも調和し、<br>
                料理の味わいを引き立てる食中酒としても最適です。
                静かな夜にじっくり味わうひとときにも、語らいの席にも寄り添う一本。<br>
                蜻野は、飾らない力強さと澄んだ余韻をお届けします。
              </p>
              <span class="food-drink-price">グラス 1,400円（税込）〜</span>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- 料理長紹介・挨拶セクション（写真と挨拶文章が書けるデザイン） -->
    <section class="food-chef-section fade-in-up mt-5">
      <div class="food-container">
        <div class="food-chef-inner shadow-lg">
          <div class="row g-0 align-items-center">

            <!-- 左側：料理長写真エリア -->
            <div class="col-lg-5 col-md-6">
              <div class="food-chef-image-box">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ogimamaryourityou.png" class="img-fluid" alt="料理長">
              </div>
            </div>

            <!-- 右側：あいさつ文章エリア -->
            <div class="col-lg-7 col-md-6">
              <div class="food-chef-text-box">
                <span class="food-chef-subtitle">料理長紹介・挨拶</span>
                <h3 class="food-chef-title">素材との対話から生まれる、一期一会の料理</h3>
                <div class="food-chef-desc">
                  <p class="mb-3">
                    当館では、その日に届く最も新鮮で力強い食材を厳選し、<br>その個性を最大限に生かすことを心がけております。<br>料理っていうのはね、自然がもたらす恵みとお客様を繋ぐ架け橋なのよ。
                  </p>
                  <p class="mb-4">
                    私たちの一皿に注ぐ情熱が、皆様の旅の美しい思い出の一部となることを願い、日々包丁を握っております。温かなおもてなしと心づくしの味わいを、どうぞ心ゆくまでお召し上がりください。</p>
                  <p class="food-chef-name text-end">銅山温泉 旅館 琥珀 総料理長 翁義 磨満</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

  </main>

</div>

<?php get_footer(); ?>