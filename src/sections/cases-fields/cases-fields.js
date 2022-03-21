(function() {
  const casesPerPage = 6
  const paginationBtns = qa('.pagination-number')
  const cases = qa('.case')

  const casesCategories = {
    0: cases
  }

  for (let i = 0; i < cases.length; i++) {
    const partner = cases[i]
    const partnerCat = partner.dataset.catId

    if (!casesCategories[partnerCat]) {
      casesCategories[partnerCat] = []
    }

    casesCategories[partnerCat].push(partner)
  }

  const filter = {
    el: q('.filter'),
    currEl: q('.filter__curr'),
    list: q('.filter__list'),
    items: qa('.filter__item'),
    currId: 0, // 0 - all
    subscribers: [],
    titleEl: q('.cases-list .sect-title-2'),
    titles: {
      0: q('.cases-list .sect-title-2').innerHTML,
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
    cases.forEach(function(partner) {
      partner.classList.add('hidden')
    })
    casesCategories[catId].forEach(function(partner) {
      partner.classList.remove('hidden')
    })

    hidePageBtnsByCategoryLength(catId)
    showcasesByPage(1, catId, true)
  }

  function showcasesByPage(pageNum, catId, scroll = false) {
    const startIdx = pageNum * casesPerPage - casesPerPage
    const endIdx = startIdx + casesPerPage

    for (let i = 0; i < casesCategories[catId].length; i++) {
      const partner = casesCategories[catId][i]

      if (i >= startIdx && i < endIdx) {
        partner.classList.remove('hidden')
      } else {
        partner.classList.add('hidden')
      }
    }

    if (scroll) scrollToTarget('', filter.el)
  }

  function hidePageBtnsByCategoryLength(catId) {
    const length = casesCategories[catId].length
    const showBtnCount = Math.ceil(length / casesPerPage)

    if (showBtnCount <= 1) {
      paginationBtns.forEach(function(btn) {
        btn.classList.add('hidden')
      })
    } else {
      paginationBtns.forEach(function(btn, i) {
        btn.classList.remove('active')
        if (i === 0) btn.classList.add('active')
        console.log(i);
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

      showcasesByPage(pageNum, filter.currId, true)
    })
  })

  showcasesByPage(1, 0)
})();