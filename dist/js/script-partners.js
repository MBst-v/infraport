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
  const partnersPerPage = 6
  const paginationBtns = qa('.pagination-number')
  const partners = qa('.partner')

  const parntersCategories = {
    0: partners
  }

  for (let i = 0; i < partners.length; i++) {
    const partner = partners[i]
    const partnerCat = partner.dataset.catId

    if (!parntersCategories[partnerCat]) {
      parntersCategories[partnerCat] = []
    }

    parntersCategories[partnerCat].push(partner)
  }

  const filter = {
    el: q('.filter'),
    currEl: q('.filter__curr'),
    list: q('.filter__list'),
    items: qa('.filter__item'),
    currId: 0, // 0 - all
    subscribers: [],
    titleEl: q('.partners-list .sect-title-2'),
    titles: {
      0: q('.partners-list .sect-title-2').innerHTML,
    },

    init() {
      const self = this

      for (let i = 0; i < this.items.length; i++) {
        const item = this.items[i]
        const catId = item.dataset.filterId

        if (+catId === 0) continue

        const text = item.textContent

        this.titles[catId] = text
      }

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
          self.titleEl.innerHTML = self.titles[id]
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

  function enableCategory(catId) {
    partners.forEach(function(partner) {
      partner.classList.add('hidden')
    })
    parntersCategories[catId].forEach(function(partner) {
      partner.classList.remove('hidden')
    })

    hidePageBtnsByCategoryLength(catId)
    showPartnersByPage(1, catId, true)
  }

  function showPartnersByPage(pageNum, catId, scroll = false) {
    const startIdx = pageNum * partnersPerPage - partnersPerPage
    const endIdx = startIdx + partnersPerPage

    for (let i = 0; i < parntersCategories[catId].length; i++) {
      const partner = parntersCategories[catId][i]

      if (i >= startIdx && i < endIdx) {
        partner.classList.remove('hidden')
      } else {
        partner.classList.add('hidden')
      }
    }

    if (scroll) scrollToTarget('', filter.el)
  }

  function hidePageBtnsByCategoryLength(catId) {
    const length = parntersCategories[catId].length
    const showBtnCount = Math.ceil(length / partnersPerPage)

    if (showBtnCount <= 1) {
      paginationBtns.forEach(function(btn) {
        btn.classList.add('hidden')
      })
    } else {
      paginationBtns.forEach(function(btn, i) {
        btn.classList.remove('active')
        if (i === 0) btn.classList.add('active')
        if (i <= showBtnCount) {
          btn.classList.remove('hidden')
        } else {
          btn.classList.add('hidden')
        }
      })
    }
  }

  function removeActiveClassFromAllPaginationBtns() {
    paginationBtns.forEach(function(btn) {
      btn.classList.remove('active')
    })
  }

  filter.init()

  filter.subscribe(function(id) {enableCategory(id)})

  paginationBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      const pageNum = btn.dataset.pageNum
      removeActiveClassFromAllPaginationBtns()
      btn.classList.add('active')

      showPartnersByPage(pageNum, filter.currId, true)
    })
  })

  showPartnersByPage(1, 0)
})();

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