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

// ;(function() {
//   let headerHeight = hdr.offsetHeight,
//     heroPicture = q('.index-hero__pic');

//   heroPicture.style.cssText = 'top:-' + headerHeight + 'px;height:calc(100% + ' + headerHeight + 'px)';

// })();

;(function() {
  let competenciesSection = q('.index-competencies'),
    tabsBlock = q('.index-competencies-tabs', competenciesSection),
    contentBlock = q('.index-competencies-wrap', competenciesSection),
    tabs = qa('.index-competencies-tab', tabsBlock),
    blocks = qa('.index-competencies', competenciesSection),
    // paginationBlock = q('.index-competencies-pagination', competenciesSection),
    paginationNumberClass = 'index-competencies-pagination-number';

  contentBlock.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains(paginationNumberClass) && !target.classList.contains('active')) {
      let activeBlock = q('.index-competencies-block.active', contentBlock),
        paginationBlock = q('.index-competencies-pagination', activeBlock),
        activeNumber = q('.' + paginationNumberClass + '.active', paginationBlock);

      activeBlock.setAttribute('data-page', target.textContent);
      target.classList.add('active');
      activeNumber.classList.remove('active');

      scrollToTarget('', activeBlock);

    }
  });

    
  tabsBlock.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains('index-competencies-tab') && !target.classList.contains('active')) {
      let selector = '[data-term="' + target.textContent + '"]',
        targetBlock = q(selector, contentBlock),
        activeBlock = q('.index-competencies-block.active', contentBlock),
        paginationBlock = q('.index-competencies-pagination', activeBlock),
        activeNumber = paginationBlock && q('.' + paginationNumberClass + '.active', paginationBlock),
        activeTab = q('.active', tabsBlock);

      // contentBlock.addEventListener('transitionend', transitionend);

      target.classList.add('active');
      targetBlock.classList.add('active');
      activeBlock.classList.remove('active');
      activeTab.classList.remove('active');

      targetBlock.setAttribute('data-page', '1');
      activeNumber && activeNumber.classList.remove('active');
      paginationBlock && paginationBlock.children[0].classList.add('active');
    }
  });
  

})();

//=include ../sections/index-about/index-about.js

//=include ../sections/index-services/index-services.js

;
(function() {
  let slideSelector = '.index-partner',
    paginationNumberClass = 'pagination-number',
    blockClass = 'index-partner',
    activeClass = 'active',
    section = q('.index-partners'),
    list = slider = q('.index-partners-list', section),
    paginationBlock = q('.pagination', section),
    slides = qa(slideSelector, slider),
    $slider = $(slider),
    buildSlider = function() {
      // если ширина экрана меньше 768px, то слайдера не будет
      if (media('(max-width:767.98px)')) {
        if (SLIDER.hasSlickClass($slider)) {
          SLIDER.unslick($slider);
        }
        // если ширина экрана больше 1024px и слайдов меньше 5, то слайдера не будет
      } else if (media('(min-width:575.98px)') && slides.length < 5) {
        if (SLIDER.hasSlickClass($slider)) {
          SLIDER.unslick($slider);
        }
      } else {
        if (SLIDER.hasSlickClass($slider)) {
          // слайдер уже создан
          return;
        }
        // Если слайдов больше 3, то будет слайдер
        if (slides.length && slides.length > 3) {
          $slider.slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            slide: slideSelector,
            draggable: false,
            appendArrows: $('.index-partners__arrows', slider.parentElement),
            appendDots: $('.index-partners-list__nav', slider),
            prevArrow: SLIDER.createArrow('index-partners__prev', SLIDER.arrowSvg),
            nextArrow: SLIDER.createArrow('index-partners__next', SLIDER.arrowSvg),
            infinite: false,
            mobileFirst: true,
            responsive: [{
              breakpoint: 1023.98,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 4
              }
            }]
          });
        }
      }
    };

  paginationBlock.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains(paginationNumberClass) && !target.classList.contains(activeClass)) {
      let activeNumber = q('.' + paginationNumberClass + '.' + activeClass, paginationBlock);

      list.setAttribute('data-page', target.textContent);
      target.classList.add(activeClass);
      activeNumber.classList.remove(activeClass);

      // scrollToTarget('', list);
    }
  });





  buildSlider();
  windowFuncs.resize.push(buildSlider);
})();

//=include ../sections/index-principles/index-principles.js

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

//=include ../sections/index-callback/index-callback.js

//=include ../sections/footer/footer.js

});