(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
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

},{}],2:[function(require,module,exports){
"use strict";

// Contact (Form)
// -----------------------------------------
// (function contact(){
//
// }());

},{}],3:[function(require,module,exports){
"use strict";

var _helpers = require("./modules/_helpers");

var _helpers2 = _interopRequireDefault(_helpers);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// Getting just one Lodash method
// import { map } from 'lodash/fp';

// Header
// -----------------------------------------
(function header($) {
  var $headerEl = $("#header");
  var mobileMenuIconClass = 'icon-mobile';
  var menuOpenClass = 'is-menu-open';

  function listeners() {
    // Mobile Menu
    if (_helpers2.default.isMobile()) {
      $headerEl.find("." + mobileMenuIconClass).on('click', function () {
        document.body.classList.toggle(menuOpenClass);
      });
    }
  }

  function init() {
    listeners();
  }
  init();
})(jQuery);

},{"./modules/_helpers":4}],4:[function(require,module,exports){
/* globals MobileDetect: true */

"use strict";

// Helper methods
// -----------------------------------------

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var body = document.body;
var $htmlBody = $("html, body");
var windowWidth = window.innerWidth || screen.width;
var mobileDetect = new MobileDetect(window.navigator.userAgent);
var menuOpenClass = 'is-menu-open';

var Helpers = function () {
  function Helpers() {
    _classCallCheck(this, Helpers);
  }

  _createClass(Helpers, [{
    key: "isMobileScreenSize",
    value: function isMobileScreenSize() {
      return windowWidth < 640;
    }
  }, {
    key: "isPhone",
    value: function isPhone() {
      return this.isMobileScreenSize() || mobileDetect.phone();
    }
  }, {
    key: "isTablet",
    value: function isTablet() {
      return mobileDetect.tablet();
    }
  }, {
    key: "isMobile",
    value: function isMobile() {
      // return (windowWidth < 640 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
      return this.isMobileScreenSize() || this.isPhone() || this.isTablet();
    }

    // Cookies

  }, {
    key: "cookies",
    value: function cookies() {
      return {
        set: function set(cookie) {
          return document.cookie = cookie;
        },
        get: function get(name) {
          if (!name) {
            return document.cookie;
          }
          var value = "; " + document.cookie;
          var parts = value.split("; " + name + "=");
          if (parts.length > 1) {
            return parts.pop().split(";").shift();
          }
        }
      };
    }

    // Others

  }, {
    key: "idFromHref",
    value: function idFromHref(href) {
      return href.substr(1);
    }
  }, {
    key: "setSectionEnd",
    value: function setSectionEnd($section) {
      $section.endPosition = $section.position().top + $section.outerHeight();
    }
  }, {
    key: "scrollToId",
    value: function scrollToId(_id, _disableURLChange, _newHash) {
      var $el = $(_id);
      if ($el.length > 0) {
        body.classList.remove(menuOpenClass);
        window.isPageScrolling = true;
        $htmlBody.animate({ scrollTop: $el.offset().top + 3 }, 900, function () {
          window.isPageScrolling = false;
        });
        if (!_disableURLChange) {
          _newHash = _newHash || _id.replace('#', '');
          window.location.hash = '!/' + _newHash;
        }
      }
    }
  }, {
    key: "fillScrollContentText",
    value: function fillScrollContentText(mainEl, contentEls, text) {
      var content = contentEls.content;

      this.setContentTextHeight(mainEl, contentEls);
      content.mCustomScrollbar("destroy");
      content.html(text);
      content.mCustomScrollbar({ scrollButtons: { enable: true } });
    }
  }, {
    key: "setContentTextHeight",
    value: function setContentTextHeight(mainEl, _ref) {
      var header = _ref.header,
          content = _ref.content;
      var reduce = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 90;

      if (!mainEl || !header || !content) {
        return false;
      }
      var h = this.isMobile() ? window.innerHeight - header.height() - reduce : mainEl.height() - header.height() - reduce;
      content.height(h);
    }
  }, {
    key: "openModal",
    value: function openModal(href) {
      $.fancybox.open($(href), {
        maxWidth: 800,
        width: '90%',
        height: '90%',
        minHeight: 465,
        padding: 0,
        openEffect: 'fade',
        helpers: { overlay: { locked: true } }
      });
    }
  }]);

  return Helpers;
}();

exports.default = new Helpers();

},{}]},{},[1,2,3]);
