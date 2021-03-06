"use strict";

import Helpers from './modules/_helpers';
// Getting just one Lodash method
// import { map } from 'lodash/fp';

// Header
// -----------------------------------------
(function header($){
  const $headerEl           = $("#header");
  const mobileMenuIconClass = 'icon-mobile';
  const menuOpenClass       = 'is-menu-open';

  function listeners(){
    // Mobile Menu
    if (Helpers.isMobile()){
      $headerEl.find(`.${mobileMenuIconClass}`).on('click', () => {
        document.body.classList.toggle(menuOpenClass);
      });
    }
  }

  function init(){
    listeners();
  }
  init();
}(jQuery));
