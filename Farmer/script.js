$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.navbarContainer').addClass('scrolled');
        } else {
            $('.navbarContainer').removeClass('scrolled');
        }
    });
});
const navButton = document.querySelectorAll('.navButton a i');
navButton.forEach((dot,id) => {
    dot.addEventListener('click',()=> {
        removeActiveClass();
        dot.classList.add('active');
    });
})
const removeActiveClass = () => {
    navButton.forEach((dot) => {
        dot.classList.remove('active');
    })
}