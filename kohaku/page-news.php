<?php
/*
Template Name: お知らせ一覧
*/

get_header();
?>

<main class="news-page-wrapper">

  <!-- メインビジュアル / タイトルエリア -->
  <section class="news-page-hero">
    <div class="container text-center">
      <h1 class="news-page-main-title">お知らせ</h1>
      <p class="news-page-sub-title">Information</p>
    </div>
  </section>

  <!-- お知らせコンテンツ -->
  <section class="news-page-content py-5">
    <div class="ryokan-container">
      <div class="row justify-content-center">
        <div class="col-lg-10">

<?php
$paged = max(1, get_query_var('paged'));

$query = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 10,
    'paged'          => $paged,
    'post_status'    => 'publish'
));
?>

<?php if ($query->have_posts()) : ?>

    <?php while ($query->have_posts()) : $query->the_post(); ?>

      <div class="news-page-item">

        <div class="news-page-item-header">

          <span class="news-page-date">
            <?php echo get_the_date('Y.m.d'); ?>
          </span>

          <?php
          $categories = get_the_category();
        if (!empty($categories)) :
            ?>
            <span class="news-page-category">
              <?php echo esc_html($categories[0]->name); ?>
            </span>
          <?php endif; ?>

        </div>

        <h2 class="news-page-item-title">
          <?php the_title(); ?>
        </h2>

        <div class="news-page-item-body">
          <?php the_content(); ?>
        </div>

<?php if (has_post_thumbnail()) : ?>

        <div class="news-page-item-image text-center mt-4">
          <?php the_post_thumbnail('large', array(
                'class' => 'img-fluid'
            )); ?>
        </div>

<?php endif; ?>

        <hr class="news-page-divider">

      </div>

    <?php endwhile; ?>

<?php else : ?>

<p class="text-center">
現在お知らせはありません。
</p>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>