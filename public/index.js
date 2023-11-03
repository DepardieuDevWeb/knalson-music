// let liens = document.querySelectorAll('.liens').forEach(lien =>{
//     lien.addEventListener('click', function(e){
//         let div = document.querySelector('.navbar-menu');
        
//         if(lien.classList.contains('active')){
//             return false;
//         }

//         div.querySelector('.navbar-menu .active').classList.remove('active');
//         lien.classList.add('active');
      
//     })
    
// })

const dropdown = document.querySelector('.dropdown');
const sous_menu = document.querySelector('.sous-menu');
const menu_btn_lien_a = document.querySelector('.menu-btn-lien-a');
const sous_menu_a = document.querySelectorAll('.sous-menu a');

let toogleIndex;

function toggleDropDown(){
    if(!toogleIndex){
        sous_menu.style.height = `${sous_menu.scrollHeight}px`;
        toogleIndex = true;
        return;
    }

    sous_menu.style.height = 0;
    toogleIndex = false;
}

menu_btn_lien_a.addEventListener('click', toggleDropDown);
sous_menu_a.forEach(lien => lien.addEventListener('click', toggleDropDown));


// document.addEventListener('DOMContentLoaded', function() {
//     const liens = document.querySelectorAll('.liens');
//     const currentPage = window.location.pathname;
//     let lienActif = document.querySelector('.liens.active');

//     liens.forEach(lien => {
//         if (lien.getAttribute('href') === currentPage) {
//             lienActif = lien;
//         }

//         lien.addEventListener('click', function(e) {
//             if (lien !== lienActif) {
//                 lienActif.classList.remove('active');
//                 lien.classList.add('active');
//                 lienActif = lien;
//             }
//         });
//     });
// });
