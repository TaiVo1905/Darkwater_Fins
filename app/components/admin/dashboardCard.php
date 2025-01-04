<?php
    function createDashboardCard($title, $subTitle, $icon) {
        return "
            <div class='card d-flex flex-row' style='width: 10rem;'>
                <div class='w-75 d-flex flex-column justify-content-center align-items-center'>
                    <span class='fw-bold'>$title</span>
                    <span class='fw-semibold'>$subTitle</span>
                </div>
                <div>
                    <i class='bi bi-0-circle-fill d-inline-block fs-2 p-2 w-100 h-100'></i>
                    $icon
                </div>
            </div>
        ";
    }
?>