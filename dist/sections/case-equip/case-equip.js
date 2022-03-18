(function() {
  $('.equip-list').slick({
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
        appendArrows: $('.equip-slider__nav'),
      }
    }]
  })
})();