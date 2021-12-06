<section class="index-callback container sect"<?php echo $sect_id ?>>
  <div class="sect-left">
    <h2 class="index-callback__title sect-title-5"><span class="sect-title-text"><?php echo $section['title'] ?></span></h2>  
  </div>
  <div class="sect-right">
    <p class="index-callback__form-title sect-title-2"><?php echo $section['form_title'] ?></p>
    <p class="index-callback__form-descr"><?php echo $section['form_descr'] ?></p> <?php
    echo do_shortcode( '[contact-form-7 id="' . $section['form'] . '" html_class="index-callback-form" html_id="index-callback-form"]' ) ?>
  </div>
</section>