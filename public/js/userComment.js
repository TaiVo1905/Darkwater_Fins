const postBtn = $("#comment-box button");
const commentBox = $("#comment-box");
const productDetail = $(".product-detail");
let commentArea = $("#comment-area");
postBtn.addEventListener("click", () => {
    const commentContent = $("#commentContent");
    console.log(commentBox.querySelector("img").src)
    if(commentContent.value != '') {
        postComment(commentContent.dataset.userId, productDetail.dataset.productId, commentContent.value, commentBox.querySelector('#userName').innerHTML, commentBox.querySelector("img").src);
    } else {
        showToast("Please enter something!");
        console.log(Date.now());
    }
})

function postComment(user_id, product_id, commentContentValue, userName, userImgUrl) {
    const formData = new FormData();
    formData.append("user_id", user_id);
    formData.append("product_id", product_id);
    formData.append("comment_content", commentContentValue);
    const date = new Date();
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();
    const dateString = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
    formData.append("date_create", dateString);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", `products/postComment`, true);
    xhr.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            if(this.response == 1) {
                if(commentArea == null) {
                    $("#reviews > span").innerHTML = "<div class='card text-body' id='comment-area'></div>";
                }
                commentArea = $("#comment-area");
                commentArea.innerHTML += `
                                    <div class='card-body p-4'>
                                        <div class='d-flex flex-start'>
                                            <img class='rounded-circle shadow-1-strong me-3'
                                            src='${userImgUrl}' alt='avatar' width='60'
                                            height='60' />
                                            <div>
                                                <h6 class='fw-bold mb-1'>${userName}</h6>
                                                <div class='d-flex align-items-center mb-3'>
                                                    <p class='mb-0'>${dateString}</p>
                                                </div>
                                                <p class='mb-0'>
                                                    ${commentContentValue}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class='my-0' />
                `
                $("#reviews-tab").innerHTML = `REVIEW(${$$("#comment-area > div").length})`;
                $("#commentContent").value = "";
            } else {
                showToast("There is an error. Please try again!");
            }
        }
    }
    xhr.send(formData);
}