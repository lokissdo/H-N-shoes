<?php
require_once "../../root/connect.php";
$tim_kiem = mysqli_real_escape_string($ket_noi,$_GET['tim_kiem']);
$link = mysqli_real_escape_string($ket_noi,$_GET['link']);
header("location:../admin_view.php?link=$link&tim_kiem=$tim_kiem");

