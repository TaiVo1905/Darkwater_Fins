<?php
    function renderUserComment($user_img_url, $user_name, $dateCreate, $commentContent) {
        return "
            <div class='card-body p-4'>
                <div class='d-flex flex-start'>
                    <img class='rounded-circle shadow-1-strong me-3'
                    src='$user_img_url' alt='avatar' width='60'
                    height='60' />
                    <div>
                        <h6 class='fw-bold mb-1'>$user_name</h6>
                        <div class='d-flex align-items-center mb-3'>
                            <p class='mb-0'>$dateCreate</p>
                        </div>
                        <p class='mb-0'>
                            $commentContent
                        </p>
                    </div>
                </div>
            </div>

            <hr class='my-0' />
        ";
    }
?>