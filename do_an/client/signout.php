<?php
require "api/start.php";
if (isset($_SESSION['id'])) unset($_SESSION['id']);
if (isset($_COOKIE['token'])) {
    unset($_COOKIE['token']); 
    setcookie('token','', time()-2000); 
}
header("Location: ./");
?>