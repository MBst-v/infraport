(function() {
  const counter = q('.gallery__counter-curr')

  function onSlickChange(e, slick, slide) {
    let slideNum = ''

    if (slide + 1 < 10) {
      slideNum = '0' + (slide + 1).toString()
    } else {
      slideNum = (slide + 1).toString()
    }

    counter.textContent = slideNum
  }

  $('.gallery__list').slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    dots: true,
    arrows: false,
    dotsClass: 'equip-slider__dots dots',
    customPaging: () => '<button type="button" class="dot"></button>',
    responsive: [{
      breakpoint: 767.98,
      settings: {
        arrows: true,
        dots: false,
        prevArrow: SLIDER.createArrow('index-cases__prev', SLIDER.arrowSvg),
        nextArrow: SLIDER.createArrow('index-cases__next', SLIDER.arrowSvg),
        appendArrows: $('.gallery__nav'),
      }
    }]
  }).on('afterChange', onSlickChange)
})();
