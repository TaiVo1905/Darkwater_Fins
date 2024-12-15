const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const priceRange = document.getElementById("priceRange");
const selectedPrice = document.getElementById("selectedPrice");
priceRange.addEventListener("input", function () {
    selectedPrice.textContent = "$" + priceRange.value;
});

const categories = $$(".checkbox-category input[type=checkbox]");
console.log(categories)
categories.forEach(item => {
    item.addEventListener("click", () => {
        if(item.checked) {
            console.log(1)
        } else {
            console.log(2)

        }
    })
});