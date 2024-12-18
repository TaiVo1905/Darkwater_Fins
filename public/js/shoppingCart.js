

const itemCarts = $$(".shoppingCart tr");
const countCart = $(".countCart");

itemCarts.forEach(item => {
    const itemQuantity = item.querySelector(".quantity");
    const product_id = parseInt(item.querySelector("td:nth-child(3) span").dataset.productId);
    const removeIcon = item.querySelector("td:nth-child(6) i");
    const price = item.querySelector("td:nth-child(5) span");
    item.querySelector(".dashQuantity").addEventListener("click", () => {
        const quantity = parseInt(itemQuantity.innerText) - 1;
        if(quantity <= 0) {
            showToast("The limit has been reached!");
        } else {
            price.innerText = ((parseFloat(price.innerText)/parseInt(itemQuantity.innerText))*quantity).toFixed(2);
            itemQuantity.innerText = quantity;
            changeQuantityCart(product_id, quantity);
            countItems();
        }
    });

    item.querySelector(".plusQuantity").addEventListener("click", () => {
        const quantity = parseInt(itemQuantity.innerText) + 1;
        if(quantity > 10) {
            showToast("The limit has been reached!");
        } else {
            price.innerText = ((parseFloat(price.innerText)/parseInt(itemQuantity.innerText))*quantity).toFixed(2);
            itemQuantity.innerText = quantity;
            changeQuantityCart(product_id, quantity);
            countItems();
        }
    });

    removeIcon.addEventListener("click", () => {
        removeCart(product_id);
        item.remove();
        countItems();
    })
});

const addToCarts = $$(".add-to-cart");

addToCarts.forEach(addToCart => {
    addToCart.addEventListener("click", (e) => {
        const product_id = parseInt(e.target.closest(".card").dataset.productId);
        const product_name = e.target.closest(".card").querySelector(".card-title").innerText;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./shoppingCart/addToCart/", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                if(this.response == 1) {
                    showToast("Add "+product_name+" successfully!");
                };
            }
        }
        xhr.send(JSON.stringify({"product_id": product_id}));
    })
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

//Change item quantity in user cart
async function changeQuantityCart(product_id, quantity) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./ShoppingCart/changeQuantityCart/", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            if(this.response) {
                console.log("a");
            }
        }

    }
    xhr.send(JSON.stringify({"product_id": product_id, "quantity": quantity}))
}

//remove cart
async function removeCart(product_id) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./ShoppingCart/removeCart/", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.response);
        }
    }
    xhr.send(JSON.stringify({"product_id": product_id}));
}

//Đếm sản phẩm
async function countItems() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "./shoppingCart/countItems/", true);
    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            if(this.response) {
                countCart.innerText = this.response;
            } else {
                countCart.innerText = 0;
            }
        }
    }
    xhr.send();
}