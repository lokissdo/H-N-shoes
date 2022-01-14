
<head>
    <link rel="stylesheet" href="../asset/header.css">
</head>
<body>
<header>
        <div class="header__top">
            <div class="wrapper_header__top">
                <div class="items_top_header top_header_left">
                    <div class=" sign signup">
                        <a href="../signup.php" >
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
                            echo "\"../signout.php\"";
                        }else echo  "\"../login.php\"";
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
                        <form class="search_form" action="./search.php" method="GET">
                            <!-- <label for="fname">Anh:</label><br> -->
                            <input type="text" placeholder="   Tìm kiếm"class="search_input"id="search" name="search" ><br>
                            <button id="search_form_button"class="search_form_button" type="submit"></button>
                        </form>
                    </div>
                    <div class="cart">
                        <a href="../cart.php" >       
                            <img src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/40/000000/external-cart-essentials-icongeek26-linear-colour-icongeek26.png"/>
                            <div class="cart_text">
                                <?php 
                                if(isset($_SESSION['quantity'])&&  isset($_SESSION['cart']))                              
                                echo $_SESSION['quantity'];
                                else echo 0;
                                ?> 
                            </div>
                        </a>
                        <div class="cart_label"></div>

                    </div>
                    <div class="linked">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                width="40" height="40"viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#0ab8ff"><path d="M86,17.2c-19.00027,0 -34.4,15.39973 -34.4,34.4v5.73333c0,19.00027 15.39973,34.4 34.4,34.4c19.00027,0 34.4,-15.39973 34.4,-34.4v-5.73333c0,-19.00027 -15.39973,-34.4 -34.4,-34.4zM63.62656,112.10234c-16.82733,4.39747 -32.70069,12.67676 -38.55443,20.29063c-5.24027,6.8112 -0.25182,16.6737 8.34245,16.6737h105.15964c8.59427,0 13.58271,-9.86796 8.34245,-16.68489c-5.85373,-7.61387 -21.72163,-15.88196 -38.54323,-20.27943c-6.02,5.16573 -13.82504,8.29766 -22.37344,8.29766c-8.55413,0 -16.35344,-3.13766 -22.37344,-8.29766z"></path></g></g></svg>
                        
                        <a href="../profile.php"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bot">
            <div class="wrap_items_header">
                <a href="../"class="items_header_bot ">Trang chủ</a>
                <a href="#"class="items_header_bot ">Giới Thiệu</a>

                <?php foreach($genderArr as $key =>$value) {?>
                    <a href="../collection.php/<?php echo $key?>"class="items_header_bot header_drop 
                    <?php if (isset($gender[0]) && $gender[0]==$value[0] ) echo "chosen";  ?> 
                        ">
                      <?php  echo $value[0];?> 
                        <div class="header_drop-list">
                            <div class="header_drop-list-item">Giày Thể Thao</div>
                            <div class="header_drop-list-item">Giày Tây</div>
                            <div class="header_drop-list-item">Giày Sandal</div>
                        </div>
                    </a>
                <?php }; ?>
                <a href="#"class="items_header_bot ">Phụ kiện khác</a>
            </div>
        </div>
    </header>
    <script src="../js/headerCo.js"></script>
</body>
