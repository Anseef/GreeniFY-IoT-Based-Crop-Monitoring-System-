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
  const containerIds = ["Home", "Dashboard", "Analytics", "Contact"];
  let buttonClicked = false;
  
  navButton.forEach((dot) => {
    dot.addEventListener('click', () => {
        buttonClicked = true;
        removeActiveClass();
        dot.classList.add('active');
    });
  });
  
  const removeActiveClass = () => {
    navButton.forEach((dot) => {
        dot.classList.remove('active');
    });
  }
  function updateActiveNav() {
    var scrollPos = window.scrollY || window.scrollTop || document.documentElement.scrollTop;
    var navIcons = document.querySelectorAll('.navButton i');
  
    for (var i = 0; i < containerIds.length; i++) {
        var container = document.getElementById(containerIds[i]);
        if (container) {
            var containerTop = container.offsetTop;
            var containerBottom = containerTop + container.clientHeight;
  
            if (scrollPos >= containerTop && scrollPos < containerBottom) {
                navIcons[i].classList.add('active');
            } else {
                navIcons[i].classList.remove('active');
            }
        }
    }
  }
  window.addEventListener('scroll', updateActiveNav);
  window.addEventListener('load', updateActiveNav);  