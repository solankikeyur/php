<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<?php require_once "post_data.php";


if(!checkSession('email')){
    if(isset($_POST['log']['email']) && isset($_POST['log']['password'])){
        $email = $_POST['log']['email'];
        $password = $_POST['log']['password'];
        $result = fetchRecord($conn,"user","u_email = '$email' AND u_password = '$password' ");
    if($result){
        
        $user = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $_POST['log']['email'];
        $_SESSION['u_name'] = $user['u_fname'];
        $_SESSION['u_id'] = $user['u_id'];
        header("location:blog_posts.php");
       
    }else{
        echo "<script>alert('Incorrect login details');</script>";
    }
    }
}else{
    header("location:blog_posts.php");
}



?>
<body>
    <form method="POST" action = "login.php">
        <div class="data-login">
           <h1>Login Here</h1>
            <div class="data-email">
                <label for="email">E-mail</label><br><br>
                <input type="text" name="log[email]" id="email" value="<?php echo getPostValue('log','email'); ?>"><br><br>
            </div>
            <div class="data-password">
                <label for="password">Password</label><br><br>
                <input type="password" name="log[password]" id="password" ><br><br>
            </div>
            <input type="submit" name="login" id="login" value="Login" ><br><br>
          <a href = 'register.php'>  <input type="button" name="reg" id="reg" value="Register" ></a>
           
        </div>
    </form>
</body>

</html>