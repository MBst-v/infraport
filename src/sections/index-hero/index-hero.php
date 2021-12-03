<section class="index-hero"<?php echo $sect_id ?>>
  <picture class="index-hero__pic">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.1280.webp, <?php echo $images_url ?>index-hero.1280@2x.webp 2x" media="(min-width:1279.98px)">
    <source type="image/jpeg" srcset="<?php echo $images_url ?>index-hero.1280.jpg, <?php echo $images_url ?>index-hero.1280@2x.jpg 2x" media="(min-width:1279.98px)">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.1024.webp, <?php echo $images_url ?>index-hero.1024@2x.webp 2x" media="(min-width:1023.98px)">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.1024.jpg, <?php echo $images_url ?>index-hero.1024@2x.jpg 2x" media="(min-width:1023.98px)">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.768.webp, <?php echo $images_url ?>index-hero.768@2x.webp 2x" media="(min-width:767.98px)">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.768.jpg, <?php echo $images_url ?>index-hero.768@2x.jpg 2x" media="(min-width:767.98px)">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.576.webp, <?php echo $images_url ?>index-hero.576@2x.webp 2x" media="(min-width:375.98px)">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.576.jpg, <?php echo $images_url ?>index-hero.576@2x.jpg 2x" media="(min-width:375.98px)">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.375.webp, <?php echo $images_url ?>index-hero.375@2x.webp 2x">
    <source type="image/webp" srcset="<?php echo $images_url ?>index-hero.375.jpg, <?php echo $images_url ?>index-hero.375@2x.jpg 2x">
    <img src="<?php echo $images_url ?>index-hero.375@2x.jpg" alt="infraport" class="index-hero__img">
  </picture>
  <h1 class="index-hero__title"><?php echo $section['title'] ?></h1>
  <p class="index-hero__descr"><?php echo $section['descr'] ?></p>
  <button type="button" class="index-hero__btn btn btn-blue" data-scroll-target="#">Заказать расчет</button>
</section>