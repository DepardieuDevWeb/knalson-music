const hamburgerButtonIcon = document.querySelector('.nav-toggler');
const mon_menu = document.querySelector('.navbar-menu');

hamburgerButtonIcon.addEventListener('click', toggleNav)

function toggleNav(){
    hamburgerButtonIcon.classList.toggle('active');
    mon_menu.classList.toggle('active');

}