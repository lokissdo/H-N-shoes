<?php

    include "start.php";
    if(empty($_GET['id'])){
        header("location:javascript://history.go(-1)");
        exit;
    }
    $id=$_GET['id'];
    if (!isset( $_SESSION['cart'])){
        $_COOKIE['quantity']=1;
        setcookie('quantity',1, time()+8640000,"/"); 
        echo json_encode("hereeee");
    }
    else {
        $_COOKIE['quantity']+=1;
        setcookie('quantity', $_COOKIE['quantity'], time()+8640000,"/"); 
    }
    if(isset($_SESSION['cart'][$id]['quantity'])){
        $_SESSION['cart'][$id]['quantity']+=1;
    }
    else {
      
        include "connect.php";
        $sql="select * from products_list
        where id=$id 
        limit 1";
        $res=mysqli_query($connect,$sql);
        $item=mysqli_fetch_assoc($res);
        $_SESSION['cart'][$id]['quantity']=1;
        $_SESSION['cart'][$id]['price']=$item['price'];
        $_SESSION['cart'][$id]['photo']=$item['photo'];
        $_SESSION['cart'][$id]['name']=$item['name'];
    }
    echo json_encode("hehehe");
?>