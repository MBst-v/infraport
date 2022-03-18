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

  window.__lmap = function() {
    const coord = [59.930020, 30.254226]

    const map = new ymaps.Map(q('#map'), {
      center: coord,
      zoom: 16,
      controls: []
    })
    const placemark = new ymaps.Placemark(coord)

    map.geoObjects.add(placemark)
  }
})();

(function() {
  const vacanciesList = qa('.vacancy')
  const popups = qa('.vacancy-popup')

  for (let i = 0; i < vacanciesList.length; i++) {
    const vacancy = vacanciesList[i]
    const popup = q('.vacancy-popup', vacancy)

    vacancy.onclick = function(e) {
      popup.classList.add('open')
      document.body.classList.add('no-scroll')
    }
  }

  for (let i = 0; i < popups.length; i++) {
    const popup = popups[i]

    popup.addEventListener('click', function(e) {
      e.stopPropagation()
      const closeBtn = e.target.closest('.vacancy-popup__close')
      const inner = e.target.closest('.vacancy-popup__inner')

      if (closeBtn || !inner) {
        popup.classList.remove('open')
        document.body.classList.remove('no-scroll')
      }
    })
  }
})();

//=include ../sections/index-callback/index-callback.js

//=include ../sections/footer/footer.js

});