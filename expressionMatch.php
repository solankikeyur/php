<?php
    include_once 'header.php';

    function checkSpace($string){
        if(preg_match('/ /',$string)){
            return true;
        }else{
            return false;
        }
    }

    $string = "my name is keyur";
    if(checkSpace($string)){
        echo "String consist of space.";
    }else{
        echo "String have no space.";
    }

    function checkEmail($email){
        if(preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/',$email)){
            echo "<br>Email is valid";
        }else{
            echo "<br>Email is not valid";
        }
    }

    $email = "solanki@gmail.com";
    checkEmail($email);
?>