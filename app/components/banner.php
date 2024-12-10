
    <?php 
        function showBanner($namePage, $router) {
            return '<div class="sub-header">
                        <div class="name-page">
                            <h1 class="sub-header-title">'.$namePage.'</h1>
                            <a class = "router" href = "'. $router[0]. '">Home</a>
                                <b class="wall-letter">/</b>
                            <a class = "router" href = "'. $router[1]. '">'.ucfirst($router[1]).'</a>
                        </div>
                        <div class="header-overlay">
                        </div>
                    </div>';
        };
    ?>
    
    
