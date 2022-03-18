<?php
  $tasks = $fields['tasks'];
?>
<section class="case-tasks sect container">
  <div class="sect-left">
    <p class="sect-title-5"><span class="sect-title-text">Услуги</span></p>
  </div>

  <div class="sect-right">
    <h2 class="sect-title-2"><span class="text-blue">Выполненные</span> задачи</h2>
    <ul class="case-tasks__list">
      <?php foreach ( $tasks as $t ) : ?>
        <li class="case-tasks__item">
          <?= $t['descr'] ?>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</section>