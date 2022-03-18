<?php
  $file_descr = $fields['file_descr'];
  $file = $fields['file'];
?>

<section class="partner-catalog sect-bg container lazy" data-src="#">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text">Каталог<br>оборудования</span>
    </h2>
  </div>

  <div class="sect-right">
    <p class="partner-catalog__text"><?= $file_descr ?></p>
    <a href="<?= $file ?>" target="_blank" class="partner-catalog__file btn btn-blue" download>Скачать каталог</a>
  </div>
</section>