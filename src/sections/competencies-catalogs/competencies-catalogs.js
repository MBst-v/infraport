(function() {
  $('.catalogs').slick({
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 2,
    rows: 4,
    mobileFirst: true,
    dots: true,
    arrows: false,
    dotsClass: 'catalog-slider__dots dots',
    customPaging: () => '<button type="button" class="dot"></button>',
    responsive: [{
      breakpoint: 767.98,
      settings: {
        arrows: true,
        dots: false,
        prevArrow: SLIDER.createArrow('index-cases__prev', SLIDER.arrowSvg),
        nextArrow: SLIDER.createArrow('index-cases__next', SLIDER.arrowSvg),
        appendArrows: $('.catalog-slider__nav'),
        rows: 2,
        slidesToShow: 3,
        slidesToScroll: 3,
        }
      },
      {
        breakpoint: 1023.98,
        settings: {
          arrows: true,
          dots: false,
          prevArrow: SLIDER.createArrow('index-cases__prev', SLIDER.arrowSvg),
          nextArrow: SLIDER.createArrow('index-cases__next', SLIDER.arrowSvg),
          appendArrows: $('.catalog-slider__nav'),
          rows: 2,
          slidesToShow: 4,
          slidesToScroll: 4,
        }
      }
    ]
  })

  if (window.media('(max-width: 767.98px)') && qa('.catalog').length <= 8) {
    q('.catalog-slider__dots').classList.add('hidden')
    q('.catalogs .slick-track').style.marginRight = 0
  }

  if (window.media('(max-width: 1023.98px)') && qa('.catalog').length <= 6) {
    q('.catalog-slider__nav').classList.add('hidden')
    q('.catalogs .slick-track').style.marginRight = 0
  }

  if (window.media('(min-width: 1024px)') && qa('.catalog').length <= 8) {
    q('.catalog-slider__nav').classList.add('hidden')
    q('.catalogs .slick-track').style.margin = 0
  }
})();