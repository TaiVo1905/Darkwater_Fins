const address_form = document.querySelector('.form-container')
document.querySelector('.edit_address').addEventListener('click', () => {
    address_form.style.display = 'block';
})
document.querySelector('.cancel_btn').addEventListener('click', () => {
    address_form.style.display = 'none';
})

document.addEventListener("DOMContentLoaded", function () {
    const formContainer = document.querySelector(".form-container");
    const overlay = document.querySelector(".overlay");
    const editButton = document.querySelector(".edit_address");
    const cancelButton = document.querySelector(".cancel_btn");

    editButton.addEventListener("click", () => {
        overlay.classList.add("active");
    });
    cancelButton.addEventListener("click", () => {
        overlay.classList.remove("active");
    });

    overlay.addEventListener("click", () => {
        formContainer.style.display = "none";
        overlay.classList.remove("active");
    });
});

// Phan load trang 
const loader = document.querySelector('.loader');

for (let i = 1; i <= 20; i++) {
    const span = document.createElement('span'); 
    span.style.setProperty('--stt', i); 
    loader.appendChild(span); 
}

document.querySelector('.checkout-btn').addEventListener('click', () => {

    document.querySelector('.load_animation').style.display = 'flex';
    
    setTimeout(() => {
        document.querySelector('.load_animation').style.display = 'none';
        window.location.href = 'success'       
    }, 3500);

});

