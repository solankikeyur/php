<?php

session_start();

print_r($_COOKIE);

if(isset($_SESSION['loggedUser'])){
    echo "Welcome Here, ".$_SESSION['loggedUser']."<br>";
    echo "Setted Cookie is ".$_COOKIE['usernameCookie'];
}else{
    header("location: login.php");
}
?>

<a href="logout.php"><input type="button" name="logout" value="Logout"></a>