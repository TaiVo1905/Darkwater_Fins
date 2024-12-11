<?php
function createFish($fishImage, $fishName, $fishSub, $fishPrice) {
    $html = "
        <div class='col-lg-3 col-md-4 col-sm-6'>
            <div class='card'>
                <img src='$fishImage' alt='$fishName' class='card-img-top'>
                <div class='icon-overlay'>
                    <i class='bi bi-cart-plus'></i>
                    <i class='bi bi-link'></i>
                </div>
                <div class='card-body'>
                    <h5 class='card-title'>$fishName</h5>
                    <p class='card-text'>$fishSub</p>
                    <div class='fish-price'>$$fishPrice</div>
                </div>
            </div>
        </div>
    ";
    return $html;
}
?>
