<?php
  $list = $section['list'];
?>

<section class="about-employees sect container">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text">Наши<br>сотрудники</span>
    </h2>
  </div>

  <div class="sect-right">
    <ul class="employees">
      <?php foreach ( $list as $emp ) :
        $name = $emp['name'];
        $descr = $emp['descr'];
        $email = $emp['email'];

        $img_id = $emp['img'];
        $img_d = get_post_meta( $img_id );
      ?>
        <li class="worker">
          <picture class="worker__pic lazy">
            <source type="image/webp" srcset="#" data-srcset="<?= $upload_baseurl . $img_d['webp'][0] ?>">
            <img src="#" data-src="<?= $upload_baseurl . $img_d['_wp_attached_file'][0] ?>" alt="<?= $post->post_title ?>" class="worker__img">
          </picture>
          <div class="worker__text">
            <h3 class="worker__name"><?= $name ?></h3>
            <p class="worker__descr"><?= $descr ?></p>
            <a href="mailto:<?= $email ?>" class="worker__email"><?= $email ?></a>
          </div>
        </li>
      <?php  endforeach ?>
    </ul>
  </div>
</section>