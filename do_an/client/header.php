
<?php 
function isMobileDev(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
       $user_ag = $_SERVER['HTTP_USER_AGENT'];
       if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
          return true;
       };
    };
    return false;
}
if(!isMobileDev()){
require_once "api/authenticate.php"; 
?>
<head>
    <link rel="stylesheet" href="asset/header.css">
</head>
<body>
<div class="header">
        <div class="header__top">
            <div class="wrapper_header__top">
                <div class="items_top_header top_header_left">
                    <div class=" sign signup">
                        <a href="./signup.php" >
                        
                            <div class="sign__text">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="30" height="30"
                                            viewBox="0 0 172 172"
                                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(0.33594,0.33594)"><g><path d="M378.91,210.86v235.1c-0.00204,30.39691 -24.64309,55.03796 -55.04,55.04h-254.38c-14.59774,0.00074 -28.59781,-5.79786 -38.91998,-16.12002c-10.32216,-10.32216 -16.12077,-24.32223 -16.12002,-38.91998v-345.49c-0.00074,-14.59774 5.79786,-28.59781 16.12002,-38.91998c10.32216,-10.32216 24.32223,-16.12077 38.91998,-16.12002h254.38c15.33809,-0.01866 29.98425,6.38156 40.39,17.65l-136.11,136.1c-13.58767,13.59471 -22.1886,31.37796 -24.41,50.47l-4.51,38.77c-0.66489,5.72114 1.32234,11.4323 5.39502,15.50498c4.07268,4.07268 9.78385,6.0599 15.50498,5.39502l38.77,-4.51c19.09267,-2.21924 36.8766,-10.8205 50.47,-24.41z" fill="#3498db"></path><path d="M326.54,263.23v132.46c-0.00243,29.24247 -23.70753,52.94757 -52.95,52.95h-153.83c-29.24247,-0.00243 -52.94757,-23.70753 -52.95,-52.95v-244.95c0.00243,-29.24247 23.70753,-52.94757 52.95,-52.95h153.83c14.7854,-0.0165 28.90004,6.16841 38.91,17.05l-84.35,84.34c-13.58767,13.59471 -22.1886,31.37796 -24.41,50.47l-4.51,38.77c-0.66489,5.72114 1.32234,11.4323 5.39502,15.50498c4.07268,4.07268 9.78385,6.0599 15.50498,5.39502l38.77,-4.51c19.09267,-2.21924 36.8766,-10.8205 50.47,-24.41z" fill="#f7f5fb"></path><path transform="translate(170.6551,-307.20186) rotate(45)" d="M456.1528,17.64v0c31.71602,0.00017 57.42692,25.71098 57.4272,57.427v12.09v0h-114.8547v0v-12.09c0.00028,-31.71614 25.71136,-57.427 57.4275,-57.427z" fill="#f5d367"></path><path d="M390.9673,36.3691l-162.8157,162.8157c-13.59119,13.59122 -22.194,31.37417 -24.414,50.4664l-4.5076,38.7654c-0.66548,5.72249 1.32202,11.43518 5.39568,15.50887c4.07366,4.0737 9.78633,6.06125 15.50882,5.39583l38.7655,-4.5076c19.09213,-2.21995 36.875,-10.82265 50.4662,-24.4137l162.8159,-162.8161z" fill="#ffebb9"></path><path d="M281.82,501h-212.33c-14.59774,0.00074 -28.59781,-5.79786 -38.91998,-16.12002c-10.32216,-10.32216 -16.12077,-24.32223 -16.12002,-38.91998v-345.49c-0.01722,-15.31796 6.36706,-29.94632 17.61,-40.35c-0.04,2.62 -0.06,5.24667 -0.06,7.88c0,184.99 100.47,346.52 249.82,433z" fill="#bcc6cc"></path><path d="M207.79,448.64h-88.03c-29.24247,-0.00243 -52.94757,-23.70753 -52.95,-52.95v-144.03c30.17635,76.20174 78.58412,143.83801 140.98,196.98z" fill="#e4e3e8"></path><path d="M323.87,507h-254.38c-33.69563,-0.03819 -61.00181,-27.34437 -61.04,-61.04v-264.96c0,-3.31371 2.68629,-6 6,-6c3.31371,0 6,2.68629 6,6v264.96c0.03042,27.07143 21.96857,49.00958 49.04,49.04h254.38c27.07141,-0.03048 49.00952,-21.96859 49.04,-49.04v-220.6143l-59.2974,59.2969c-14.5659,14.52234 -33.59227,23.72449 -54.02,26.1269l-38.77,4.5108c-7.54177,0.87642 -15.07039,-1.74305 -20.43934,-7.11155c-5.36895,-5.3685 -7.98904,-12.89691 -7.11326,-20.43875l4.51,-38.7725c2.40649,-20.42581 11.60749,-39.4503 26.1255,-54.0185l131.7859,-131.7764c-8.88232,-7.55706 -20.15931,-11.7149 -31.8214,-11.7326h-254.38c-27.07143,0.03042 -49.00958,21.96857 -49.04,49.04v28.53c0,3.31371 -2.68629,6 -6,6c-3.31371,0 -6,-2.68629 -6,-6v-28.53c0.03803,-33.6957 27.3443,-61.00197 61.04,-61.04h254.38c16.99995,0.02458 33.22476,7.11439 44.7915,19.5727c2.19119,2.36557 2.12088,6.03999 -0.1592,8.32l-136.11,136.1c-12.6107,12.6539 -20.60266,29.17894 -22.6923,46.9211l-4.51,38.7695c-0.45272,3.89932 0.90157,7.79172 3.67691,10.5679c2.77534,2.77618 6.66733,4.13164 10.56679,3.6801l38.7729,-4.5117c17.74312,-2.08623 34.26917,-10.07874 46.9209,-22.6924l69.54,-69.539c1.71589,-1.71578 4.29633,-2.2291 6.53824,-1.30065c2.24191,0.92846 3.70386,3.11589 3.70426,5.54245v235.1c-0.03825,33.69561 -27.34439,61.00175 -61.04,61.04z" fill="#000000"></path><path d="M14.45,166c-3.31371,0 -6,-2.68629 -6,-6v-10c0,-3.31371 2.68629,-6 6,-6c3.31371,0 6,2.68629 6,6v10c0,3.31371 -2.68629,6 -6,6z" fill="#000000"></path><path d="M273.59,454.64h-153.83c-32.54209,-0.03643 -58.91357,-26.40791 -58.95,-58.95v-244.95c0.03698,-32.54186 26.40814,-58.91302 58.95,-58.95h153.83c16.4522,0.02295 32.15055,6.90131 43.32,18.981c2.18378,2.36668 2.10985,6.03522 -0.1675,8.312l-84.35,84.34c-12.61035,12.65406 -20.6023,29.17884 -22.6925,46.9208l-4.51,38.7695c-0.45272,3.89932 0.90157,7.79172 3.67691,10.5679c2.77534,2.77618 6.66733,4.13164 10.56679,3.6801l38.7729,-4.5117c17.74315,-2.08612 34.26923,-10.07865 46.9209,-22.6924l17.17,-17.1689c1.71594,-1.7159 4.29652,-2.22925 6.5385,-1.30068c2.24199,0.92857 3.7039,3.1162 3.7041,5.54288v132.4595c-0.03648,32.5421 -26.408,58.91357 -58.9501,58.95zM119.76,103.79c-25.91766,0.02921 -46.92079,21.03234 -46.95,46.95v244.95c0.02904,25.91773 21.03227,46.92096 46.95,46.95h153.83c25.91771,-0.0291 46.9209,-21.03229 46.95,-46.95v-117.9742l-6.9272,6.9268c-14.56616,14.52196 -33.5924,23.72405 -54.02,26.1269l-38.77,4.5108c-7.5418,0.87648 -15.07049,-1.74296 -20.43948,-7.11146c-5.36899,-5.36851 -7.98912,-12.89696 -7.11332,-20.43884l4.51,-38.7725c2.40668,-20.42586 11.60785,-39.45034 26.126,-54.0185l80.024,-80.0152c-8.48325,-7.17417 -19.22991,-11.11785 -30.34,-11.1338z" fill="#000000"></path><path d="M472.1821,123.584c-1.5914,0.00011 -3.1176,-0.63223 -4.2426,-1.7578l-81.2149,-81.2144c-1.12522,-1.12522 -1.75737,-2.65135 -1.75737,-4.24265c0,-1.5913 0.63214,-3.11743 1.75737,-4.24265l8.5488,-8.5489c11.89495,-11.89498 28.02798,-18.57751 44.85,-18.57751c16.82202,0 32.95505,6.68253 44.85,18.57751v0c24.73071,24.78622 24.73071,64.91378 0,89.7l-8.5488,8.5489c-1.12499,1.12549 -2.65117,1.75772 -4.2425,1.7575zM399.4526,36.3691l72.7295,72.73l4.3062,-4.3066c20.0513,-20.09691 20.0513,-52.63209 0,-72.729v0c-9.64446,-9.64466 -22.72528,-15.06299 -36.36475,-15.06299c-13.63947,0 -26.72029,5.41833 -36.36475,15.06299z" fill="#000000"></path><path d="M217.9116,315.45c-7.08366,-0.01396 -13.82486,-3.04953 -18.53057,-8.34432c-4.7057,-5.29479 -6.92882,-12.34577 -6.11103,-19.38208l4.5078,-38.7656c2.40438,-20.4268 11.60811,-39.45163 26.1314,-54.0156l162.8154,-162.8159c2.34334,-2.34278 6.14206,-2.34278 8.4854,0l81.2148,81.2148c2.34289,2.3431 2.34289,6.1418 0,8.4849l-162.8159,162.8154c-14.56401,14.52359 -33.58905,23.72748 -54.0161,26.1318l-38.7657,4.5079c-0.96777,0.11235 -1.94123,0.16867 -2.9155,0.1687zM390.9673,44.8545l-158.5728,158.5723c-12.61449,12.65044 -20.60847,29.17535 -22.6967,46.9179l-4.5078,38.7653c-0.45351,3.90116 0.90154,7.79557 3.67871,10.57263c2.77717,2.77706 6.67164,4.13194 10.57279,3.67827l38.7656,-4.5078c17.74214,-2.08798 34.26664,-10.08186 46.9165,-22.6963l158.5732,-158.5728z" fill="#000000"></path></g></g></g></svg>
                                Đăng ký
                            </div>
                        </a>
                    </div>
                    <div class="sign signin"> 
                        <a href=
                        <?php
                         if (Authenticate()){
                            echo "\"./signout.php\"><div class=\"sign__text\">Đăng xuất";
                        }else echo  "\"./login.php\"><div class=\"sign__text\">Đăng nhập";
                        ?> 
                             <img src="https://img.icons8.com/external-kmg-design-flat-kmg-design/32/000000/external-sign-in-user-interface-kmg-design-flat-kmg-design.png"/>
                             
                            </div>
                        </a> 
                    </div>
                </div>
                <div class="items_top_header top_header_mid">
                    <a href="./" >
                        <div class="header_mid_text">
                            SNEAKER
                        </div>
                    </a>
                </div>
                <div class="items_top_header top_header_right">
                    <div class="search">
                        <form class="search_form" action="./search.php" method="GET">
                            <!-- <label for="fname">Anh:</label><br> -->
                            <input type="text" placeholder="Tìm kiếm" autocomplete="off" class="search_input"id="search" name="search" ><br>
                            <button id="search_form_button"class="search_form_button" type="submit"></button>
                            <div class="list_suggestion">
                            </div>
                        </form>
                        
                    </div>

                    <div class="cart">
                        <a href="./cart.php" >
                        
                           
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
                    <div class="profile linked">
                            <img src="https://img.icons8.com/external-kmg-design-flat-kmg-design/32/000000/external-user-back-to-school-kmg-design-flat-kmg-design.png"/>
                            <a href="./account.php"></a>
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
                
                
                <a href="./collection.php/men"class="items_header_bot header_drop
                <?php if (!empty($_SESSION['page'])){
                    if ($_SESSION['page']=="Nam" || $_SESSION['page']=="Nam, Nữ") echo "chosen"; } ?> 
                ">
                    Nam
                    <div class="header_drop-list">
                    <div class="header_drop-list-item">Giày Thể Thao</div>
                        <div class="header_drop-list-item">Giày Tây</div>
                        <div class="header_drop-list-item">Giày Sandal</div>
                    </div>
                </a>

                <a href="./collection.php/women"class="items_header_bot header_drop 
                <?php if (!empty($_SESSION['page'])){
                    if ($_SESSION['page']=="Nữ" || $_SESSION['page']=="Nam, Nữ") echo "chosen"; } ?> 
                    ">
                    Nữ
                    <div class="header_drop-list">
                        <div class="header_drop-list-item">Giày Thể Thao</div>
                        <div class="header_drop-list-item">Giày Tây</div>
                        <div class="header_drop-list-item">Giày Sandal</div>
                    </div>
    
                </a>

                
                <a href="./collection.php/kids"class="items_header_bot 
                <?php if (!empty($_SESSION['page'])){
                    if ($_SESSION['page']=="Trẻ em") echo "chosen"; } ?> 
                 ">Trẻ Em</a>
               
                <a href="#"class="items_header_bot ">Phụ kiện khác</a>
            </div>
        </div>
</div>
    <div class="offset_header"></div>
    <script src="js/header.js"></script>
</body>
<?php }
else include "headerMobi.php";
?>