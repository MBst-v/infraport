;(function() {
  let competenciesSection = q('.index-competencies'),
    tabsBlock = q('.index-competencies-tabs', competenciesSection),
    contentBlock = q('.index-competencies-wrap', competenciesSection),
    tabs = qa('.index-competencies-tab', tabsBlock),
    blocks = qa('.index-competencies', competenciesSection),
    paginationBlock = q('.index-competencies-pagination', competenciesSection),
    paginationNumberClass = 'index-competencies-pagination-number';
    // transitionend = function(e) {
      // let target = e.target;
      // if (target.classList.contains('active')) {
        // contentBlock.style.maxHeight = target.scrollHeight + 'px';
        // contentBlock.removeEventListener('transitionend', transitionend);
      // }
    // };

  // contentBlock.style.maxHeight = contentBlock.children[0].scrollHeight + 'px';

  paginationBlock.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains(paginationNumberClass) && !target.classList.contains('active')) {
      let activeBlock = q('.index-competencies-block.active', contentBlock),
        activeNumber = q('.' + paginationNumberClass + '.active', paginationBlock);
        // activeServices = qa('[data-page="' + target.textContent + '"]', activeBlock),
        // height = 0;

      activeBlock.setAttribute('data-page', target.textContent);
      target.classList.add('active');
      activeNumber.classList.remove('active');

      scrollToTarget('', activeBlock);

      // activeServices.forEach(function(activeService) {
        // let styles = getComputedStyle(activeService);
        // height += activeService.offsetHeight + +styles.marginBottom.slice(0, -2);
      // });

      // activeBlock.style.maxHeight = height + paginationBlock.offsetHeight + 'px';
      // contentBlock.style.maxHeight = height + paginationBlock.offsetHeight + 'px';

      // console.log(height);
    }
  });

    
  tabsBlock.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains('index-competencies-tab') && !target.classList.contains('active')) {
      let selector = '[data-term="' + target.textContent + '"]',
        targetBlock = q(selector, contentBlock),
        activeBlock = q('.index-competencies-block.active', contentBlock),
        activeNumber = q('.' + paginationNumberClass + '.active', paginationBlock),
        activeTab = q('.active', tabsBlock);

      // contentBlock.addEventListener('transitionend', transitionend);

      target.classList.add('active');
      targetBlock.classList.add('active');
      activeBlock.classList.remove('active');
      activeTab.classList.remove('active');

      targetBlock.setAttribute('data-page', '1');
      activeNumber.classList.remove('active');
      paginationBlock.children[0].classList.add('active');
    }
  });
  

})();