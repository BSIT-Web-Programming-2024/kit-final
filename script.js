let menuIcon= document.querySelector('#menu-icon');
let navbarIcon= document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbarIcon.classList.toggle('active');
}