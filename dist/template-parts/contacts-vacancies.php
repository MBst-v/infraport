<?php
$descr = $section['descr'];
$vacancies = $section['vacancies'];
?>

<div class="vacancies sect-bg container">
  <div class="sect-left">
    <h2 class="sect-title-5"><span class="sect-title-text">Вакансии</span></h2>
  </div>

  <div class="sect-right">
    <p class="sect-title-2"><span class="text-blue">Работа</span> у нас</p>
    <p class="vacancies__descr"><?= $descr ?></p>

    <p class="vacancies__list-title">Открытые вакансии</p>

    <ul class="vacancies__list">
      <?php foreach ( $vacancies as $vac ) : ?>
        <li class="vacancy">
          <h3 class="vacancy__title"><?= $vac['title'] ?></h3>
          <span class="vacancy__cross"></span>

          <div class="vacancy-popup">
            <div class="vacancy-popup__inner no-scrollbar">
              <button class="vacancy-popup__close" aria-label="Закрыть попап"></button>
              <div class="vacancy-popup__cnt">
                <h4 class="vacancy-popup__title"><?= $vac['title'] ?></h4>
                <div class="vacancy-popup__descr"><?= $vac['descr'] ?></div>
              </div>
            </div>
          </div>

        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>