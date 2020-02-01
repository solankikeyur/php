<?php

require_once "connect.php";
session_start();

if(isset($_SESSION['email'])){
    if(!empty($_SESSION['email'])){
        $date = date("Y/m/d");
        $loginTime = $_SESSION['loginTime'];
        $loginUser = $_SESSION['email'];
        $loginDate = $date;

        $insertQuery = "INSERT INTO user_log(login_user,login_time,date) VALUES('$loginUser','$loginTime','$loginDate')";
        if(mysqli_query($conn,$insertQuery)){

        }else{
            echo mysqli_error($conn);
        }
        $_SESSION['email'] = "";
    }
}

header("location:login.php");


?>