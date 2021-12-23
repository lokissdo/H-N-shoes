
<head>
    <link rel="stylesheet" href="asset/header.css">
</head>
<body>
<header>
        <div class="header__top">
            <div class="wrapper_header__top">
                <div class="items_top_header top_header_left">
                    <div class=" sign signup">
                        <a href="./signup.php" >
                            <div class="sign__text">
                                Đăng ký
                            </div>
                        </a>
                    </div>
                    <div class="sign signin"> 
                        <a href=
                        <?php
                          require_once "api/authenticate.php";
                         if (Authenticate()){
                            echo "\"./signout.php\"";
                        }else echo  "\"./login.php\"";
                        ?> >
                            <div class="sign__text">
                            <?php
                            if (Authenticate()){
                                echo "Đăng xuất";
                            }
                            else echo "Đăng nhập";
                            ?>  
                            </div>
                        </a> 
                    </div>
                </div>
                <div class="items_top_header top_header_mid">
                    <a href="#" >
                        <div class="header_mid_text">
                            SNEAKER
                        </div>
                    </a>
                </div>
                <div class="items_top_header top_header_right">
                    <div class="search">
                        <form class="search_form"action="./Process/search.php" method="GET">
                            <!-- <label for="fname">Anh:</label><br> -->
                            <input type="text" placeholder="   Tìm kiếm"class="search_input"id="search" name="search" ><br>
                            <button id="search_form_button"class="search_form_button" type="submit"></button>
                        </form>
                    </div>
                    <div class="cart">
                        <a href="./cart.php" >
                        
                           
                            <img src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/40/000000/external-cart-essentials-icongeek26-linear-colour-icongeek26.png"/>
                            <div class="cart_text">
                                <?php 
                                if(isset($_COOKIE['quantity'])&&  isset($_SESSION['cart']))                              
                                echo $_COOKIE['quantity'];
                                else echo 0;
                                ?> 
                            </div>
                        </a>
                        <div class="cart_label"></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="header__bot">
            <div class="wrap_items_header">
                <a href="./"class="items_header_bot 
                    <?php if (!empty($_SESSION['page'])){
                        if ($_SESSION['page']=="home" ) echo "chosen"; } ?> 
                ">Trang chủ</a>
                <a href="#"class="items_header_bot ">Giới Thiệu</a>
                <a href="#"class="items_header_bot header_drop 
                <?php if (!empty($_SESSION['page'])){
                    if ($_SESSION['page']=="Nữ" || $_SESSION['page']=="Nam, Nữ") echo "chosen"; } ?> 
                    ">
                    Nữ
                    <div class="header_drop-list">
                        <div class="header_drop-list-item">Giày thể thao</div>
                        <div class="header_drop-list-item">Giày Tây</div>
                        <div class="header_drop-list-item">Giày Sandal</div>
                    </div>
    
                </a>
                <a href="#"class="items_header_bot header_drop
                <?php if (!empty($_SESSION['page'])){
                    if ($_SESSION['page']=="Nam" || $_SESSION['page']=="Nam, Nữ") echo "chosen"; } ?> 
                ">
                    Nam
                    <div class="header_drop-list">
                    <div class="header_drop-list-item">Giày thể thao</div>
                        <div class="header_drop-list-item">Giày Tây</div>
                        <div class="header_drop-list-item">Giày Sandal</div>
                    </div>
                </a>
                <a href="#"class="items_header_bot 
                <?php if (!empty($_SESSION['page'])){
                    if ($_SESSION['page']=="Trẻ em") echo "chosen"; } ?> 
                 ">Trẻ Em</a>
                <a href="#"class="items_header_bot ">Phụ kiện khác</a>
            </div>
        </div>
    </header>
    <script src="js/header.js"></script>
</body>
