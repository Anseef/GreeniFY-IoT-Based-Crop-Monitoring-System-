document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper(".farm-Main", {
    slidesPerView: 3,
    spaceBetween: 48,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
});