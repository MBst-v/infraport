<?php
  $equip = $fields['equip'];
?>

<section class="case-equip sect-bg container">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text">Поставляемое<br>Оборудование</span>
    </h2>
  </div>

  <div class="sect-right">
    <div class="equip-slider">
      <div class="equip-list">
        <?php foreach ( $equip as $eq ) :
          $title = $eq['title'];
          $descr = $eq['descr'];
          $img_id   = $eq['image'];
          $img_d = get_post_meta( $img_id );
        ?>

          <div class="equip">
            <picture class="equip__pic lazy">
              <source type="image/webp" srcset="#" data-srcset="<?= $upload_baseurl . $img_d['webp'][0] ?>">
              <img src="#" data-src="<?= $upload_baseurl . $img_d['_wp_attached_file'][0] ?>" alt="<?= $title ?>" class="equip__img">
            </picture>

            <div class="equip__text">
              <h3 class="equip__title"><?= $title ?></h3>
              <p class="equip__descr"><?= $descr ?></p>
            </div>
          </div>

        <?php endforeach ?>
      </div>

      <div class="equip-slider__nav"></div>
    </div>

  </div>
</section>