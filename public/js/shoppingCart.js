const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const dashQuantity = $(".dashQuantity");
const plusQuantity = $(".plusQuantity");
const itemQuantity = $(".quantity");

dashQuantity.addEventListener("click", () => {
    const quantity = parseInt(itemQuantity.innerText) - 1;
    itemQuantity.innerText = quantity;
    
    console.log(1);
})

plusQuantity.addEventListener("click", () => {
    const quantity = parseInt(itemQuantity.innerText) + 1;
    itemQuantity.innerText = quantity;

    console.log(2);

})