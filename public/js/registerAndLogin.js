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

function sendEmailCode(email, user_name = null) {
    const xhr = new XMLHttpRequest();
    const formData = new FormData();
    formData.append("email", email);
    formData.append("user_name", user_name);
    xhr.open("POST", "./users/authEmail", true);
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            showToast(xhr.response);
            console.log(1);
        } else {
            console.log("Error");
        }
    }
    xhr.send(formData);
}


//Handle send code for user
$("#register-form button[type=button]")?.addEventListener("click", () => {
    const email = $("#user_email").value;
    const user_name = $("#user_name").value;
    sendEmailCode(email, user_name);
    
})
$("#forgottenPassword-form button[type=button]")?.addEventListener("click", () => {
    const email = $("#user_email").value;
    sendEmailCode(email);
})

$("#register-form")?.addEventListener("submit", (e) => {
    const pass = $("#user_password").value;
    const passConfirm = $("#user_confirm_password").value;
    if(pass != passConfirm) {
        showToast("Invalid password confirmation");
        e.preventDefault();
    }
})

$("#forgottenPassword-form")?.addEventListener("submit", (e) => {
    const pass = $("#user_password").value;
    const passConfirm = $("#user_confirm_password").value;
    if(pass != passConfirm) {
        showToast("Invalid password confirmation");
        e.preventDefault();
    }
})


