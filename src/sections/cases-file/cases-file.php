<?php
  $file = $section['file'];
  $descr = $section['descr'];
?>

<section class="cases-file sect-bg container lazy" data-src="#">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text">Каталог<br>оборудования</span>
    </h2>
  </div>

  <div class="sect-right">
    <p class="cases-file__text"><?= $descr ?></p>
    <a href="<?= $file ?>" target="_blank" class="cases-file__file btn btn-blue" download>Скачать каталог</a>
  </div>
</section>