<?php
include "start.php";
$id=$_POST['id'];
$quantity=$_POST['quantity'];
if($_SESSION['cart'][$id]['quantity'] || $quantity < 0)
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
if($quantity < 0 || $_SESSION['cart'][$id]['quantity'] < 0  ){
    setcookie('quantity','', time()-1000,"/");
    unset($_COOKIE['quantity']);
    unset($_SESSION);
}
?>