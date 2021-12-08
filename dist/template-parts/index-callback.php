<section class="index-callback container sect"<?php echo $sect_id ?>>
  <div class="sect-left">
    <h2 class="index-callback__title sect-title-5"><span class="sect-title-text"><?php echo $section['title'] ?></span></h2>  
  </div>
  <div class="sect-right">
    <p class="index-callback__form-title sect-title-2"><?php echo $section['form_title'] ?></p>
    <p class="index-callback__form-descr"><?php echo $section['form_descr'] ?></p> <?php
    echo do_shortcode( '[contact-form-7 id="' . $section['form'] . '" html_class="index-callback-form" html_id="index-callback-form"]' ) ?>
    <div class="index-callback__thanks thanks">
      <p class="index-callback__thanks-title sect-title-2 thanks__title"><span class="text-blue">Спасибо!</span> Ваша заявка принята</p> 
      <p class="index-callback__thanks-descr thanks__descr">Мы свяжемся с вами в течение дня</p>
    </div>
    <div class="index-callback__error error">
      <p class="index-callback__error-title sect-title-2 error__title"><span class="text-red">Ошибка</span> Что-то пошло не так</p> 
      <p class="index-callback__error-descr error__descr">Попробуйте перезагрузить страницу</p>
    </div>
  </div>
</section>