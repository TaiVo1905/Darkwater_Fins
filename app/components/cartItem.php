<?php
    function createCartItem ($product_id, $product_name, $product_img_url, $product_type, $quantity, $product_price) {
        return "
            <tr>
                <td style='width: 2%'>
                    <input type='checkbox' class='form-check-input' checked>
                </td>
                <td style='width: 15%'>
                    <img class='rounded' src='$product_img_url' style='with: 100px; height:100px;'>
                </td>
                <td>
                    <span class='fw-bold' data-product-id='$product_id'>$product_name</span><br>
                    <small class='text-muted'>$product_type</small>
                </td>
                <td class='text-center'>
                    <button class='btn btn-sm btn-light dashQuantity'><i class='bi bi-dash'></i></button>
                    <span class='mx-2 quantity'>$quantity</span>
                    <button class='btn btn-sm btn-light plusQuantity'><i class='bi bi-plus'></i></button>
                </td>
                <td class='text-center'>$<span>" . $product_price * $quantity . "</span></td>
                <td style='width: 2%'>
                    <i class='bi bi-x-lg text-danger'></i>
                </td>
            </tr>
        ";
    }
?>