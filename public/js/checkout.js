const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const address_form = document.querySelector('.form-container')
const overlay = document.querySelector(".overlay");
document.querySelector('.edit_address').addEventListener('click', () => {
    address_form.style.display = 'block';
})
document.querySelector('.cancel_btn').addEventListener('click', () => {
    address_form.style.display = 'none';
})

document.addEventListener("DOMContentLoaded", function () {
    const formContainer = document.querySelector(".form-container");
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

//checkout backend
$(".editProfileForm").addEventListener("submit", (e) => {
    console.log(1)
    const username = e.target.querySelector("input[name=username]").value;
    const phonenumber = e.target.querySelector("input[name=phonenumber]").value;
    const user_address = e.target.querySelector("input[name=user-address]").value;
    console.log(user_address, username, phonenumber)
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./Profile/saveInfoCheckout", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            if(this.response == 1) {
                console.log(1)
                address_form.style.display = 'none';
                overlay.classList.remove("active");
                $(".user_name").innerText = username;
                $(".user_phoneNumber").innerText = " - " + phonenumber;
                $(".address").innerText = "- " + user_address;
                showToast("Edit information successfully!")
            }
        }
    }
    xhr.send(JSON.stringify({"username": username, "phone_number": phonenumber, "address": user_address}));
})

//Show message
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