<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/icongame.jpg" type="image/.jpg">
   <link rel="stylesheet"  href="asset/header.css">
   <link rel="stylesheet"  href="asset/grid.css">
   <link rel="stylesheet"  href="asset/body.css">
   <link rel="stylesheet"  href="asset/footer.css">
   <!-- media="(min-width:1024px)" -->
    <title>Store</title>
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
                        <a href="./login.php" >
                            <div class="sign__text">
                                Đăng nhập
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
    <div class="body_product">
        <div class="grid wide">
            <div class="row">
                <div class="col m-3 c-3 l-3">
                   <div class="container_product">
                        <img src="http://mauweb.monamedia.net/converse/wp-content/uploads/2019/05/sale-off-3.jpg" width="100%" height="70%"alt="">
                        <div class="name_product">
                            Tên giày
                        </div>
                        <div class="price_product">
                            Giá giày
                        </div>
                   </div>
                </div>
                <div class="col m-3 c-3 l-3">
                    <div class="container_product">

                    </div>
                </div>
                <div class="col m-3 c-3 l-3">
                    <div class="container_product">

                    </div>
                </div>
                <div class="col m-3 c-3 l-3">
                    <div class="container_product">

                    </div>
                </div>
                <div class="col m-3 c-3 l-3">
                    <div class="container_product">

                    </div>
                </div>
                <div class="col m-3 c-3 l-3">
                    <div class="container_product">
 
                    </div>
                 </div>
                 <div class="col m-3 c-3 l-3">
                     <div class="container_product">
 
                     </div>
                 </div>
                 <div class="col m-3 c-3 l-3">
                     <div class="container_product">
 
                     </div>
                 </div>
                 <div class="col m-3 c-3 l-3">
                     <div class="container_product">
 
                     </div>
                 </div>
                 <div class="col m-3 c-3 l-3">
                     <div class="container_product">
 
                     </div>
                 </div>
                 <div class="col m-3 c-3 l-3">
                    <div class="container_product">

                    </div>
                </div>
                <div class="col m-3 c-3 l-3">
                    <div class="container_product">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container_footer">
            <div class="footer_item">
                <div class="footer_item_title">Giới Thiệu
                    <div class="footer_item_title-underline"></div>
                </div>
                <div class="footer_item_detail"> Chào mừng bạn đến với ngôi nhà H&N! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử H&N 100 năm, và đang không ngừng phát triển lớn mạnh. </div>
            </div>
            <div class="footer_item">
                <div class="footer_item_title">Địa chỉ
                    <div class="footer_item_title-underline"></div>
                </div>
                <div class="footer_item_detail">
                    <li class="item_address ">Đường xx, Quân xx, Thành phố xx</li>
                    <li class="item_address ">03676341**</li>
                    <li class="item_address ">dokhaihung2003@gmail.com</li>
                    <li class="item_address ">SNEAKERSHOP</li>
                </div>
            </div>
            <div class="footer_item">
                <div class="footer_item_title">Menu
                    <div class="footer_item_title-underline"></div>
                </div>
                <div class="footer_item_detail footer_contanier_menu">
                    <div class="footer_contanier_menu_item">Trang chủ</div>
                    <div class="footer_contanier_menu_item">Giới thiệu</div>
                    <div class="footer_contanier_menu_item">Cửa hàng</div>
                    <div class="footer_contanier_menu_item">Tin tức</div>
                    <div class="footer_contanier_menu_item">Liên hệ</div>
                </div>
            </div>
            <div class="footer_item">
                <div class="footer_item_title">Mạng xã hội
                    <div class="footer_item_title-underline"></div>
                </div>
                <div class="footer_item_detail">
                    <a href="https://www.facebook.com"><img class="footer_item_detail-icon" src="https://img.icons8.com/fluency/30/000000/facebook-new.png"/></a>
                    <a href="https://www.facebook.com"><img class="footer_item_detail-icon" src="https://img.icons8.com/fluency/30/000000/instagram-new.png"/></a>
                    <a href="https://www.facebook.com"><img class="footer_item_detail-icon" src="https://img.icons8.com/color/30/000000/gmail-new.png"/></a>
                    <a href="https://www.facebook.com"><img class="footer_item_detail-icon" src="https://img.icons8.com/fluency/30/000000/twitter.png"/></a>
                </div>
            </div>

        </div>
        <div class="footer_copyright">
           <div class="footer_copyright-text">© Bản quyền thuộc về . Thiết kế website H&N </div>
        </div>
    </footer>
</body>
</html>