const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// Hiện thị tôn báo alert
function showToast(message) {
    const toastLive = $('#liveToast');
    $(".toast-body").innerText = message;
    
    const toast = new bootstrap.Toast(toastLive);
    toast.show();
    setTimeout(() => {
      toast.hide();
    }, 5000);
}

function checkLogin(message) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./Login/checkLogin/", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    if (this.response == 0) {
                        showToast(message);
                        resolve(false);
                    } else {
                        resolve(true);
                    }
                } else {
                    reject(this.status);
                }
            }
        };

        xhr.send();
    });
}


