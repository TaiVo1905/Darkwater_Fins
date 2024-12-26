const iconSetting = $$('.icon-setting'); 
const formEdit = $('.form-product-edit');  
const modal = new bootstrap.Modal(document.getElementById("confirmRedirectModal"));
iconSetting.forEach(icon => {
    icon.addEventListener('click', () => {
        formEdit.style.display = "block";
    });
});

$('#yes-button').addEventListener("click", (e) => {
    formEdit.style.display = "none";
})
$('#product_image').addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        $('#img-show').src = e.target.result; // Thay đổi ảnh
  
      };
      reader.readAsDataURL(file);
    
  
    }
  });
const cancelButton = $('#cancelButton');
cancelButton.addEventListener('click', () => {
    $('.form-product-edit').style.display = 'none'; 
});
let productId;
iconSetting.forEach(icon => {
    icon.addEventListener('click', () => {
        productId = icon.dataset.id; 
        const xhr = new XMLHttpRequest();
        xhr.open("POST", `Admin/showInfoProduct/${encodeURIComponent(productId)}`, true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                try {
                    const product = JSON.parse(xhr.responseText);
                    console.log("Product Data:", product);
                    console.log(product.product_name)
                    // document.querySelector('#productName').textContent = product.name;
                    $('#product_name').value = product.product_name;
                    $('#img-show').src = product.product_img_url;
                    $('#product_price').value = product.product_price                    ;
                    $('#product_quantity').value = product.product_stock;
                    $('#product_title').value = product.product_sub;
                    $('#product_description').value = product.product_description                    ;

                } catch (error) {
                    console.error("Error parsing JSON response:", error);
                }
            } else {
                console.log("Error");
            }
        }
        xhr.send();
    });
});


document.addEventListener("DOMContentLoaded", function () {
    // Lưu giá trị ban đầu của các input
    const inputValues = {
        productName: document.getElementById('product_name').value,
        productImage: document.getElementById('product_image').files[0], 
        productPrice: document.getElementById('product_price').value,
        productStock: document.getElementById('product_quantity').value,
        productSub: document.getElementById('product_title').value,
        productDescription: document.getElementById('product_description').value
    };

    const inputs = document.querySelectorAll('input, textarea');
    let isChanged = false;

    inputs.forEach(input => {
        input.addEventListener('input', function () {
            if (input.type === 'file') {
                if (input.files.length > 0 && input.files[0] !== inputValues.productImage) {
                    isChanged = true;
                }
            } else {
                if (input.value !== inputValues[input.name]) {
                    isChanged = true;
                }
            }
        });
    });

    const form = document.getElementById('form-product-edit');
    form.addEventListener('submit', function (e) {
        if (isChanged) {
            e.preventDefault();
            const product_name = $('#product_name').value;
            const product_price = $('#product_price').value;
            const product_sub = $('#product_title').value;
            const product_description = $('#product_description').value;
            const product_stock = $('#product_quantity').value;
            const product_image = $('#product_image').files[0];

            
            const formData = new FormData();
            formData.append("productId", productId);
            formData.append("productName", product_name);
            formData.append("image", product_image);
            formData.append("productPrice", product_price );
            formData.append("productSub", product_sub);
            formData.append("productDescription",product_description);
            formData.append("productStock",product_stock);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", `./admin/updateProduct/`, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                    if(Number(xhr.responseText) == 1){
                        
                        modal.show();
                    }
                }
            };
            xhr.send(formData);
        } else {
            console.log("not change"); 
            e.preventDefault(); 
            displayToast("Not Change");
        }
    });
});
function displayToast(message) {
    const toastLiveExample = document?.getElementById('liveToast');
    const toastBody = toastLiveExample.querySelector('.toast-body');
    toastBody.textContent = message;
  
    const toast = new bootstrap.Toast(toastLiveExample);
    toast.show();
  
    setTimeout(() => {
        toast.hide();
    }, 5000);
  }
