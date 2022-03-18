<?php
$cases_cats = get_terms([
  'taxonomy' => 'case_category',
]);

$cases = get_posts([
  'post_type' => 'case',
  'numberposts' => -1
]);

$i = 1;

$page_count = ceil(count($cases) / 6);
?>

<section class="cases-list sect container">
  <div class="sect-left">
    <h2 class="sect-title-5"><span class="sect-title-text">направление</span></h2>
  </div>

  <div class="sect-right">
    <p class="sect-title-2"><span class="text-blue">Все</span> направления</p>

    <div class="filter">
      <p class="filter__title">Выберете отрасль</p>

      <div class="filter__inner">
        <div class="filter__curr" data-curr-filter-text="все" data-curr-filter-id="0"></div>

        <div class="filter__list">

          <?php foreach ($cases_cats as $c_cat) : ?>

            <button class="filter__item" data-filter-id="<?= $c_cat->term_id ?>"><?= $c_cat->name ?></button>

          <?php endforeach ?>

          <button class="filter__item active" data-filter-id="0">все</button>
        </div>
      </div>
    </div>

    <div class="cases__list-wrapper">
      <div class="cases__list">
        <?php foreach ($cases as $c) :
          $title = $c->post_title;
          $descr = get_field('descr', $c);
          $img_id = get_post_thumbnail_id($c);
          $img_d = get_post_meta( $img_id );
          $cat = get_the_terms($c, 'case_category')[0];
          $link = get_permalink($c);
          $work_list = get_field('work_list', $c);
          $hide = $i > 6 ? ' hidden' : '';
          $i++;
        ?>
          <a href="<?= $link ?>" class="case<?= $hide ?>" data-cat-id="<?= $cat->term_id ?>">
            <div class="case__pic">
              <picture class="case__img lazy">
                <source type="image/webp" srcset="#" data-srcset="<?= $upload_baseurl . $img_d['webp'][0] ?>">
                <img src="#" data-src="<?= $upload_baseurl . $img_d['_wp_attached_file'][0] ?>" alt="<?= $title ?>">
              </picture>

              <?php if ( count( $work_list ) > 0 ) : ?>
                <ul class="case__list">
                  <?php foreach ( $work_list as $work_item ) : ?>
                    <li class="case__list-item"><?= $work_item['name'] ?></li>
                  <?php endforeach ?>
                </ul>
              <?php endif ?>
            </div>

            <div class="case__text">
              <h3 class="case__title"><?= $title ?></h3>
              <p class="case__learn-more"><span class="text-blue">подробнее</span></p>
            </div>
          </a>

        <?php endforeach ?>
      </div>

      <div class="pagination">
        <?php for ($j = 0; $j < $page_count; $j++) : ?>
          <button class="pagination-number<?= $j === 0 ? ' active' : '' ?>" data-page-num="<?= $j + 1 ?>"><?= $j + 1 ?></button>
        <?php endfor ?>
      </div>
    </div>
  </div>
</section>