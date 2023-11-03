let nav_bar = document.querySelector('.navbar-menu');
let liens = document.querySelectorAll('.liens')
let lien_active = document.querySelector('.active-lien-color');

liens.forEach(lien => {lien.addEventListener('click', function(e){
    // e.preventDefault()
    console.log('avant active')
    
    if(lien.classList.contains('active')){
        return false;
    }

    nav_bar.querySelector('.navbar-menu .active-lien-color').classList.remove('active-lien-color');
    lien.classList.add('active-lien-color');
    console.log('apres active')
})
    
})

// let liens = document.querySelectorAll('.liens').forEach(lien =>{
//     lien.addEventListener('click', function(e){
//         let div = document.querySelector('.navbar-menu');
lien_active.addEventListener('click', (e)=>{
    // console.log('Bonjour')
    // alert('Bonjour')
    
})