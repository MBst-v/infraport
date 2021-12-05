<section class="index-competencies container sect"<?php echo $sect_id ?>>
  <h2 class="index-competencies__title sect-title-5"><span class="sect-title-text"><?php echo $section['title'] ?></span></h2>
  <p class="index-competencies__descr"><?php echo $section['descr'] ?></p> <?php

  $service_terms = get_terms( 'service_category', [
    'hide_empty' => false
  ] );

  $i = 0;
  foreach ( $service_terms as $service_term ) {
    $active_class = $i === 0 ? ' active' : '';
    $style = $i === 0 ? ' style="display: block;"' : 'style="display: none;"';
    $service_terms_html .= "<button type=\"button\" class=\"index-competencies-tab{$active_class}\">{$service_term->name}</button>";

    $services = get_posts( [
      'post_type' => 'service',
      'numberposts' => -1,
      'tax_query' => [
        [
          'taxonomy' => 'service_category',
          'terms' => $service_term->term_id
        ]
      ]
    ] );

    $services_html .= "<div class=\"index-competencies-block{$active_class}\"{$style} data-term=\"{$service_term->name}\">";
    foreach ( $services as $service ) {
      $service_descr = get_field( 'index_descr', $service->ID );
      $services_html .= "<div class=\"index-competence\"><p class=\"index-competence__title\">{$service->post_title}</p>";
      if ( $service_descr ) {
        $services_html .= "<p class=\"index-competence__descr\">{$service_descr}</p>";
      } // endif ( $service_descr )
      $services_html .= '<img src="#" alt="Arrow icon" data-src="' . $images_url . 'icon-service-arrow.svg" class="index-competence__arrow lazy"></div>';
    } // endforeach ( $services as $service )
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