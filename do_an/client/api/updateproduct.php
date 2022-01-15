<?php
include "start.php";
$id=$_POST['id'];
$quantity=addslashes($_POST['quantity']);
if(isset($_SESSION['cart'][$id]['quantity']) && $quantity >= 0){
    if ($quantity==0) {
        $_SESSION['quantity']-=$_SESSION['cart'][$id]['quantity'];
        unset($_SESSION['cart'][$id]);
    }
    else{
        $_SESSION['quantity']+=$quantity-$_SESSION['cart'][$id]['quantity'];
        $_SESSION['cart'][$id]['quantity']=$quantity;
    }
    if($_SESSION['quantity']<0)$_SESSION['quantity']=0;
}else unset($_SESSION);
?>