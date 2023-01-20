let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () => {
  profile.classList.toggle('active');
  navbar.classList.remove('active');
  product.classList.remove('active');
};

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active');
  profile.classList.remove('active');
  product.classList.remove('active');
};

let product = document.querySelector('.header .flex .product-operation');

document.querySelector('#product-btn').onclick = () => {
  product.classList.toggle('active');
  profile.classList.remove('active');
  navbar.classList.remove('active');
};

window.onscroll = () => {
  profile.classList.remove('active');
  navbar.classList.remove('active');
};

// $('#user-btn').click(function (e) {
//   $('.profile').addClass('active');
//   // $('html').addClass('open');
//   $('html, body').addClass('noscroll');
//   e.stopPropagation();
// });

// $('body').click(function (e) {
//   e.stopPropagation();
// });
