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
  // Lấy giá trị ban đầu của form
  const user_name = document.getElementById('fullname-user').value;
  const user_email = document.getElementById('email-user').value;
  const user_phone = document.getElementById('phone-user').value;
  const user_address = document.getElementById('address-user').value;
  const user_img = document.getElementById("img-user").src;

  const inputValues = {
    username: user_name,
    email: user_email,
    phone: user_phone,
    address: user_address,
    userImg: user_img
  };

  let isAuthenticated = false;

  const inputs = document.querySelectorAll('input');
  
  // Kiểm tra sự thay đổi của các input
  inputs.forEach(input => {
    input.addEventListener('change', () => {
      if (input.type === "file") {
        const fileInput = document.querySelector(".file-input");
        if (fileInput.files && fileInput.files[0]) {
          isAuthenticated = true; // Có thay đổi file
        }
      } else {
        const fieldName = input.name;
        if (fieldName in inputValues && input.value !== inputValues[fieldName]) {
          isAuthenticated = true; // Có thay đổi giá trị
        }
      }
    });
  });

  const profile_form = document.getElementById('profile-form');

  // Kiểm tra lại toàn bộ form khi nhấn "Save"
  profile_form.addEventListener('submit', (e) => {
    // Kiểm tra tất cả input khi submit
    inputs.forEach(input => {
      if (input.type === "file") {
        const fileInput = document.querySelector(".file-input");
        if (fileInput.files && fileInput.files[0]) {
          isAuthenticated = true;
        }
      } else {
        const fieldName = input.name;
        if (fieldName in inputValues && input.value !== inputValues[fieldName]) {
          isAuthenticated = true;
        }
      }
    });

    // Nếu không có thay đổi, hiển thị toast và ngăn submit
    if (!isAuthenticated) {
      e.preventDefault();
      displayToast("No changes have been made yet");
    }
  });
});

// Hiển thị toast thông báo
function displayToast(message) {
  const toastLiveExample = document?.getElementById('liveToast');
  const toastBody = toastLiveExample.querySelector('.toast-body');
  toastBody.textContent = message;

  const toast = new bootstrap.Toast(toastLiveExample);
  toast.show();

  setTimeout(() => {
      toast.hide();
  }, 5000);
}


// Hiện thị tôn báo alert
function showToast() {
  const toastLiveExample = document?.getElementById('liveToast');
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


document.addEventListener("DOMContentLoaded", () => {
  const menuLinks = document.querySelectorAll(".menu-link"); 
  const profileForm = document.querySelector(".body-profile"); 
  const changePasswordForm = document.querySelector(".change-password");
  const sidebarItems = document.querySelectorAll(".list-group-item");

 
  function hideAllForms() {
      profileForm.style.display = "none";
      changePasswordForm.style.display = "none";
     
  }
  function removeBackground() {
    sidebarItems.forEach(item => {
        item.style.backgroundColor = ""; 
        
    });
}

  function showForm(page) {
      hideAllForms();
      removeBackground()
      if (page === "account") {
        profileForm.style.display = "block";
        document.querySelector('[data-page="account"]').parentElement.style.backgroundColor = "#1877F2";
      } else if (page === "change-password") {
        changePasswordForm.style.display = "block";
        document.querySelector('[data-page="change-password"]').parentElement.style.backgroundColor = "#1877F2"; 
      }
  }

  menuLinks.forEach(link => {
      link.addEventListener("click", (e) => {
          e.preventDefault();
          const page = link.getAttribute("data-page"); 
          menuLinks.forEach(item => {
            item.style.color = "";           
        });
          link.style.color = "white";
          showForm(page);
      });
  });

  showForm("account");
});

document.addEventListener("DOMContentLoaded", () => {
  
const passwordSession = sessionStorage.getItem("old-password")
const changePasswordForm = document.getElementById('change-password-form');
const oldPassword = document.getElementById('old-password');
const newPassword = document.getElementById('new-password');
const confirmPassword = document.getElementById('confirm-password');

changePasswordForm.addEventListener('submit', (e) => {
 
  let checkPass = false;
  if (oldPassword.value !== passwordSession) {
    checkPass = true;
  }

  if (newPassword.value !== confirmPassword.value) {
    checkPass = true;
  }

 
  if (checkPass) {
    e.preventDefault();
    displayToast("Something went wrong")
  } else {
    console.log('Form is valid. Submitting...');
  }
});

});
document.querySelector("#save_btn_change_pass")?.addEventListener("click", () => {
  const passwordInput = document.querySelector("#new-password");
  if (passwordInput) {
      sessionStorage.setItem("old-password", passwordInput.value);
  }
});

