//menu handler
let profile = document.querySelector('.user_header .flex .profile');

document.querySelector('#user-btn').onclick = () => {
  profile.classList.toggle('active');
  navbar.classList.remove('active');
  //   product.classList.remove('active');
};

let navbar = document.querySelector('.user_header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active');
  profile.classList.remove('active');
  //   product.classList.remove('active');
};
