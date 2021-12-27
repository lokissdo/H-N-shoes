<?php

session_start();
if (!isset($_SESSION['accesss'])){
	header('location:../admin/login.php');
}
