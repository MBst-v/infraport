<?php
  $fields = get_fields( $post );
  $img = $fields['image'];
?>

<section class="partner-hero sect-bg container">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text text-blue">
        <a href="<?= get_permalink(444) ?>" class="partner-hero__all">все партнеры</a>
      </span>
    </h2>
  </div>

  <div class="sect-right">
    <h1 class="sect-title-2"><?= $post->post_title ?></h1>
    <p class="partner-hero__descr"><?= $fields['descr'] ?></p>
  </div>
</section>

<section class="partner-descr sect container">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text">О партнере</span>
    </h2>
  </div>

  <div class="sect-right">
    <?php if ( $img ) :
      $img_data = get_post_meta( $img['ID'] );
    ?>

      <picture class="partner-descr__pic lazy">
       <source type="image/webp" srcset="#" data-srcset="<?= $upload_baseurl . $img_data['webp'][0] ?>">
       <img src="#" data-src="<?= $upload_baseurl . $img_data['_wp_attached_file'][0] ?>" alt="<?= $post->post_title ?>" class="partner-descr__img">
      </picture>

    <?php endif ?>

    <h2 class="partner-descr__title"><?= $fields['title'] ?></h2>
    <p class="partner-descr__text"><?= $fields['text'] ?></p>
  </div>
</section>