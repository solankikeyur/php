<?php

session_start();
$user = $_SESSION['loggedUser'];

setcookie("name",$user,time()+600);
setcookie("pass","123123",time()+600);

if(empty($user)){
    header("location:login.html");
}else{
    echo "<h1>Welcome to my world, $user</h1><br><br>";
}

print_r($_COOKIE);
?>

<a href="logout.php"><input type="button" value="Logout" ></a>