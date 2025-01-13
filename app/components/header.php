<div class="header_container">
    <div class="header">
        <a href="home">
            <div class="logo">
                <img class="img_logo" src="./public/images/logo/Darkwater_Fins.png" alt="">
            </div>
        </a>
        <div class="nav_text">
            <p><a href="home">Home</a></p>
            <p><a href="products/aquariums">Aquarium</a></p>
            <p><a href="products/fishFoods">Fish Food</a></p>
            <p><a href="products/fishes">Fish</a></p>
            <p><a href="home/aboutUs">About us</a></p>
        </div>
        <div class="icon_header">
            <div class="search-container icon-header-search">
                <i class="bi bi-search"></i>
                <form method="GET" action="Products/search">
                    <input type="text" class="search-input" name="search_query" placeholder="Search...">
                </form>
            </div>
            <i class="bi bi-bag-plus shoppingCart"></i>
            <i class="bi bi-person"></i>
            <div class="dropdown-menu" id="dropdown-menu">
                <?php
                if (isset($_SESSION["user_id"])) {
                    echo '
                            <div style="background-color: black;border-radius: 20px;margin-bottom: 5px;">
                                <a href="Users">Profile</a>
                            </div>
                            <div style="background-color: black;border-radius: 20px;">
                                <a href="Users/logOut">Log out</a>
                            </div>
                        ';
                } else {
                    echo '
                            <div style="background-color: black;border-radius: 20px;margin-bottom: 5px;">
                                <a href="Users/SignIn">Sign in</a>
                            </div>
                            <div style="background-color: black;border-radius: 20px;">
                                <a href="Users/SignUp">Sign up</a>
                            </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</div>