let orderId = null;

document.addEventListener("DOMContentLoaded", () => {
  const orderDetail = $(".order-detail");
  const tableRows = $$(".table-body-order tr");

  tableRows.forEach((row) => {
    row.addEventListener("click", (e) => {
      if(!e.target.closest("td:nth-child(6)")) {
        let html = "";
        orderId = parseInt(row.dataset.orderId);
        getOrderById(orderId)
        .then(response => {
          console.log(response);
          response.forEach( (res, i) => {
            html += `
            <tr>
              <td>${i+1}</td>
              <td>${res.product_name}</td>
              <td>${res.quantity}</td>
              <td>$${res.product_price}</td>
              <td>$${res.quantity * res.product_price}</td>
            </tr>
          `;
          })
          $("#order_details").innerHTML = html;
          $("#order-id").innerText = orderId;
          $("#user-name").innerText = response[0].receiver;
          $("#phone-number").innerText = response[0].phone_number;
          $("#address").innerText = response[0].address;
          $("#order-date").innerText = response[0].order_date;
          $("#total-price").innerText = response[0].total_price;
        orderDetail.classList.add("visible");
        })
        .catch( error => {
          console.log(error);
        })
      }
    });
  });

  document.addEventListener("click", (e) => {
    if (!orderDetail.contains(e.target) && !e.target.closest(".table-body-order tr")) {
      orderDetail.classList.remove("visible");
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      orderDetail.classList.remove("visible");
    }
  });
});

const icon_confirms = $$(".icon-confirm");
icon_confirms.forEach((confirm) => {
  confirm.addEventListener("click", (e) => {
    orderId = parseInt(confirm.parentElement.parentElement.dataset.orderId);
    const modal = new bootstrap.Modal($("#confirmationModal"));
    modal.show();
    e.stopPropagation();
  });
});

$(".confirm-btn")?.addEventListener("click", (e) => {
  const modal = new bootstrap.Modal($("#confirmationModal"));
  modal.show();
  e.stopPropagation();
})

$("#confirmButton")?.addEventListener("click", function () {
  if (orderId !== null) {
      changeOrderStatus(orderId, "shipping", "Confirm successfully!");
  }
  const modal = bootstrap.Modal.getInstance($("#confirmationModal"));
  modal.hide();
});

function changeOrderStatus(orderId, orderStatus, inform) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./admin/changeOrderStatus", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      response = JSON.parse(this.response);
      if(response == 1) {
        $(`tr[data-order-id = '${orderId}']`).remove();
        showToast(inform);
      } else {
        showToast("An error has occurred!");
      }
    }
  }
  xhr.send(JSON.stringify({"order_id": orderId, "orderStatus": orderStatus}));
}

function getOrderById(orderId) {
  return new Promise ((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "./admin/getOrderById/" + encodeURIComponent(orderId), true);
    xhr.onreadystatechange = function() {
      if(this.readyState == 4) {
        if(this.status == 200) {
          resolve(JSON.parse(this.response));
        } else {
          reject(JSON.parse(this.response));
        }
      }
    }
    xhr.send();
  })
}

const icon_cancels = $$(".icon-cancel");
icon_cancels.forEach((icon) => {
  icon.addEventListener("click", () => {
    orderId = parseInt(icon.parentElement.parentElement.dataset.orderId);
    const modal = new bootstrap.Modal($("#confirmRejectionModal"));
    modal.show();
  });
});

$("#rejection_btn")?.addEventListener("click", () => {
  if (orderId !== null) {
    changeOrderStatus(orderId, "canceled", "reject the order successfully!");
}
const modal = bootstrap.Modal.getInstance($("#confirmRejectionModal"));
modal.hide();
});


