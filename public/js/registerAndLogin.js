'use strict'

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

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
            console.log(xhr.responseText);
        } else {
            console.log("Error");
        }
    }
    xhr.send();
}


//Handle send code for user
$("#register-form button[type=button]").addEventListener("click", () => {
    const email = $("#user_email").value;
    const user_name = $("#user_name").value;
    sendEmailCode(email, user_name);
})