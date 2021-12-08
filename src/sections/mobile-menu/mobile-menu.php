<aside class="menu" style="display:none">
  <div class="menu__cnt container">
    <div class="menu__hdr">
      <a href="<?php echo $site_url ?>" class="menu__logo">
        <img src="<?php echo $logo_url ?>" alt="Логотип Proftnesslife" class="menu__logo-img">
      </a>
      <button type="button" class="menu__close icon-cross"></button>
    </div> <?php
    wp_nav_menu( [
      'theme_location'  => 'header_menu',
      'container'       => 'nav',
      'container_class' => 'menu__nav',
      'menu_class'      => 'menu__nav-list',
      'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
    ] ) ?>
    <div class="menu__contacts">
      <a href="mailto:<?php echo $email ?>" class="menu__contact-link"><?php echo $email ?></a>
      <a href="tel:<?php echo $tel_clean ?>" class="menu__contact-link"><?php echo $tel ?></a>
    </div>
  </div>
</aside>