<section class="index-competencies container sect"<?php echo $sect_id ?>>
  <h2 class="index-competencies__title sect-title-5"><span class="sect-title-text"><?php echo $section['title'] ?></span></h2>
  <p class="index-competencies__descr"><?php echo $section['descr'] ?></p> <?php

  $service_terms = get_terms( 'service_category', [
    'hide_empty' => false
  ] );

  $services_on_page = 4;

  $i = 0;
  foreach ( $service_terms as $service_term ) {
    $active_class = $i === 0 ? ' active' : '';
    $service_terms_html .= "<button type=\"button\" class=\"index-competencies-tab{$active_class}\">{$service_term->name}</button>";

    $services = get_posts( [
      'post_type' => 'service',
      'numberposts' => -1,
      'order' => 'ASC',
      'tax_query' => [
        [
          'taxonomy' => 'service_category',
          'terms' => $service_term->term_id
        ]
      ]
    ] );
    $services_html .= "<div class=\"index-competencies-block{$active_class}\" data-page=\"1\" data-term=\"{$service_term->name}\">";
    $k = 1;
    foreach ( $services as $service ) {
      $page_attr = 'data-page="' . ceil( $k / $services_on_page ) . '"';
      $service_descr = get_field( 'index_descr', $service->ID );
      $services_html .= "<a href=\"#\" class=\"index-competence\" {$page_attr}><p class=\"index-competence__title\">{$service->post_title}</p>";
      if ( $service_descr ) {
        $services_html .= "<p class=\"index-competence__descr\">{$service_descr}</p>";
      } // endif ( $service_descr )
      $services_html .= '<img src="#" alt="Arrow icon" data-src="' . $images_url . 'icon-service-arrow.svg" class="index-competence__arrow lazy"></a>';
      $k++;
    } // endforeach ( $services as $service )
    $len = ceil( count( $services ) / $services_on_page );
    if ( $len > 1 ) {
      $services_html .= '<div class="index-competencies-pagination pagination">';
      for ( $j = 0; $j < $len; $j++ ) {
        $active_class = $j === 0 ? ' active' : '';
        $services_html .= '<button type="button" class="index-competencies-pagination-number pagination-number' . $active_class . '">' . ($j + 1) . '</button>';
      }
      $services_html .= '</div>';
    }
    $services_html .= '</div>';
    $i++;
  } // endforeach ( $service_terms as $service_term ) ?>
  <div class="sect-left">
    <div class="index-competencies-tabs"> <?php
      echo $service_terms_html ?>
    </div>
  </div>
  <div class="sect-right">
    <div class="index-competencies-wrap"> <?php
      echo $services_html ?>
    </div>
  </div>
</section>