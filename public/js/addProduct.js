const imageContainer = document.querySelector('.image-container');
const fileInput = document.querySelector('.file-input');
const img = document.querySelector('#img-product');


// Thay đổi ảnh khi user đổi
fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
        img.src = e.target.result; 
        };
        reader.readAsDataURL(file);
        img.style.display = "block"; 
    }
});