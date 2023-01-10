var mainImage = document.getElementById('mainImg');
var smallImages = document.getElementsByClassName('small-img');

smallImages[0].onclick = function () {
  mainImage.src = smallImages[0].src;
};

for (let i = 0; i < 4; i++) {
  smallImages[i].onclick = function () {
    mainImage.src = smallImages[i].src;
  };
}
