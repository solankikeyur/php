<?php
require_once "post_data.php";
session_start();
if(isset($_SESSION['email'])){
    if(!empty($_SESSION['email'])){
        $_SESSION['email'] = "";
        session_destroy();
    }
}
header("location:login.php");
?>