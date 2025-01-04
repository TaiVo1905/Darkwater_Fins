const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const imageContainer = $('.image-container');
const fileInput = $('.file-input');
const img = $('#img-product');


// Thay đổi ảnh khi user đổi
fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
        img.src = e.target.result;
        };
        reader.readAsDataURL(file);
        img.style.display = "block";
    }
});

const modal = new bootstrap.Modal(document.getElementById("confirmRedirectModal"));

$('#no-button').addEventListener("click", (e) => {
    window.location.href = "admin/productManagement";
});
$('#yes-button').addEventListener("click", (e) => {
    $('#productName').value = "";
    $$('input[name="choice"]:checked').forEach(radio => {
        radio.checked = false;
    });
    $('#productPrice').value = "";
    $('#productSub').value = "";
    $('#productDescription').value = "";
    $('#productStock').value = "";
    $('#productCategory').value = "";
});
document.getElementById("save-btn").addEventListener("click", function(event){
    event.preventDefault();
    
    const product_name = $('#productName').value;
    const product_type = $('input[name="choice"]:checked').value;
    const product_price = $('#productPrice').value;
    const product_sub = $('#productSub').value;
    const product_description = $('#productDescription').value;
    const product_stock = $('#productStock').value;
    const product_category = $('#productCategory').value;

    const formData = new FormData();
    formData.append("productName", product_name);
    formData.append("image", fileInput.files[0]);
    formData.append("choice",product_type);
    formData.append("productPrice", product_price );
    formData.append("productSub", product_sub);
    formData.append("productDescription",product_description);
    formData.append("productStock",product_stock);
    formData.append("productCategory",product_category);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", `./admin/handelAddProduct/`, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            modal.show();
        }
    };
    xhr.send(formData);

})