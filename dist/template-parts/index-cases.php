<section class="index-cases container sect-bg"<?php echo $sect_id ?>>
  <div class="index-cases__title-block">
    <h2 class="index-cases__title sect-title-5"><span class="sect-title-text"><?php echo $section['title'] ?></span></h2>
    <div class="index-cases__arrows"></div>
  </div>
  <div class="index-cases-list"> <?php
    if ( $section['manual'] ) {
      $cases = $section['cases'];
    } else {
      $cases = get_posts( [
        'post_type' => 'case',
        'numberposts' => $section['numberposts']
      ] );
    }
    $cases = array_merge( $cases, $cases, $cases, $cases );
    foreach ( $cases as $case ) : ?>
      <a href="<?php the_permalink( $case->ID ) ?>" class="index-case">
        <picture class="index-case__pic lazy">
          <img src="#" alt="<?php echo $case->post_title ?>" class="index-case__img" data-src="<?php echo get_the_post_thumbnail_url( $case->ID ) ?>">
        </picture>
        <span class="index-case__title"><?php echo $case->post_title ?></span>
      </a> <?php
    endforeach ?>
    <div class="index-cases-list__nav"></div>
  </div>
</section>