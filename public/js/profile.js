const imageContainer = $('.image-container');
const fileInput = $('.file-input');
const img = $('#img-user');


 
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

  const inputs = $$('input');
  
  // Kiểm tra sự thay đổi của các input
  inputs.forEach(input => {
    input.addEventListener('change', () => {
      if (input.type === "file") {
        const fileInput = $(".file-input");
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
        const fileInput = $(".file-input");
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

  const forms = $$('.needs-validation')

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
  const menuLinks = $$(".menu-link"); 
  const profileForm = $(".body-profile"); 
  const changePasswordForm = $(".change-password");
  const order = $(".order-page");
  const sidebarItems = $$(".list-group-item");

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
        $('[data-page="account"]').parentElement.style.backgroundColor = "#1877F2";
      } else if (page === "change-password") {
        changePasswordForm.style.display = "block";
        $('[data-page="change-password"]').parentElement.style.backgroundColor = "#1877F2"; 
      }else if(page === "order"){
        order.style.display = "block";
        $('[data-page="order"]').parentElement.style.backgroundColor = "#1877F2";
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
  
  // const passwordSession = sessionStorage.getItem("old-password")
    const changePasswordForm = document.getElementById('change-password-form');
    const oldPassword = document.getElementById('old-password');
    const newPassword = document.getElementById('new-password');
    const confirmPassword = document.getElementById('confirm-password');
  
    changePasswordForm.addEventListener('submit', (e) => {
      e.preventDefault(); 
      const data = {
          oldPassword: oldPassword.value,
          newPassword: newPassword.value,
          confirmPassword: confirmPassword.value
      };
  
      const xhr = new XMLHttpRequest();
      xhr.open("POST", `Users/executeChangePassword/`, true);
      xhr.setRequestHeader("Content-Type", "application/json"); 
  
      xhr.onreadystatechange = function () {
          if (xhr.readyState == 4) { 
              if (xhr.status == 200) {
                const response = xhr.responseText.trim();
                console.log(response)  
                if (Number(xhr.responseText) === 2){
                  displayToast("Something went wrong");
                }else{
                  displayToast("Password changed successfully");
                  hiddenChangePasswordForm();
                }
              } else {
                  displayToast("Something went wrong");
              }
          }
      };
      xhr.send(JSON.stringify(data));
  
    });
    function hiddenChangePasswordForm() {
      oldPassword.value = '';
      newPassword.value = '';
      confirmPassword.value = '';
      changePasswordForm.classList.remove('was-validated'); 
  
      oldPassword.classList.remove('is-invalid');
      oldPassword.classList.remove('is-valid');
  
      newPassword.classList.remove('is-invalid');
      newPassword.classList.remove('is-valid');
  
      confirmPassword.classList.remove('is-invalid');
      confirmPassword.classList.remove('is-valid');
    };
  });
  

const nav_tab_links = $$('.nav_tab_link')

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
  const orderItems = $$('.order-item'); 
  
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
  const tabs = $$(".nav_tab_link");
  const orderItems = $$(".order-item");

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
  const cancelButtons = $$(".cancel-btn");
  cancelButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        const orderId = button.getAttribute("data-order-id");
        const xhr = new XMLHttpRequest();
        xhr.open("POST", `Checkout/deleteOrder/${encodeURIComponent(orderId)}`, true);
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
