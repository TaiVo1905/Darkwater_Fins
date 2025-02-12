const itemCarts = $$(".shoppingCart tr");
const countCart = $(".countCart");

itemCarts?.forEach(item => {
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
addToCartFunction(addToCarts);

//select add-to-cart-icon
function addToCartFunction(addToCarts) {
    addToCarts.forEach(addToCart => {
        addToCart.addEventListener("click", (e) => {
            checkLogin("You need to log in to add products to the cart.")
                .then((response)=> {
                    if(response) {
                        const product_id = parseInt(e.target.closest(".card").dataset.productId);
                        const product_name = e.target.closest(".card").querySelector(".card-title").innerText;
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "./shoppingCart/addToCart/", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function() {
                            if(this.readyState == 4 && this.status == 200) {
                                const response = JSON.parse(this.response);
                                console.log(this.response)
                                if(response.status == "success") {
                                    showToast("Add "+product_name+" successfully!");
                                }else if(response["status"] == "fall" && response["code"] == "45000") {
                                    showToast("Quantity exceeds the allowed limit.")
                                }
                            }
                        }
                        xhr.send(JSON.stringify({"product_id": product_id, "quantity": 1}));
                    }
                })
                .catch((error) => {
                    console.error(error);
                })
        })
    })
}

//Change item quantity in user cart
async function changeQuantityCart(product_id, quantity) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./ShoppingCart/changeQuantityCart/", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            const response = JSON.parse(this.response);
            console.log(response)
            if(response["status"] == "fall" && response["code"] == "45000") {
                showToast("Quantity exceeds the allowed limit.")
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

// checkout
function checkedItemList() {
    const product_id_list = [];
    itemCarts.forEach( itemCart => {
        const inputCheckbox = itemCart.querySelector(".form-check-input");
        if (inputCheckbox.checked == true) {
            const product_id = parseInt(itemCart.querySelector("td:nth-child(3) span").dataset.productId);
            product_id_list.push(product_id);
        }
    })
    return product_id_list;
}


$(".checkout")?.addEventListener("click", () => {
    const product_id_list = checkedItemList();
    if(product_id_list.length == 0){
        showToast("Please choose product before checkout!");
        return;
    }
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./checkout/storeProductIdBeforeCheckout", true);
    xhr.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            if(this.response == 1) {
                window.location.href = "./checkout";
            }
        }
    }
    xhr.send(JSON.stringify(product_id_list));
})