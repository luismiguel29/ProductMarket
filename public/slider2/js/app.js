(function() {
  
    'use strict';
     
    const mySwiper = new Swiper ('#swiper1', {
      
      loop: true, 
      
        slidesPerView: 'auto',
        centeredSlides: true,
      
      a11y: true,
      keyboardControl: true,
      grabCursor: true,
      
      // pagination
      pagination: '.swiper-pagination',
      paginationClickable: true,
      
      // navigation arrows
      nextButton: '#js-prev1',
      prevButton: '#js-next1',
      
    });
  
    
  
  })(); /* IIFE end */