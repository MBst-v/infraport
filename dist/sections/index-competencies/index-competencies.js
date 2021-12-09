;(function() {
  let competenciesSection = q('.index-competencies'),
    tabsBlock = q('.index-competencies-tabs', competenciesSection),
    contentBlock = q('.index-competencies-wrap', competenciesSection),
    tabs = qa('.index-competencies-tab', tabsBlock),
    blocks = qa('.index-competencies', competenciesSection),
    // paginationBlock = q('.index-competencies-pagination', competenciesSection),
    paginationNumberClass = 'index-competencies-pagination-number';

  contentBlock.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains(paginationNumberClass) && !target.classList.contains('active')) {
      let activeBlock = q('.index-competencies-block.active', contentBlock),
        paginationBlock = q('.index-competencies-pagination', activeBlock),
        activeNumber = q('.' + paginationNumberClass + '.active', paginationBlock);

      activeBlock.setAttribute('data-page', target.textContent);
      target.classList.add('active');
      activeNumber.classList.remove('active');

      scrollToTarget('', activeBlock);

    }
  });

    
  tabsBlock.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains('index-competencies-tab') && !target.classList.contains('active')) {
      let selector = '[data-term="' + target.textContent + '"]',
        targetBlock = q(selector, contentBlock),
        activeBlock = q('.index-competencies-block.active', contentBlock),
        paginationBlock = q('.index-competencies-pagination', activeBlock),
        activeNumber = paginationBlock && q('.' + paginationNumberClass + '.active', paginationBlock),
        activeTab = q('.active', tabsBlock);

      // contentBlock.addEventListener('transitionend', transitionend);

      target.classList.add('active');
      targetBlock.classList.add('active');
      activeBlock.classList.remove('active');
      activeTab.classList.remove('active');

      targetBlock.setAttribute('data-page', '1');
      activeNumber && activeNumber.classList.remove('active');
      paginationBlock && paginationBlock.children[0].classList.add('active');
    }
  });
  

})();