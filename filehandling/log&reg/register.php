<?php

    $regName = $_POST['regName'];
    $regEmail = $_POST['regEmail'];
    $regPassword = $_POST['regPassword'];

    $fetch_details = file_get_contents("regDetails.txt");
    $regDetails = json_decode($fetch_details);
    $count = count($regDetails);

    $details = [];
    $details["name"] = $regName;
    $details["password"] = $regPassword;
    $details["email"] = $regEmail;

    $regDetails[$count] = $details;

    $regDetails = json_encode($regDetails);
    file_put_contents("regDetails.txt",$regDetails);
    
    header("location:login.html");


?>