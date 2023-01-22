//menu handler
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

// image child show
var mainImage = document.getElementById('mainImg');
var subImages = document.getElementsByClassName('subImg');

subImages[0].onclick = function () {
  mainImage.src = subImages[0].src;
};

for (let i = 0; i < 4; i++) {
  subImages[i].onclick = function () {
    mainImage.src = subImages[i].src;
  };
}
