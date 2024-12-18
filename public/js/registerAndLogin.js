'use strict';

(() => {
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

        form.classList.add('was-validated')
        }, false)
    })
})()

function sendEmailCode(email, user_name) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", `./app/services/mailerService.php?func=sendEmailCode&email=${encodeURIComponent(email)}&user_name=${encodeURIComponent(user_name)}`, true);
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            showToast("Your code is sent");
            console.log(xhr.responseText);
        } else {
            console.log("Error");
        }
    }
    xhr.send();
}


//Handle send code for user
$("#register-form button[type=button]")?.addEventListener("click", () => {
    const email = $("#user_email").value;
    const user_name = $("#user_name").value;
    sendEmailCode(email, user_name);
    
})

$("#register-form")?.addEventListener("submit", (e) => {
    const pass = $("#user_password").value;
    const passConfirm = $("#user_confirm_password").value;
    if(pass != passConfirm) {
        showToast("Invalid password confirmation");
        e.preventDefault();
    }
})

function showToast(message) {
    const toastLive = $('#liveToast');
    $(".toast-body").innerText = message;
    console.log(message)
    
    const toast = new bootstrap.Toast(toastLive);
    toast.show();
    setTimeout(() => {
      toast.hide();
    }, 5000);
}