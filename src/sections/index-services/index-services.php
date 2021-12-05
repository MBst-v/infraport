<section class="index-services container sect"<?php echo $sect_id ?>>
  <div class="sect-left">
    <h2 class="index-services__title sect-title-5"><span class="sect-title-text"><?php echo $section['title'] ?></span></h2>  
  </div>
  <div class="sect-right">
    <ol class="index-services-list"> <?php
      foreach ( $section['services'] as $service ) : ?>
        <li class="index-services-list__item"><?php echo $service['text'] ?></li> <?php
      endforeach ?>
    </ol>
  </div>
</section>