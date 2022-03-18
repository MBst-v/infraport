<?php
  $descr = $section['descr'];
  $list = $section['list'];
?>

<section class="about-mission sect-bg container">
  <div class="sect-left">
    <p class="sect-title-5">
      <span class="sect-title-text">Наша миссия</span>
    </p>
  </div>

  <div class="sect-right">
    <p class="about-mission__descr"><?= $descr ?></p>

    <?php if ( count( $list ) > 0 ) : ?>

      <ul class="results">
        <?php foreach ( $list as $item ) :
          $num = $item['num'];
          $name = $item['name'];
        ?>
          <li class="results__item">
            <span class="results__item-num"><?= $num ?></span>
            <span class="results__item-name"><?= $name ?></span>
          </li>
        <?php endforeach ?>
      </ul>

    <?php endif ?>

  </div>
</section>