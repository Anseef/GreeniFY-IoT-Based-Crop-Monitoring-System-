document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper(".farm-Main", {
    slidesPerView: 3.5,
    spaceBetween: 70,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
});