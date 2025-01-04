<?php 
    function showBanner($namePage, $router) {
        return '<div class="sub-header">
                    <div class="name-page">
                        <h1 class="sub-header-title">'.$namePage.'</h1>
                        <div>
                        <a class = "router" href = "'. $router[0]. '">Home</a>
                            <b class="wall-letter">/</b>
                        <span class = "router">'.ucfirst($router[1]).'</span>
                        </div>
                    </div>
                    <div class="header-overlay">
                    </div>
                </div>';
    };
?>
    
    
