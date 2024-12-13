const priceRange = document.getElementById("priceRange");
const selectedPrice = document.getElementById("selectedPrice");
priceRange.addEventListener("input", function () {
    selectedPrice.textContent = "$" + priceRange.value;
});