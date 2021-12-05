<section class="index-principles container sect"<?php echo $sect_id ?>>
  <div class="sect-left">
    <h2 class="index-principles__title sect-title-5"><span class="sect-title-text"><?php echo $section['title'] ?></span></h2>  
  </div>
  <div class="sect-right">
    <ul class="index-principles-list"> <?php
      foreach ( $section['principles'] as $principle ) : ?>
        <li class="index-principles-list__item">
          <span class="index-principles-list__item-title"><?php echo $principle['title'] ?></span>
          <p class="index-principles-list__item-descr"><?php echo $principle['descr'] ?></p>
        </li> <?php
      endforeach ?>
    </ul>
  </div>
</section>