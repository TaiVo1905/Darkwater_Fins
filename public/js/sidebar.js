
const priceRange = $("#priceRange");
const selectedPrice = $("#selectedPrice");
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