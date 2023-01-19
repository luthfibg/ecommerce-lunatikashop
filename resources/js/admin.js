let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () => {
  profile.classList.toggle('active');
};

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active');
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
