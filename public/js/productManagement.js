const iconSetting = $$('.icon-setting');  
const formEdit = $('.form-product-edit');  

iconSetting.forEach(icon => {
    icon.addEventListener('click', () => {
        formEdit.style.display = "block";
    });
});

const cancelButton = $('#cancelButton');  
cancelButton.addEventListener('click', () => {
    $('.form-product-edit').style.display = 'none';  
});


