<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" >
    <title>Login Page</title>
</head>
<?php require_once "post_data.php";


/**if(!checkSession('email')){
    if(isset($_POST['log']['email']) && isset($_POST['log']['password'])){
        $email = $_POST['log']['email'];
        $password = $_POST['log']['password'];
        $result = fetchRecord($conn,"user","u_email = '$email' AND u_password = '$password' ");
    if($result){
        
        $user = mysqli_fetch_assoc($result);
        $createDate = date("Y/m/d");
        $uid = $user['u_id'];
        $updateQuery = "UPDATE user SET u_lastlogin='$createDate' WHERE u_id='$uid'";
        mysqli_query($conn,$updateQuery);
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
}**/
if(!checkSession('email')){
    if(isset($_POST["log"]["submit"])){
        if(checkEmptyValidation("log","email") || checkEmptyValidation("log","password")){
            echo "<script>alert('Enter all fields');</script>";
        }else{
            $email = $_POST["log"]["email"];
            $password = $_POST["log"]["password"];
            $result = fetchRecord($conn,"user","u_email = '$email' AND u_password = '$password'");
            if(mysqli_num_rows($result) > 0){
             $user = mysqli_fetch_assoc($result);
             $createDate = date("Y/m/d")." ".date("h:i:sa");
             $uid = $user['u_id'];
             $updateQuery = "UPDATE user SET u_lastlogin='$createDate' WHERE u_id='$uid'";
             mysqli_query($conn,$updateQuery);
             $_SESSION['email'] = $_POST['log']['email'];
             $_SESSION['u_name'] = $user['u_fname'];
             $_SESSION['u_id'] = $user['u_id'];
             header("location:blog_posts.php");
            }else{
                 echo "<script>alert('Incorrect login details');</script>";
            }
        }
     }
}else{
    header("location:blog_posts.php");
}





?>
<body>
    <center>
    <form method="POST" action = "login.php">
        <div class="data-login">
           <h1>Login Here</h1>
            <div class="data-email">
                <label for="email">E-mail</label><br><br>
                <input type="text" name="log[email]" id="email" value="<?php echo getPostValue('log','email'); ?>">

                <br><br>
            </div>
            <div class="data-password">
                <label for="password">Password</label><br><br>
                <input type="password" name="log[password]" id="password" ><br><br>
            </div>
            <input type="submit" name="log[submit]" id="login" value="Login" class="styleBtn"><br><br>
          <a href = 'register.php'>  <input type="button" name="reg" id="reg" value="Register" class="styleBtn" ></a>
           
        </div>
    </form>
</center>
</body>

</html>