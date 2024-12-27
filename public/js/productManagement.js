const iconSetting = document.querySelectorAll('.icon-setting'); 
const formEdit = document.querySelector('.form-product-edit');  

iconSetting.forEach(icon => {
    icon.addEventListener('click', () => {
        formEdit.style.display = "block";
    });
});

const cancelButton = document.getElementById('cancelButton');
cancelButton.addEventListener('click', () => {
    document.querySelector('.form-product-edit').style.display = 'none'; 
});