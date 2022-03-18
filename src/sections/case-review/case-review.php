<?php
$text = $fields['r_text'];
$name = $fields['r_name'];
$appointment = $fields['appointment'];
?>

<section class="case-review sect container">
  <div class="sect-left">
    <h2 class="sect-title-5">
      <span class="sect-title-text">отзывы</span>
    </h2>
  </div>

  <div class="sect-right">
    <figure class="review">
      <blockquote class="review__quote">
          <p class="review__text"><?= $text ?></p>
      </blockquote>
      <figcaption class="review__author">
        <span class="review__author-name"><?= $name ?></span>
        <span class="review__author-position"><?= $appointment ?></span>
      </figcaption>
    </figure>
  </div>
</section>