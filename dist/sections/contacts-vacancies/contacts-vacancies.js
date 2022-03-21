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