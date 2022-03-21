<?php ?>
<script async src="https://api-maps.yandex.ru/2.1?apikey=82596a7c-b060-47f9-9fb6-829f012a9f04&lang=ru_RU&load=package.standard&onload=window.__lmap"></script>

<section class="contacts-hero sect container">
  <div class="sect-left">
    <p class="sect-title-5">
      <span class="sect-title-text">Адреса</span>
    </p>
  </div>
  <div class="sect-right">
    <h2 class="contacts-hero__title sect-title-2">Коммерческий отдел:</h2>
    <p class="contacts-hero__info">
      <span class="contacts-hero__address"><?= $address ?></span>
      <a href="tel:<?= $tel_clean ?>" class="contacts-hero__tel"><?= $tel ?></a>
    </p>

    <div id="map" class="contacts-hero__map"></div>
  </div>
</section>