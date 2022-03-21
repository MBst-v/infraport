<?php
  $fields = get_fields( $post );

  $title =
    $fields['main_title'] !== ''
    ? $fields['main_title']
    : $post->post_title;

  $descr = $fields['descr'];

  $img_id = $fields['main_img'];
  $img_d = get_post_meta( $img_id );
?>

<section class="case-hero sect-bg container">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text text-blue">
        <a href="<?= get_permalink(502) ?>" class="case-hero__all">все кейсы</a>
      </span>
    </h2>
  </div>

  <div class="sect-right">
    <h1 class="sect-title-2"><?= $title ?></h1>
    <p class="case-hero__descr"><?= $descr ?></p>
  </div>

  <picture class="case-hero__pic lazy">
    <source type="image/webp" srcset="#" data-srcset="<?= $upload_baseurl . $img_d['webp'][0] ?>">
    <img src="#" data-src="<?= $upload_baseurl . $img_d['_wp_attached_file'][0] ?>" alt="<?= $post->post_title ?>" class="case-hero__img">
  </picture>
</section>