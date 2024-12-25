let orderId = null;

const confirmBtns = $$(".confirm-btn");
confirmBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    orderId = btn.parentElement.parentElement.dataset.orderId;
    const modal = new bootstrap.Modal($("#confirmationModal"));
    modal.show();
  });
});

$("#confirmButton").addEventListener("click", function () {
  if (orderId !== null) {
    $(`#status-${orderId}`).innerText = "Shipping";
  }
  const modal = bootstrap.Modal.getInstance($("#confirmationModal"));
  modal.hide();
});


const deleteBtns = $$(".icon-delete");
deleteBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    orderId = btn.parentElement.parentElement.dataset.orderId;
    const modal = new bootstrap.Modal($("#confirdeleteModal"));
    modal.show();
  });
});

$("#deleteButton").addEventListener("click", function () {
  if (orderId !== null) {
    $(`#status-${orderId}`).parentElement.remove();
  }
  const modal = bootstrap.Modal.getInstance($("#confirdeleteModal"));
  modal.hide();
});


document.addEventListener("DOMContentLoaded", () => {
  const orderDetail = $(".order-detail");
  const tableRows = $$(".table-body-order tr");

  tableRows.forEach((row) => {
    row.addEventListener("click", () => {
      orderId = row.dataset.orderId;
      $("#order-id").innerText = orderId;
      $("#user-name").innerText = row.children[1].innerText;
      $("#phone-number").innerText = row.children[2].innerText;
      $("#order-date").innerText = row.children[3].innerText;
      $("#total-price").innerText = row.children[4].innerText;
      $("#order-status").innerText = row.children[5].innerText;

      orderDetail.classList.add("visible");
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
