"use strict";

var swiper = new Swiper('.home-carousel', {
  slidesPerView: 1,
  spaceBetween: 30,
  keyboard: {
    enabled: true
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  grabCursor: true,
  loop: true
});