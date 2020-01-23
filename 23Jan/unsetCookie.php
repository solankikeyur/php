<?php

setcookie('usernameCookie','',time()-600);
header("location: login.php");

?>