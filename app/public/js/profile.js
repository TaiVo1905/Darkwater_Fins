const imageContainer = document.querySelector('.image-container');
const fileInput = document.querySelector('.file-input');
const img = document.querySelector('#img-user');


imageContainer.addEventListener('click', () => {
  fileInput.click();
});
// Thay đổi ảnh khi user đổi
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
// điều hướng nếu có thay đổi
document.addEventListener("DOMContentLoaded", function () {
  const user_name = document.getElementById('fullname-user').value
  const user_email = document.getElementById('email-user').value
  const user_password = document.getElementById('password-user').value
  const user_phone = document.getElementById('phone-user').value
  const user_address= document.getElementById('address-user').value
  const user_img = document.getElementById("img-user").src
  
  const inputValues = {
    username : user_name ,
    email: user_email ,
    password: user_password ,
    phone: user_phone ,
    address: user_address ,
    userImg: user_img 
  }
  let isAuthenticated = false

  const inputs = document.querySelectorAll('input');
  inputs.forEach(input => {
    input.addEventListener('change', () => {
      if (input.type === "file") {
        const fileInput = document.querySelector(".file-input");
        if (fileInput.files && fileInput.files[0]) {
            isAuthenticated = true;

        }
    } else {
        const fieldName = input.name;
        if (input.value !== inputValues[fieldName]) {
            isAuthenticated = true;
        }
    }
    });
  });
  const saveBtn = document.getElementById('profile-form');
  
  saveBtn.addEventListener('submit',(e) =>{

    if(!isAuthenticated){
      e.preventDefault();
      showToast()
    }
  });
  
});

// Hiện thị tôn báo alert
function showToast() {
  const toastLiveExample = document.getElementById('liveToast');
  const toast = new bootstrap.Toast(toastLiveExample);
  toast.show();
  setTimeout(() => {
    toast.hide();
  }, 5000);
}

// Xử lý ô input nếu user không điền
(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()