<?php
$usernameCookie = "";
$passwordCookie = "";
if(!empty($_COOKIE['usernameCookie'])){
    $usernameCookie = $_COOKIE['usernameCookie'];
    $passwordCookie = $_COOKIE['passwordCookie'];
}
if(isset($_POST['txtUserName']) && isset($_POST['txtPassword'])){

    
    


    if(empty($_POST['txtUserName']) && empty($_POST['txtPassword'])){
        echo "Please enter all fields";
    }else{
        $user_name = $_POST['txtUserName'];
        $password = $_POST['txtPassword'];

        if($user_name=="keyur" && $password == '123'){
            session_start();
            $_SESSION['loggedUser'] = $user_name;

            if(!empty($_POST['saveCookie'])){
                setcookie('usernameCookie',$user_name,time()+600);
                setcookie('passwordCookie',$password,time()+600);
            }

            header("location: welcome.php");
        }else{
            echo "Incorrect Password";
        }
    }
}

?>

<form method="POST" action="login.php">
    <input type="text" name="txtUserName" placeholder="Enter your username..." value="<?php echo $usernameCookie; ?>" ><br><br>
    <input type="password" name="txtPassword" placeholder="Enter your password...." value="<?php echo $passwordCookie; ?>"><br><br>
    <input type="checkbox" name="saveCookie" >Check to save details<br><br>
    <input type="submit" name="login" value="Login" >
    <a href="unsetCookie.php"><input type="button" name="unsetCookie" value="Unset Cookie" ></a>
</form>