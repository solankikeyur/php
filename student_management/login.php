<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css" >
    <title>Login Page</title>
</head>
<?php require_once "postData.php"; 

if(!checkSession('email')){
    if(isset($_POST['log']['email']) && isset($_POST['log']['password'])){
        $email = $_POST['log']['email'];
        $password = $_POST['log']['password'];
        $result = fetchRecord($conn,"login_details","log_email = '$email' AND log_password = '$password' ");
    if($result){
        session_start();
        $_SESSION['email'] = $_POST['log']['email'];
        $_SESSION['loginTime'] = date("h:i a");
        header("location:welcome.php");
    }else{
        echo "<script>alert('Incorrect login details');</script>";
    }
    }
}else{
    header("location:welcome.php");
}



?>
<body style="border:none">
<center>
    <form method="POST" action = "login.php">
    
        <div class="data-login">
           <h1>Login Here</h1>
            <div class="data-email">
                <label for="email">E-mail</label><br><br>
                <input type="text" name="log[email]" id="email" value="<?php echo getPostData('log','email'); ?>"><br><br>
            </div>
            <div class="data-password">
                <label for="password">Password</label><br><br>
                <input type="password" name="log[password]" id="password" ><br><br>
            </div>
            <input type="submit" name="login" id="login" value="Login" >
           
        </div>
    </form>
    </center>
</body>

</html>