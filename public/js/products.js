document.addEventListener('DOMContentLoaded', function () { 
    function fetchProducts(url, params, callback) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", url + "?" + new URLSearchParams(params).toString(), true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    let products = JSON.parse(xhr.responseText);
                    callback(products);
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    console.log("Response was:", xhr.responseText);
                }
            } else {
                console.error("Request failed with status: " + xhr.status);
            }
        };
        xhr.onerror = function () {
            console.error("Request failed with status: " + xhr.status);
        };
        xhr.send();
    }

    function displayProducts(products) {
        let productContainer = document.getElementById("product-container");
        productContainer.innerHTML = ''; 
        products.forEach(function (product) {
            let productElement = document.createElement("div");
            productElement.classList.add("col", "col-md-4", "col-sm-6", "item");
            productElement.innerHTML = `
                <div class="card" data-id="${product.product_id}">
                    <img src="${product.product_img_url}" alt="" class="card-img-top">
                    <div class="icon-overlay">
                        <i class="bi bi-cart-plus"></i>
                        <a href="products/detail/${product.product_id}">
                            <i class="bi bi-link"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${product.product_name}</h5>
                        <p class="card-text">${product.product_sub}</p>
                        <div class="fish-price">$${product.product_price}</div>
                    </div>
                </div>
            `;
            productContainer.appendChild(productElement);
        });
    }

    // Get the product type from the current page URL
    const urlPath = window.location.pathname;
    let type = "";
    if (urlPath.split('/')[3] == "aquariums") {
        type = "Aquarium"; // "aquarium", "fishfood", or "fish"
    } else if (urlPath.split('/')[3] == "fishFoods") {
        type = "Fish Food";
    } else if (urlPath.split('/')[3] == "fishes") {
        type = "Fish";
    }
    console.log(type);
    document.getElementById('filterBtn').addEventListener('click', function () {
        let selectedPrice = document.getElementById('priceRange').value;
        fetchProducts("Products/filterByPrice", { price: selectedPrice, type: type }, displayProducts);
    });

    document.getElementById('sortSelect').addEventListener('change', function () {
        let sortBy = this.value;
        fetchProducts("Products/sortProducts", { sort: sortBy, type: type }, displayProducts);
    });

    document.querySelectorAll('.form-check-input').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            let selectedCategories = [];
            document.querySelectorAll('.form-check-input:checked').forEach(function (checkedCheckbox) {
                selectedCategories.push(checkedCheckbox.value);
            });
            fetchProducts("Products/filterByCategory", { categories: JSON.stringify(selectedCategories), type: type }, displayProducts);
        });
    });
});
