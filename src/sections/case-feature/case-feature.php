<?php
  $feature = $fields['feature'];

  if ( $feature !== '' ) : ?>

  <section class="case-feature sect container">
    <div class="sect-left">
      <p class="sect-title-5">
        <span class="sect-title-text">Необычный<br>аспект</span>
      </p>
    </div>

    <div class="sect-right">
      <h2 class="sect-title-2"><span class="text-blue">Особенность</span><br>проекта</h2>
      <p class="case-feature__descr"><?= $feature ?></p>
    </div>
  </section>

<?php endif ?>