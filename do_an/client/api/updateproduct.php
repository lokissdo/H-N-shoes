<?php
include "start.php";
$id=$_POST['id'];
$quantity=$_POST['quantity'];
if ($quantity==0) {
    $_COOKIE['quantity']-=$_SESSION['cart'][$id]['quantity'];
    setcookie('quantity', $_COOKIE['quantity'], time()+8640000,"/"); 
    unset($_SESSION['cart'][$id]);
}
else{
    $_COOKIE['quantity']+=$quantity-$_SESSION['cart'][$id]['quantity'];
    setcookie('quantity',$_COOKIE['quantity'], time()+8640000,"/");
    $_SESSION['cart'][$id]['quantity']=$quantity;
}

?>