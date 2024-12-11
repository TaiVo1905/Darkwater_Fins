const imageContainer = document.querySelector('.image-container');
const fileInput = document.querySelector('.file-input');
const img = document.querySelector('#img-user');

imageContainer.addEventListener('click', () => {
  fileInput.click();
});
fileInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      img.src = e.target.result; // Thay đổi ảnh

    };
    reader.readAsDataURL(file);
  

  }
});