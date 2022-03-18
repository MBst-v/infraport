<?php
$partners_cats = get_terms([
  'taxonomy' => 'partner_category',
]);

$partners = get_posts([
  'post_type' => 'partner',
  'numberposts' => -1
]);

$i = 1;

$page_count = ceil( count( $partners ) / 6 );
?>

<section class="partners-list sect container">
  <div class="sect-left">
    <h2 class="sect-title-5"><span class="sect-title-text">направление</span></h2>
  </div>

  <div class="sect-right">
    <p class="sect-title-2"><span class="text-blue">Все</span> направления</p>

    <div class="filter">
      <p class="filter__title">Выберите отрасль</p>

      <div class="filter__inner">
        <div class="filter__curr" data-curr-filter-text="все" data-curr-filter-id="0"></div>

        <div class="filter__list">

          <?php foreach ( $partners_cats as $p_cat ) : ?>

            <button class="filter__item" data-filter-id="<?= $p_cat->term_id ?>"><?= $p_cat->name ?></button>

          <?php endforeach ?>

          <button class="filter__item active" data-filter-id="0">все</button>
        </div>
      </div>
    </div>

    <div class="partners__list-wrapper">
      <div class="partners__list">
        <?php foreach ( $partners as $p ) :
            $descr = get_field( 'descr', $p );
            $img = get_the_post_thumbnail_url( $p );
            $cat = get_the_terms( $p, 'partner_category')[0];
            $link = get_permalink( $p );
            $hide = $i > 6 ? ' hidden' : '';
            $i++;
          ?>
          <a href="<?= $link ?>" class="partner<?= $hide ?>" data-cat-id="<?= $cat->term_id ?>">
            <img src="<?= $img ?>" alt="<?php $p->post_title ?>" class="partner__img">
            <p class="partner__descr"><?= $descr ?></p>
          </a>
        <?php endforeach ?>
      </div>

      <div class="pagination">
        <?php for ($j = 0; $j < $page_count; $j++) : ?>
          <button
            class="pagination-number<?= $j === 0 ? ' active' : '' ?>"
            data-page-num="<?= $j + 1 ?>"
          ><?= $j + 1 ?></button>
        <?php endfor ?>
      </div>
    </div>
  </div>
</section>