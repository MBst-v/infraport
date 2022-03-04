<section class="index-partners container sect-bg"<?php echo $sect_id ?>>
  <div class="index-partners__title-block">
    <h2 class="index-partners__title sect-title-5"><span class="sect-title-text"><?php echo $section['title'] ?></span></h2>
    <div class="index-partners__arrows"></div>
  </div>
  <div class="index-partners-list" data-page="1"> <?php
    if ( $section['manual'] ) {
      $partners = $section['partners'];
    } else {
      $partners = get_posts( [
        'post_type' => 'partner',
        'numberposts' => $section['numberposts'],
        'order' => 'ASC'
      ] );
    }
    $partners_on_page = 4;
    $k = 1;
    foreach ( $partners as $partner ) :
      $page_attr = 'data-page="' . ceil( $k / $partners_on_page ) . '"' ?>
      <a href="<?php the_permalink( $partner->ID ) ?>" class="index-partner" <?php echo $page_attr ?>>
        <picture class="index-partner__pic lazy">
          <img src="#" alt="Логоип <?php echo $partner->post_title ?>" class="index-partner__img" data-src="<?php echo get_the_post_thumbnail_url( $partner->ID ) ?>">
        </picture>
      </a> <?php
      $k++;
    endforeach ?>
    <div class="index-partners-list__pagination pagination"> <?php
      for ( $i = 0, $len = ceil( count( $partners ) / $partners_on_page ); $i < $len; $i++ ) :
        $active_class = $i === 0 ? ' active' : '' ?>
        <span class="pagination-number<?php echo $active_class ?>"><?php echo $i + 1 ?></span> <?php
    endfor ?>
    </div>
  </div>
</section>