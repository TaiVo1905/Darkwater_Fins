<div class="header_container">
    <div class="header">
        <div class="logo">
            <img class="img_logo" src="./app/public/images/logo/Darkwater_Fins.png" alt="">
        </div>
        <div class="nav_text">
            <p>Home</p>
            <p>Aquarium</p>
            <p>Fish Food</p>
            <p>Fish</p>
            <p>About us</p>
        </div>
        <div class="icon_header">
            <div class="search-container icon-header-search">
                <i class="bi bi-search"></i>
                <input type="text" class="search-input" placeholder="Search...">
            </div>
            <i class="bi bi-bag-plus"></i>
            <i class="bi bi-person"></i>
            <div class="dropdown-menu" id="dropdown-menu">
                <?php
                    session_start();
                    if(isset($_SESSION["user_id"])) {
                        echo '
                                <div style="background-color: black;border-radius: 20px;margin-bottom: 5px;">
                                    <a href="Profile">Profile</a>
                                </div>
                                <div style="background-color: black;border-radius: 20px;margin-bottom: 5px;">
                                    <a href="#">Change password</a>
                                </div>
                                <div style="background-color: black;border-radius: 20px;">
                                    <a href="LogOut">Log out</a>
                                </div>
                        ';
                    } else {
                        echo '
                                <div style="background-color: black;border-radius: 20px;margin-bottom: 5px;">
                                    <a href="LogIn">Sign in</a>
                                </div>
                                <div style="background-color: black;border-radius: 20px;">
                                    <a href="Register">Sign up</a>
                                </div>
                        ';
                    }
                    ?>
            </div>
        </div>
    </div>
</div>