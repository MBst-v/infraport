<?php
  $partners = get_posts([
    'post_type' => 'partner',
    'numberposts' => -1
  ]);
?>

<section class="comp-catalogs sect-bg container">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text">Каталог<br>оборудования</span>
    </h2>
  </div>

  <div class="sect-right">
    <div class="comp-catalogs__block">
      <p class="comp-catalogs__title"><span class="text-blue">Скачайте и изучите</span> подробную информацию продукции в каталогах:</p>

      <div class="catalog-slider__nav"></div>
    </div>

    <div class="catalog-slider">
      <div class="catalogs">
        <?php foreach ( $partners as $p ) :
          $img = get_the_post_thumbnail_url( $p );
          $file = get_field( 'file', $p );
        ?>
          <div class="catalog">
            <a href="<?= $file ?>" class="catalog__link" download="true">
              <img src="#" data-src="<?= $img ?>" alt="<?= $p->post_title ?>" class="catalog__img lazy">
              <span class="catalog__dl-icon">
                <svg width="42" height="39" viewBox="0 0 42 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.0893 21H23.9107L21 24.7424L18.0893 21Z" fill="white" stroke="white" stroke-width="4"/>
                  <path d="M21 0V19" stroke="white" stroke-width="4"/>
                  <path d="M2 27V36C2 36.5523 2.44772 37 3 37H39C39.5523 37 40 36.5523 40 36V27" stroke="white" stroke-width="4" stroke-linecap="round"/>
                </svg>
              </span>
            </a>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>