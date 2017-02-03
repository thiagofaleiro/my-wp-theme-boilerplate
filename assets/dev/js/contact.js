"use strict";

// Contact Us
// -----------------------------------------
(function contactUsBar(){
  $('.contact-us').on('click', 'button, .btn-close', function(e){
    e.delegateTarget.classList.toggle('is-open');
  });
}());
