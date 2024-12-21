<?php
    function renderOrderItems($order_id, $order_status, $produc_img_url, $product_name, $product_category, $quantity, $product_price, $total){
        return "<div class='border mb-3 order-item'>
                    <div class='d-flex justify-content-end p-2 '>
                        <span class='text-primary'>$order_status</span>
                    </div>
                    <div class='d-flex p-3 border-top my-3'>
                        <img src='$produc_img_url' alt='Fish' style='width: 80px; height: 80px;' class='me-3 rounded'>
                        <div class='flex-grow-1 '>
                            <h5 class='mb-1'>$product_name</h5>
                            <p class='mb-1 text-muted'>Category:$product_category</p>
                            <small>$quantity</small>
                        </div>
                        <div class='text-end'>
                            <span class='fw-bold'>$$product_price</span>
                        </div>
                    </div>
                    <div class='border-top p-3 d-flex flex-column align-items-end '>
                        <span class='fw-bold pb-3'>Total: $$total</span>
                        <button class='cancel-btn btn btn-primary btn-sm rounded-0' data-order-id='$order_id'>Cancel</button>
                    </div>
                </div>";
    }
?>