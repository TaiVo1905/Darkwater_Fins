const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const address_form = document.querySelector('.form-container')
const overlay = document.querySelector(".overlay");

const info_username = $(".user_name");
const info_phoneNumber = $(".user_phoneNumber");
const info_address = $(".address");

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

// Phan load trang 
const loader = document.querySelector('.loader');

for (let i = 1; i <= 20; i++) {
    const span = document.createElement('span'); 
    span.style.setProperty('--stt', i); 
    loader.appendChild(span); 
}

document.querySelector('.checkout-btn').addEventListener('click', () => {

    document.querySelector('.load_animation').style.display = 'flex';
    if(checkInfo()) {
        completedOrder();
    }

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
                info_username.innerText = username;
                info_phoneNumber.innerText = " - " + phonenumber;
                info_address.innerText = "- " + user_address;
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

function completedOrder() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./checkout/completedOrder", true);
    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.response)
            const response = JSON.parse(this.response);
            if(response["status"] == "success") {
                document.querySelector('.load_animation').style.display = 'none';
                window.location.href = "./success";
            } else if(response["status"] == "fall") {
                document.querySelector('.load_animation').style.display = 'none';
                showToast(response["message"]);
            }
        }
    }
    xhr.send();
}

function checkInfo() {
    if (info_phoneNumber == "Not have your phone number yet" || info_address == "Not have your address yet") {
        showToast("You need update your information to check out!");
        return false;
    }
    return true;

}