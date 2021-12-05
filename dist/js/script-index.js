document.addEventListener('DOMContentLoaded', function() {

;(function() {
    let hdr = q('.hdr');
})();

//=include ../sections/mobile-menu/mobile-menu.js

// ;(function() {
//   let headerHeight = hdr.offsetHeight,
//     heroPicture = q('.index-hero__pic');

//   heroPicture.style.cssText = 'top:-' + headerHeight + 'px;height:calc(100% + ' + headerHeight + 'px)';

// })();

;(function() {
  let competenciesSection = q('.index-competencies'),
    tabsBlock = q('.index-competencies-tabs', competenciesSection),
    contentBlock = q('.index-competencies-wrap', competenciesSection),
    tabs = qa('.index-competencies-tab', tabsBlock),
    blocks = qa('.index-competencies', competenciesSection),
    animationEnd = function(e) {
      console.log('msg');
      this.classList.toggle('active', e.animationName === 'fadeIn');
      this.removeEventListener('animationend', animationEnd);
    };

  tabsBlock.addEventListener('click', function(e) {
    let target = e.target;
    if (target.classList.contains('index-competencies-tab') && !target.classList.contains('active')) {
      let selector = '[data-term="' + e.target.textContent + '"]',
        targetBlock = q(selector, contentBlock),
        // activeBlock = q('.active', contentBlock),
        activeBlock = q('[style="display: block;"]', contentBlock),
        activeTab = q('.active', tabsBlock);

      // target.classList.add('active');
      // activeTab.classList.remove('active');

      // $(targetBlock).fadeIn(500, 'swing', function() {
      //   targetBlock.classList.add('active');
      // });
      // $(activeBlock).fadeOut(500, 'swing', function() {
      //   activeBlock.classList.remove('active');
      // });
      // targetBlock.classList.add('active');
      // activeBlock.classList.remove('active');

      // targetBlock.classList.add('active');
      // activeBlock.classList.remove('active');

      console.log(activeBlock);
      console.log(targetBlock);
      console.log(selector);
      // let target = e.target;
      // console.log(target);
      // if (target.classList.contains('index-competencies-tab'))
    }
  });
  

})();

//=include ../sections/index-about/index-about.js

//=include ../sections/index-services/index-services.js

//=include ../sections/footer/footer.js

});