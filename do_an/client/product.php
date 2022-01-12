<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/icongame.jpg" type="image/.jpg">
    <title>Product</title>
    <link rel="stylesheet" href="asset/product.css">
    <link rel="icon" href="public/icongame.jpg" type="image/.jpg">
</head>
<body>
    <?php
    include "api/start.php";
    include "api/connect.php";
    if(empty($_GET['id'])){
        header("Location: ./");
        exit;
    }
    $sql="SELECT products_list.id,products_list.name,products_list.price,products_list.quantity,products_list.photo,products_gender.gender,products_category.category
    FROM products_list
    INNER JOIN products_category ON products_category.id=products_list.category_id
    INNER JOIN manufactures ON manufactures.id=products_list.manufacturers_id
    INNER JOIN products_gender ON products_gender.id=products_list.gender_id
    WHERE products_list.id=$_GET[id]";
    $resmen=mysqli_query($connect,$sql);
    $item=mysqli_fetch_assoc($resmen);
    // print_r($item);
    // die($sql);
    // exit;
    $gender=$item['gender'];
    $_SESSION['page']=$gender;
    require "header.php";
    ?>
    <div class="cate_header">
        <?php 
          echo $gender;
        ?> 
    </div>
    <div class="cate">
        <div class="cate_itemLR"></div>
        <div class="cate_mid">
            <div class="cate_mid_item <?php if($item['category']=='Giày Thể Thao' ) echo "cate_mid_item-chosen" ?> linked">
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
                          echo $gender
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
                <a id="add-to-cart" href="#" datalink="./api/addproduct.php?id=<?php echo $item['id']?>"></a>
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
    <script src="js/product.js"> </script>
</body>
</html>