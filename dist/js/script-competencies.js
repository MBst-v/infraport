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

(function() {
  const services = qa('.service')
  const servicesContainer = q('.services')

  const servicesCategories = {
    0: Array.from(services)
  }

  for (let i = 0; i < services.length; i++) {
    const service = services[i]
    const serviceCat = service.dataset.catId

    if (!servicesCategories[serviceCat]) {
      servicesCategories[serviceCat] = []
    }

    servicesCategories[serviceCat].push(service)
  }

  for (let key in servicesCategories) {
    if (servicesCategories[key].length % 2 === 0) {
      const length = servicesCategories[key].length
      servicesCategories[key][0].classList.add('mt')
      servicesCategories[key][length - 1].classList.add('pb')
    }
  }

  const filter = {
    el: q('.filter'),
    currEl: q('.filter__curr'),
    list: q('.filter__list'),
    items: qa('.filter__item'),
    currId: 0, // 0 - all
    subscribers: [],

    init() {
      const self = this

      this.list.addEventListener('click', function(e) {
        const item = e.target.closest('.filter__item')

        if (item) {
          self.items.forEach(function(item) {
            item.classList.remove('active')
          })

          item.classList.add('active')

          const text = item.textContent
          const id = item.dataset.filterId
          self.currId = id

          self.setCurrent(text, id)

          self.subscribers.forEach(function(cb) {
            cb(id)
          })

          self.close()
        }
      })

      window.addEventListener('click', function(e) {
        const f_curr = e.target.closest('.filter__curr')
        const f_list = e.target.closest('.filter__list')

        if (f_curr || f_list) return

        if (self.el.classList.contains('open')) self.close()
      })

      this.currEl.addEventListener('click', function() {
        self.el.classList.toggle('open')
      })
    },

    setCurrent(text, id) {
      this.currEl.dataset.currFilterText = text
      this.currEl.dataset.currFilterId = id
    },

    subscribe(cb) {
      this.subscribers.push(cb)
    },

    close() {
      this.el.classList.remove('open')
    },

    open() {
      this.el.classList.add('open')
    },
  }

  filter.init()

  filter.subscribe(displayServiceByCatId)

  function displayServiceByCatId(catId) {
    servicesContainer.innerHTML = ''

    servicesCategories[catId].forEach(function(service) {
      servicesContainer.append(service)
    })
  }
})();

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

//=include ../sections/index-callback/index-callback.js

//=include ../sections/footer/footer.js

});