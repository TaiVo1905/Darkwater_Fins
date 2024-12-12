<?php 
// include '../components/bootStrapAndFontLink.php';
    function displayToast($message){
        return '<div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    <img src="./app/public/images/logo/Darkwater_Fins.png" class="rounded me-2" style = "width:30px; height:30px" alt="...">
                    <strong class="me-auto">Darkwater Fins</strong>
                    <small>5s</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                    '.$message.'
                    </div>  
                </div>
                </div>';
    }

?> 