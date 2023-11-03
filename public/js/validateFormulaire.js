const form = document.querySelector('form');

form.addEventListener('submit', (e)=>{
    
    e.preventDefault();
    let formData = new FormData(form);
    fetch('views/post/contact.php', {
        headers: {
            Accept: "application/json"
        },
        method: "POST"
    })
    .then(response => console.log(response))
});