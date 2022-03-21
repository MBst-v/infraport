<?php
  $cases = $fields['cases'];
?>
<section class="partner-cases container"<?php echo $sect_id ?>>
  <div class="partner-cases__title-block">
    <h2 class="partner-cases__title sect-title-5"><span class="sect-title-text">ОБЪЕКТЫ</span></h2>
    <div class="partner-cases__arrows"></div>
  </div>
  <div class="partner-cases-list">
    <?php foreach ( $cases as $case ) : ?>

      <a href="<?php the_permalink( $case->ID ) ?>" class="partner-case">
        <picture class="partner-case__pic lazy">
          <img src="#" alt="<?php echo $case->post_title ?>" class="partner-case__img" data-src="<?php echo get_the_post_thumbnail_url( $case->ID ) ?>">
        </picture>
        <span class="partner-case__title"><?php echo $case->post_title ?></span>
      </a>

    <?php endforeach ?>
    <div class="partner-cases-list__nav"></div>
  </div>
</section>