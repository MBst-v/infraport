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