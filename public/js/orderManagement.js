let orderId = null;

      const confirm_btn = document.querySelectorAll(".confirm-btn");
      confirm_btn.forEach((btn) => {
        btn.addEventListener("click", () => {
          orderId = btn.parentElement.parentElement.dataset.orderId;
          const modal = new bootstrap.Modal(
            document.getElementById("confirmationModal")
          );
          modal.show();
        });
      });
      document.getElementById("confirmButton").addEventListener("click", function () {
          if (orderId !== null) {
            document.getElementById(`status-${orderId}`).innerText = "Shipping";
          }
          const modal = bootstrap.Modal.getInstance(document.getElementById("confirmationModal"));
          modal.hide();
        });

      // xóa
      const delete_btn = document.querySelectorAll(".icon-delete");
      delete_btn.forEach((btn) => {
        btn.addEventListener("click", () => {
          orderId = btn.parentElement.parentElement.dataset.orderId;
          const modal = new bootstrap.Modal(document.getElementById("confirdeleteModal"));
          modal.show();
        });
      });
      document
        .getElementById("deleteButton")
        .addEventListener("click", function () {
          if (orderId !== null) {
            document.getElementById(`status-${orderId}`).parentElement.remove();
          }
          const modal = bootstrap.Modal.getInstance(
            document.getElementById("confirdeleteModal")
          );
          modal.hide();
        });

        // show order detail
        document.addEventListener("DOMContentLoaded", () => {
        const orderDetail = document.querySelector(".order-detail");
        const tableRows = document.querySelectorAll(".table-body-order tr");

        tableRows.forEach((row) => {
          row.addEventListener("click", () => {
            orderId = row.dataset.orderId;
            document.getElementById("order-id").innerText = orderId;
            document.getElementById("user-name").innerText = row.children[1].innerText;
            document.getElementById("phone-number").innerText = row.children[2].innerText;
            document.getElementById("order-date").innerText = row.children[3].innerText;
            document.getElementById("total-price").innerText = row.children[4].innerText;
            document.getElementById("order-status").innerText = row.children[5].innerText;

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