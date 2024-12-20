
const address_form = $('.form-container')
const overlay = $(".overlay");

const info_username = $(".user_name");
const info_phoneNumber = $(".user_phoneNumber");
const info_address = $(".address");

$('.edit_address')?.addEventListener('click', () => {
    address_form.style.display = 'block';
})
$('.cancel_btn')?.addEventListener('click', () => {
    address_form.style.display = 'none';
})

document.addEventListener("DOMContentLoaded", function () {
    const formContainer = $(".form-container");
    const editButton = $(".edit_address");
    const cancelButton = $(".cancel_btn");

    editButton?.addEventListener("click", () => {
        overlay.classList.add("active");
    });
    cancelButton?.addEventListener("click", () => {
        overlay.classList.remove("active");
    });

    overlay?.addEventListener("click", () => {
        formContainer.style.display = "none";
        overlay.classList.remove("active");
    });
});

// Phan load trang 
const loader = $('.loader');

for (let i = 1; i <= 20; i++) {
    const span = document.createElement('span'); 
    span.style.setProperty('--stt', i); 
    loader?.appendChild(span); 
}

$('.checkout-btn')?.addEventListener('click', () => {

    $('.load_animation').style.display = 'flex';
    if(checkInfo()) {
        completedOrder();
    }

});

//checkout backend
$(".editProfileForm")?.addEventListener("submit", (e) => {
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
                $('.load_animation').style.display = 'none';
                window.location.href = "./success";
            } else if(response["status"] == "fall") {
                $('.load_animation').style.display = 'none';
                showToast(response["message"]);
            }
        }
    }
    xhr.send();
}

$(".checkout")?.addEventListener("click", () => {
    const product_id = parseInt($(".card").dataset.productId);
    const xhr = new XMLHttpRequest();
        xhr.open("POST", "./shoppingCart/addToCart/", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                const response = JSON.parse(this.response);
                if(response.stauts == "success") {
                    storeProductIdBeforCheckout([product_id]);
                } else if(response["status"] == "fall" && response["code"] == "45000") {
                    showToast("Quantity exceeds the allowed limit.")
                }
            }
        }
        xhr.send(JSON.stringify({"product_id": product_id}));
})

function checkInfo() {
    if (info_phoneNumber == "Not have your phone number yet" || info_address == "Not have your address yet") {
        showToast("You need update your information to check out!");
        return false;
    }
    return true;

}

function storeProductIdBeforCheckout(product_id_list) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./shoppingCart/storeProductIdBeforCheckout", true);
    xhr.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            if(this.response == 1) {
                console.log(this.response);
                window.location.href = "./checkout";
            }
        }
    }
    xhr.send(JSON.stringify(product_id_list));
}