/* globals Swiper: true */

// Slider class
// -----------------------------------------
const activeClass = 'is-active';

class Slider{

  constructor(sliderClass, minimumLength, customConfig){
    // console.log("Slider!", sliderClass, minimumLength, customConfig);

    if ( $('.'+sliderClass).find('.'+ sliderClass + "-item").length > minimumLength ){
      return new Swiper ('.'+ sliderClass + '-container', this._getSliderConfig(sliderClass, customConfig));
    } else {
      this._hideArrows(sliderClass);
    }
  }

  _getSliderConfig(sliderClass, customConfig){
    let config = {
      slidesPerView: 	1,
      setWrapperSize: true,
      autoHeight: 		true,
      wrapperClass: 	sliderClass + '-wrapper',
      slideClass: 		sliderClass + '-item',
      slideActiveClass: activeClass,
      // Navigation arrows
      // nextButton: 	'.'+ sliderClass +'-arrow-right',
      // prevButton: 	'.'+ sliderClass + '-arrow',
      buttonDisabledClass: 'l-disabled'
    };
    return $.extend(config, customConfig || {});
  }

  _hideArrows(sliderClass){
    $('[class*="'+ sliderClass +'-arrow"]').hide();
  }

}

export default Slider;
