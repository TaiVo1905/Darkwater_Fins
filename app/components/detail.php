<?php
function displayProductCard($id, $img_url,$product_description, $product_price, $product_sub, $product_category)
{
    $html = "
        <div class='card mb-3' style='max-width: 1260px; border: none;'>
            <div class='row g-5 align-items-center'>
                <div class='col-md-4'>
                    <img src='$img_url' class='img-fluid rounded-start' alt='Product Image'>
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                        <p class='price'>$$product_price</p>
                        <p class='card-text'>
                            $product_sub
                        </p>
                        <div class='d-flex align-items-center mb-4'>
                            <input type='number' value='1' min='1'>
                            <button class='btn btn-primary'>BUY NOW</button>
                        </div>
                        <h5 class='card-title'><span>CATEGORY:</span> $product_category</h5>
                        <h5 class='card-title'><span>PRODUCT ID:</span> $id</h5>
                    </div>
                </div>
            </div>
        </div>
        <ul class='nav nav-tabs'>
            <li class='nav-item'>
                <a class='nav-link active' id='description-tab' data-bs-toggle='tab' href='#description'>DESCRIPTION</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' id='reviews-tab' data-bs-toggle='tab' href='#reviews'>REVIEWS (0)</a>
            </li>
        </ul>
        <div class='tab-content'>
            <div class='tab-pane fade show active' id='description'>
                <p>$product_description</p>
            </div>
            <div class='tab-pane fade' id='reviews'>
                <p>No reviews yet. Be the first to write a review!</p>
            </div>
        </div>";
    return $html;
}
