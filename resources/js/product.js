subImgs = document.querySelectorAll('.quick-view-section .item-card .row .img-container .little-imgs img');
mainImg = document.querySelector('.quick-view-section .item-card .row .img-container .big-img img');

subImgs.forEach((image) => {
  image.onclick = () => {
    let src = image.getAttribute('src');
    mainImg.src = src;
  };
});
