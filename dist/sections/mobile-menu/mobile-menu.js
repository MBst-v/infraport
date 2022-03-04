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