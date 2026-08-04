<?php get_header(); ?>

<div id="top-page">
<!-- メインビジュアル領域 -->
    <section class="ryokan-hero">
      <div class="hero-slideshow">
        <div class="slide slide1"></div>
        <div class="slide slide2"></div>
        <div class="slide slide3"></div>
      </div>

      <div class="ryokan-hero-inner">
        <h1 class="ryokan-hero-title-main">
          <ruby>刻<rt>とき</rt></ruby>を忘れる<br>
          銅山温泉旅館 <ruby>琥珀<rt>こはく</rt></ruby>
        </h1>
      </div>
    </section>

<!-- コンセプト紹介領域 -->
<section class="ryokan-concept fade-in-up">
  <div class="ryokan-container">
    <div class="ryokan-concept-text">
      <p>
        ようこそ、銅山温泉の佳境へ。<br />ここは、大人のための「隠れ家」です。
      </p>
      <p>
        創業当時から変わらぬ、木造建築の温もりと川のせせらぎ。<br />
        喧騒を忘れ、ただ、移ろう季節を愛でる。<br />
        私たちが提供するのは、一生の記憶に残る「静かな感動」です。
      </p>
    </div>
  </div>
</section>

<section class="ryokan-features">

  <!-- お部屋 -->
  <div class="ryokan-feature-item fade-in-up" id="rooms">
    <div class="ryokan-container">
      <a href="<?php echo esc_url(home_url('/room/')); ?>" class="ryokan-feature-link">
        <div class="ryokan-feature-card">
          <h2 class="ryokan-feature-title">お部屋</h2>
        </div>
      </a>
    </div>
  </div>

  <!-- 温泉 -->
  <div class="ryokan-feature-item fade-in-up" id="onsen">
    <div class="ryokan-container">
      <a href="<?php echo esc_url(home_url('/onsen/')); ?>" class="ryokan-feature-link">
        <div class="ryokan-feature-card">
          <h2 class="ryokan-feature-title">温泉</h2>
        </div>
      </a>
    </div>
  </div>

  <!-- お食事 -->
  <div class="ryokan-feature-item fade-in-up" id="dining">
    <div class="ryokan-container">
      <a href="<?php echo esc_url(home_url('/food/')); ?>" class="ryokan-feature-link">
        <div class="ryokan-feature-card">
          <h2 class="ryokan-feature-title">お食事</h2>
        </div>
      </a>
    </div>
  </div>

</section>

<!-- お知らせ領域 -->
<section class="ryokan-news fade-in-up" id="news">
  <div class="ryokan-container">

    <h2 class="ryokan-news-title">お知らせ</h2>

    <?php
    $query = new WP_Query(array(
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'post_status'    => 'publish'
    ));
?>

    <ul class="ryokan-news-list">
      <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>

          <li class="ryokan-news-item">
            <span class="ryokan-news-marker">・</span>
            <a href="<?php the_permalink(); ?>" class="ryokan-news-text">
              <?php echo get_the_date('Y.m.d'); ?>
              <?php the_title(); ?>
            </a>
          </li>

        <?php endwhile; ?>
      <?php else : ?>

        <li class="ryokan-news-item">
          お知らせはありません。
        </li>

      <?php endif; ?>

      <?php wp_reset_postdata(); ?>
    </ul>

    <div class="ryokan-news-more">
      <a href="<?php echo esc_url(home_url('/news/')); ?>" class="ryokan-news-link">
        一覧を見る
        <i class="fa-solid fa-chevron-right"></i>
      </a>
    </div>

  </div>
</section>

</div>
<?php get_footer(); ?>