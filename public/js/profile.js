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

// hiện thị nội dung các tab khi nhấn vào sidebar
document.addEventListener("DOMContentLoaded", () => {
  const menuLinks = document.querySelectorAll(".menu-link"); 
  const profileForm = document.querySelector(".body-profile"); 
  const changePasswordForm = document.querySelector(".change-password");
  const order = document.querySelector(".order-page");
  const sidebarItems = document.querySelectorAll(".list-group-item");

  function hideAllForms() {
      profileForm.style.display = "none";
      changePasswordForm.style.display = "none";
      order.style.display = "none";
     
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
      }else if(page === "order"){
        order.style.display = "block";
        document.querySelector('[data-page="order"]').parentElement.style.backgroundColor = "#1877F2";
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

// xuử lý password
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
// luư password mới vào session
document.querySelector("#save_btn_change_pass")?.addEventListener("click", () => {
  const passwordInput = document.querySelector("#new-password");
  if (passwordInput) {
      sessionStorage.setItem("old-password", passwordInput.value);
  }
});

const nav_tab_links = document.querySelectorAll('.nav_tab_link')

function hiddenTabs() {
  nav_tab_links.forEach(tab => {
    tab.classList.remove('active');
  });
}


nav_tab_links.forEach(tab => {
  tab.addEventListener('click', () => {
    hiddenTabs();
    tab.classList.add('active');
  });
})

// ẩn hiện nút cancel
document.addEventListener('DOMContentLoaded', function () {
  const orderItems = document.querySelectorAll('.order-item'); 
  
  orderItems.forEach(item => {
      const statusSpan = item.querySelector('.text-primary');
      const cancelButton = item.querySelector('.cancel-btn'); 
      const isStatus = statusSpan.textContent.trim().toLowerCase()
      if (isStatus !== 'pending') {
          if (cancelButton) {
              cancelButton.style.display = 'none';
          }
      }
  });
});

// phần xử lý render navbar
document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".nav_tab_link");
  const orderItems = document.querySelectorAll(".order-item");

  function filterOrders(status) {
      orderItems.forEach(item => {
          const statusText = item.querySelector(".text-primary").textContent.trim();
          if (statusText.toLowerCase() === status.toLowerCase()) {
              item.style.display = "block";
          } else {
              item.style.display = "none";
          }
      });
  }
  filterOrders("Pending");

  tabs.forEach(tab => {
      tab.addEventListener("click", function () {
          const status = this.getAttribute("data-status");
          filterOrders(status);
      });
  });
});

// xử lý cancel
document.addEventListener("DOMContentLoaded", function () {
  const cancelButtons = document.querySelectorAll(".cancel-btn");
  cancelButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        const orderId = button.getAttribute("data-order-id");
        const xhr = new XMLHttpRequest();
        xhr.open("POST", `Profile/deleteOrder/${encodeURIComponent(orderId)}`, true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                button.closest(".order-item").remove();
            } else {
                console.log("Error");
            }
        }
        xhr.send();
    })
  })
});
