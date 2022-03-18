      <?php
        global
          $tel,
          $tel_clean,
          $email,
          $address,
          $address_link,
          $logo_url,
          $site_url,
          $template_directory_uri; ?>
      <footer class="ftr">
        <div class="sect-left">
          <a href="<?php echo $site_url ?>" class="ftr__logo">
            <img src="<?php echo $logo_url ?>" alt="Логотип Infraport" class="ftr__logo-img">
          </a>
          <p class="ftr__descr">Центр разработки <br>и интеграции светотехнических <br>и электротехнических решений</p>
          <!-- <p class="ftr__copy">&copy;&nbsp;<?php // echo date( 'Y' ) ?>&nbsp;Infraport</p> -->
          <p class="ftr__dev">
            Разработка - <a href="https://media-bay.ru/" target="_blank" aria-label="Сайт студии медиа-гавань" class="ftr__dev-link"><img src="<?= $template_directory_uri ?>/img/mb-dev.svg" alt="media bay logo" class="ftr__dev-img"></a>
          </p>
        </div>
        <div class="sect-right">
          <div class="ftr__contacts">
            <div class="ftr__contact">
              <span class="ftr__contact-title">Телефон</span>
              <a href="tel:<?php echo $tel_clean ?>" class="ftr__contact-link"><?php echo $tel ?></a>
            </div>
            <div class="ftr__contact">
              <span class="ftr__contact-title">E-mail</span>
              <a href="mailto:<?php echo $email ?>" class="ftr__contact-link"><?php echo $email ?></a>
            </div>
            <div class="ftr__contact">
              <span class="ftr__contact-title">Адрес</span>
              <a href="<?php echo $address_link ?>" class="ftr__contact-link" target="_blank"><?php echo $address ?></a>
            </div>
          </div> <?php
          wp_nav_menu( [
            'theme_location'  => 'header_menu',
            'container'       => 'nav',
            'container_class' => 'ftr__nav',
            'menu_class'      => 'ftr__nav-list',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
          ] ) ?>
        </div>
      </footer>
      <div id="fake-scrollbar"></div> <?php
      wp_footer() ?>
    </div>
  </body>
</html>