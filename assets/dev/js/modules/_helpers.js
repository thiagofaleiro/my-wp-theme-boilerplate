/* globals MobileDetect: true */

"use strict";

// Helper methods
// -----------------------------------------
const body					= document.body;
const $htmlBody 		= $("html, body");
const windowWidth   = window.innerWidth || screen.width;
const mobileDetect  = new MobileDetect(window.navigator.userAgent);
const menuOpenClass = 'is-menu-open';

class Helpers{

  isMobileScreenSize(){
    return windowWidth < 640;
  }

  isPhone(){
    return this.isMobileScreenSize() || mobileDetect.phone();
  }

  isTablet(){
    return mobileDetect.tablet();
  }

  isMobile(){
    // return (windowWidth < 640 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
    return ( this.isMobileScreenSize() || this.isPhone() || this.isTablet() );
  }

  // Cookies
  cookies(){
    return {
      set: (cookie) => document.cookie = cookie,
      get: (name) => {
        if (!name) { return document.cookie; }
        const value = "; " + document.cookie;
        const parts = value.split("; " + name + "=");
        if (parts.length > 1) { return parts.pop().split(";").shift(); }
      }
    };
  }

  // Others
  idFromHref(href){
    return href.substr(1);
  }

  setSectionEnd($section){
    $section.endPosition = $section.position().top + $section.outerHeight();
  }

  scrollToId(_id, _disableURLChange, _newHash){
    const $el = $(_id);
    if ($el.length > 0) {
      body.classList.remove(menuOpenClass);
      window.isPageScrolling = true;
      $htmlBody.animate(
        { scrollTop: $el.offset().top + 3 },
        900,
        function(){ window.isPageScrolling = false; }
      );
      if (!_disableURLChange) {
        _newHash = _newHash || _id.replace('#','');
        window.location.hash = '!/'+ _newHash;
      }
    }
  }

  fillScrollContentText(mainEl, contentEls, text){
    const { content } = contentEls;
    this.setContentTextHeight(mainEl, contentEls);
    content.mCustomScrollbar("destroy");
    content.html(text);
    content.mCustomScrollbar({scrollButtons: { enable: true }});
  }

  setContentTextHeight(mainEl, { header, content }, reduce = 90){
    if (!mainEl || !header || !content){
      return false;
    }
    const h = (
      (this.isMobile()) ?
      window.innerHeight - header.height() - reduce :
      mainEl.height() - header.height() - reduce
    );
    content.height(h);
  }

  openModal(href){
    $.fancybox.open($(href),
      {
        maxWidth: 	800,
        width: 			'90%',
        height: 		'90%',
        minHeight: 	465,
        padding: 		0,
        openEffect: 'fade',
        helpers: { overlay: { locked: true } }
      }
    );
  }

}

export default new Helpers();
