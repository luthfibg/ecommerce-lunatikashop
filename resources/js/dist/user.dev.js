"use strict";

//menu handler
var profile = document.querySelector('.user_header .flex .profile');

document.querySelector('#user-btn').onclick = function () {
  profile.classList.toggle('active');
  navbar.classList.remove('active'); //   product.classList.remove('active');
};

var navbar = document.querySelector('.user_header .flex .navbar');

document.querySelector('#menu-btn').onclick = function () {
  navbar.classList.toggle('active');
  profile.classList.remove('active'); //   product.classList.remove('active');
};