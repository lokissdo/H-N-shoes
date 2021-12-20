<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/product.css">
</head>
<body>
    <?php
    require "header.php";
    include "api/start.php";
    include "api/connect.php";
    if(empty($_GET['id'])){
        header("Location: ./");
        exit;
    }
    $sql="select * from products_list where
          id=$_GET[id]";
    $resmen=mysqli_query($connect,$sql);
    $item=mysqli_fetch_assoc($resmen);
    $gender=$item['gender'];
    ?>
    <div class="cate_header">
        <?php 
            if($gender==1|| $gender==2 )
                echo "MEN";
            else if ($gender==0)
            echo "WOMEN";
            else echo "KIDS";
        ?> </div>
    <div class="cate">
        <div class="cate_itemLR"></div>
        <div class="cate_mid">
            <div class="cate_mid_item <?php if($item['category']=='Giày thể thao' ) echo "cate_mid_item-chosen" ?> linked">
                Giày thể thao
                <a href="#"></a>
            </div>
            <div class="cate_mid_item <?php if($item['category']=='Giày Tây' ) echo "cate_mid_item-chosen" ?> linked">
                Giày Tây 
                <a href="#"></a>
            </div>
            <div class="cate_mid_item <?php if($item['category']=='Giày Sandal' ) echo "cate_mid_item-chosen" ?> linked">
                Giày Sandal
                <a href="#"></a>
            </div>
        </div>
        <div class="cate_itemLR"></div>
    </div>
    <h1 class="product_name"><?php echo $item['name']?></h1>
    <div class="manu_name linked">
        CONVERSE
        <a href="#"></a>
    </div>
    <div class="description_container">
        <div class="product_image">
            <img src="<?php echo $item['photo']?>" alt="">
        </div>
        <div class="description">
            <div class="des_top">
                <div class="des_detail">
                    <div class="des_id">SKU: 171575V</div>
                    <div class="des_material">
                        Chất liệu: Polyester Canvas
                    </div>
                    <div class="des_gender">Giới tính:                         
                     <?php 
                          if($gender==1)
                              echo "Men";
                          else if ($gender==0)
                          echo "Women";
                          else if ($gender==2)
                          echo "Men, Women";
                          else echo "Kids";
                      ?>
                    </div>
                </div>
                <div class="des_barrier"> </div>
                <div class="des_price">Giá: <?php             
                echo  number_format($item['price'])."VNĐ";?></div>
            </div>
            <div class="quantity"> Còn hàng: <?php echo $item['quantity']?> sản phẩm</div>
            <div class="add_to_cart linked">
                ADD TO CART
                <a href="#"></a>
            </div>
        </div>
    </div>
    <div class="cate">
        <div class="cate_itemLR "></div>
        <div class="cate_mid-bot">
            You might like
        </div>
        <div class="cate_itemLR"></div>
    </div>
</body>
</html>