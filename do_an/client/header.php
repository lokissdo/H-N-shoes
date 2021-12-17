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
                            require "api/authenticate.php";
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
                            <input type="text" id="search" name="search"><br>
                            <button class="search_form_button" type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="cart">
                        <a href="#" >
                            <div class="cart_text">
                                Giỏ hàng
                            </div>
                        </a>
                        <div class="cart_label"></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="header__bot">
            <div class="wrap_items_header">
                <a href="#"class="items_header_bot ">Trang chủ</a>
                <a href="#"class="items_header_bot ">Giới Thiệu</a>
                <a href="#"class="items_header_bot header_drop ">
                    Nữ
                    <div class="header_drop-list">
                        <div class="header_drop-list-item">Giày thể thao</div>
                        <div class="header_drop-list-item">Giày da</div>
                        <div class="header_drop-list-item">Giày cao cổ</div>
                        <div class="header_drop-list-item">Giày lười</div>
                    </div>
    
                </a>
                <a href="#"class="items_header_bot header_drop">
                    Nam
                    <div class="header_drop-list">
                        <div class="header_drop-list-item">Giày thể thao</div>
                        <div class="header_drop-list-item">Giày da</div>
                        <div class="header_drop-list-item">Giày cao cổ</div>
                        <div class="header_drop-list-item">Giày lười</div>
                    </div>
                </a>
                <a href="#"class="items_header_bot ">Trẻ Em</a>
                <a href="#"class="items_header_bot ">Phụ kiện khác</a>
            </div>
        </div>
    </header>