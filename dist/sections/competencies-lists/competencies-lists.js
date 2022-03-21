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