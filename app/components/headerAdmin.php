<?php
function generateDashboard($hideClass , $orders, $money, $productsSold, $pageName) {
    return "
        <div class='container-fluid bg-primary text-white p-3'>
            <div class='d-flex justify-content-end align-items-center' id='Dashboard'>
                <div class='dash_board'>
                    <a href='./admin/' style='color: white'><i class='bi bi-house-door'></i></a><span>/ </span>$pageName
                </div>
                <div class='d-flex align-items-center icon_i'>
                    <div class='search-input'>
                        <i class='bi bi-search'></i>
                        <input type='text' class='form-control me-4' placeholder='Type here...' style='width: 300px;'>
                    </div>
                    <i class='bi bi-bell me-3'></i>
                    <i class='bi bi-person-circle'></i>
                    <div class='dropdown-menu' id='dropdown-menu'>
                        <div style='background-color: black;border-radius: 20px;'>
                            <a href='Users/logOut'>Log out</a>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class='mt-3'>$pageName</h3>
            <div class='d-flex justify-content-end flex-wrap gap-5 $hideClass'>
                <div class='bg-white text-dark p-3 rounded card-header'>
                    <div class='d-flex align-items-center'  style='position:relative;'>
                        <div>Total Orders</div>
                        <div class='icon-box bg-success text-white me-2'>
                            <i class='bi bi-basket icon_pr'></i>
                        </div>
                    </div>
                    <div>$orders</div>
                </div>
                <div class='bg-white text-dark p-3 rounded card-header'>
                    <div class='d-flex align-items-center' style='position:relative;'>
                        <div>Today's Money</div>
                        <div class='icon-box bg-danger text-white me-2'>
                            <i class='bi bi-cash icon_pr'></i>
                        </div>
                    </div>
                    <div>$$money</div>
                </div>
                <div class='bg-white text-dark p-3 rounded card-header'>
                    <div class='d-flex align-items-center'  style='position:relative;'>
                        <div>Products Sold</div>
                        <div class='icon-box bg-info text-white me-2'>
                            <i class='bi bi-upc icon_pr'></i>
                        </div>
                    </div>
                    <div>$productsSold</div>
                </div>
            </div>
        </div>
    ";
}
?>