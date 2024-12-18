<?php
    function displayItemCard($id, $img_url, $product_name, $product_title, $product_price){
        return " <div class='col col-md-4 col-sm-6 item'>
                    <div class='card' data-product-id='$id'>
                        <img src='$img_url'
                            alt='' class='card-img-top'>
                        <div class='icon-overlay'>
                            <i class='bi bi-cart-plus add-to-cart'></i>
                            <i class='bi bi-link'></i>
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_name</h5>
                            <p class='card-text'>$product_title</p>
                            <div class='fish-price'>$$product_price</div>
                        </div>
                    </div>
                </div>";
    }
?>