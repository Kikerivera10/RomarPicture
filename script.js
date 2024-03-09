window.addEventListener('scroll', function() {
var navbar = document.getElementById('navbar');
var inicio = document.getElementById('inicio');
var scrollPosition = window.scrollY;
if (scrollPosition > 0) {
    navbar.classList.add('navbar-scrolled');
    navbar.style.display='block';
} else {
    navbar.classList.remove('navbar-scrolled');
    navbar.style.display='none';
  }
});