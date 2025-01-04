document.addEventListener('DOMContentLoaded', function () { 
    function fetchProducts(url, params, callback) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", url + "?" + new URLSearchParams(params).toString(), true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    let products = JSON.parse(xhr.response);
                    callback(products);
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    console.log("Response was:", xhr.response);
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
        let productContainer = $("#product-container");
        productContainer.innerHTML = '';
        console.log(products)
        products.forEach(function (product) {
            let productElement = document.createElement("div");
            productElement.classList.add("col", "col-md-4", "col-sm-6", "item");
            productElement.innerHTML = `
                <div class="card" data-product-id="${product.product_id}">
                    <img src="${product.product_img_url}" alt="" class="card-img-top">
                    <div class="icon-overlay">
                        <i class="bi bi-cart-plus add-to-cart"></i>
                        <a href="products/${product.product_type} == 'Fish' ? 'fishes' : product.product_type == 'Fish Food' ? 'fishfoods' : 'aquariums'}/${product.product_id}">
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
        const addToCarts = $$(".add-to-cart");
        addToCartFunction(addToCarts);
        const pagination = $(".pagination");
        pagination.innerHTML = "";
        for(let i = 1; i <= Math.floor((products.length / 6 + 1)); i++) {
            pagination.innerHTML += `<li class='page-item'><a class='page-link' data-page='${i}'>${i}</a></li>`;
        }
        const pageLinks = $$(".page-link[data-page]");
        const itemsPerPage = 6;
        const items = $$(".item");
        preparepagination(pageLinks, items, itemsPerPage);
        $(".page-link[data-page='1']").click();
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
    $('#filterBtn').addEventListener('click', function () {
        let selectedPrice = $('#priceRange').value;
        fetchProducts("Products/filterByPrice", { price: selectedPrice, type: type }, displayProducts);
    });

    $('#sortSelect').addEventListener('change', function () {
        let sortBy = this.value;
        fetchProducts("Products/sortProducts", { sort: sortBy, type: type }, displayProducts);
    });

    $$('.form-check-input').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            let selectedCategories = [];
            $$('.form-check-input:checked').forEach(function (checkedCheckbox) {
                selectedCategories.push(checkedCheckbox.value);
            });
            if(selectedCategories.length == 0) {
                $$('.form-check-input').forEach(function (checkedCheckbox) {
                    selectedCategories.push(checkedCheckbox.value);
                });
            }
            fetchProducts("Products/filterByCategory", { categories: JSON.stringify(selectedCategories), type: type }, displayProducts);
        });
    });
});
