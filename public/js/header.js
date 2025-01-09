// import { checkLogin } from "./public/js/define.js";
window.addEventListener('scroll', function() {
    var header = $('.header_container');
    if (window.scrollY < 80) {
        if (!window.location.href.includes("contactUs") || !window.location.href.includes("aboutUs")) {
            return;
        }
        header.classList.remove('scrolled');
        // Cuộn xuống
    } else {
        header.classList.add('scrolled');
        // Cuộn lên
    }
});

//Define
const cartIcon = $(".shoppingCart");


//Function
function navigatorCart() {
    window.location.href = "./shoppingCart/";
}
//Event
cartIcon.addEventListener("click", () => {
    checkLogin("You need log in before view your cart")
        .then (response => {
            console.log(response)
            console.log("a")
            if(response) {
                navigatorCart();
            }
        })
        .catch((error) => {
            console.error(error);
        })
})