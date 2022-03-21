<?php
$services = get_posts([
  'post_type' => 'service',
  'numberposts' => -1,
]);

$serv_cats = get_terms([
  'taxonomy' => 'service_category',
]);
?>

<section class="competencies sect">
  <div class="filter container">
    <p class="filter__title">Выберите направление</p>

    <div class="filter__inner">
      <div class="filter__curr" data-curr-filter-text="все" data-curr-filter-id="0"></div>

      <div class="filter__list">

        <?php foreach ( $serv_cats as $s_cat ) : ?>

          <button class="filter__item" data-filter-id="<?= $s_cat->term_id ?>"><?= $s_cat->name ?></button>

        <?php endforeach ?>

        <button class="filter__item active" data-filter-id="0">Все</button>
      </div>
    </div>
  </div>

  <ul class="services">
    <?php foreach ( $services as $serv) :
      $title = $serv->post_title;
      $descr = get_field( 'descr', $serv );
      $cat = get_the_terms( $serv, 'service_category')[0];
      $img_id = get_post_thumbnail_id( $serv );
      $img_d = get_post_meta( $img_id );
      $partner = get_field( 'partner', $serv );
      $partner_link = get_permalink( $partner );
      $partner_img = get_the_post_thumbnail_url( $partner );
    ?>
      <li id="<?= $serv->ID ?>" class="service container sect" data-cat-id="<?= $cat->term_id ?>">
        <picture class="service__pic lazy">
          <source type="image/webp" srcset="#" data-srcset="<?= $upload_baseurl . $img_d['webp'][0] ?>">
          <img src="#" data-src="<?= $upload_baseurl . $img_d['_wp_attached_file'][0] ?>" alt="<?= $title ?>" class="service__img" decoding="async">
        </picture>

        <div class="service__descr">
          <h3 class="service__title"><?= $title ?></h3>
          <p class="service__text"><?= $descr ?></p>

          <a href="<?= $partner_link ?>" class="service__partner">
            <img src="<?= $partner_img ?>" alt="<?= $partner->post_title ?>" class="service__partner-img">
            <p class="service__partner-text">Основной партнер — <span class=""><?= $partner->post_title ?></span></p>
          </a>
        </div>

      </li>
    <?php endforeach ?>
  </ul>
</section>