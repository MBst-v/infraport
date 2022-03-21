document.addEventListener('DOMContentLoaded', function() {

;(function() {
    let hdr = q('.hdr');
})();

;
(function() {
  menu = mobileMenu({
    menu: q('.menu'),
    menuCnt: q('.menu__cnt'),
    openBtn: burger,
    closeBtn: q('.menu__close'),
    toRight: true,
    fade: false,
    allowPageScroll: false
  });
  // menu.open();
})();

//=include ../sections/page-hero/page-hero.js

//=include ../sections/about-company/about-company.js

//=include ../sections/about-mission/about-mission.js

//=include ../sections/about-employees/about-employees.js

//=include ../sections/index-callback/index-callback.js

;
(function() {
  let slideSelector = '.index-case',
    slider = q('.index-cases-list'),
    slides = qa(slideSelector, slider),
    $slider = $(slider),
    buildSlider = function() {
      // если ширина экрана больше 768px и слайдов меньше 4, то слайдера не будет
      if (media('(min-width:767.98px)') && slides.length < 4) {
        if (SLIDER.hasSlickClass($slider)) {
          SLIDER.unslick($slider);
        }
        // если ширина экрана больше 576px и слайдов меньше 3, то слайдера не будет
      } else if (media('(min-width:575.98px)') && slides.length < 3) {
        if (SLIDER.hasSlickClass($slider)) {
          SLIDER.unslick($slider);
        }
      } else {
        if (SLIDER.hasSlickClass($slider)) {
          // слайдер уже создан
          return;
        }
        // Если слайдов больше 1, то будет слайдер
        if (slides.length && slides.length > 1) {
          $slider.slick({
            slide: slideSelector,
            draggable: false,
            appendArrows: $('.index-cases__arrows', slider.parentElement),
            appendDots: $('.index-cases-list__nav', slider),
            dots: true,
            dotsClass: 'index-cases-list__dots dots',
            customPaging: () => '<button type="button" class="dot"></button>',
            prevArrow: SLIDER.createArrow('index-cases__prev', SLIDER.arrowSvg),
            nextArrow: SLIDER.createArrow('index-cases__next', SLIDER.arrowSvg),
            infinite: false,
            mobileFirst: true,
            responsive: [{
              breakpoint: 575.98,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
              }
            }, {
              breakpoint: 767.98,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
              }
            }]
          });
        }
      }
    };

  buildSlider();
  windowFuncs.resize.push(buildSlider);
})();

//=include ../sections/footer/footer.js

});