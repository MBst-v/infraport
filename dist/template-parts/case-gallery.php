<?php
  $gallery = $fields['images'];

  if ( count( $gallery ) > 0 ) :
    $max_slides = count( $gallery );
    $counter_text = '';

    if ( $max_slides >= 10 ) {
      $counter_text = $max_slides;
    } else {
      $counter_text = '0' . $max_slides;
    }

  ?>

  <section class="case-gallery sect-bg container">
    <div class="sect-left">
      <p class="sect-title-5">
        <span class="sect-title-text">Фото</span>
      </p>
    </div>

    <div class="sect-right">
      <div class="gallery">
        <div class="gallery__counter">
          <span class="gallery__counter-curr">01</span>
          <span class="gallery__counter-line"></span>
          <?= $counter_text ?>
        </div>
        <div class="gallery__list">
          <?php foreach ( $gallery as $item ) :
            $img_id   = $item['img'];
            $img_d = get_post_meta( $img_id );
          ?>
          <div class="gallery__item">
            <picture class="gallery__item-pic lazy">
              <source type="image/webp" srcset="#" data-srcset="<?= $upload_baseurl . $img_d['webp'][0] ?>">
              <img src="#" data-src="<?= $upload_baseurl . $img_d['_wp_attached_file'][0] ?>" alt="<?= $title ?>" class="gallery__item-img">
            </picture>
          </div>

          <?php endforeach ?>
        </div>
        <div class="gallery__nav"></div>
      </div>
    </div>
  </section>

<?php endif ?>