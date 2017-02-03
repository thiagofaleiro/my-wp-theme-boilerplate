"use strict";
// import Helpers from './modules/_helpers';

// Editorials section
// -----------------------------------------

// (function aboutUs($){
//
//   const isMobile = Helpers.isMobile();
//   const mainEl = $('[data-section="about-us"]');
//   // const contentEl = mainEl.find('article');
//   const contentEls = {
//     header: mainEl.find('.article-header'),
//     // title:  mainEl.find('.article-title'),
//     content:  mainEl.find('.article-text')
//   };
//
//   let resizeEvent;
//
//   // Window resizer listener
//   function windowResizeListener(){
//     $(window).on('resize', () => {
//       clearTimeout(resizeEvent);
//       resizeEvent = setTimeout(() => {
//         Helpers.setContentTextHeight(mainEl, contentEls);
//       }, 300);
//     });
//   }
//
//   // Set all section listeners
//   function setListeners(){
//     if(!isMobile){
//       windowResizeListener();
//     }
//   }
//
//   // Init
//   function init(){
//     Helpers.setContentTextHeight(mainEl, contentEls);
//     setListeners();
//   }
//
//   if( mainEl.length ){
//     init();
//   }
// }(jQuery));
