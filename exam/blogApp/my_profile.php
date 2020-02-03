<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
</head>
<?php 
require_once "post_data.php";

$u_id = $_SESSION['u_id'];
sessionRedirect('email');
$r = fetchRecord($conn,"user","u_id = '$u_id' ");
$result = mysqli_fetch_assoc($r);

?>
<body>
    <h1>Profile Information</h1>
    <hr>
    <table border="2">
        <tr>
            <th>
                Username
            </th>
            <td>
               <?= $result['u_prefix']." ".$result['u_fname']." ".$result['u_lname']; ?>
            </td>
        </tr>
        <tr>
            <th>
                Email
            </th>
            <td>
                <?= $result['u_email']; ?>
            </td>
        </tr>
        <tr>
            <th>
                Mobile Number
            </th>
            <td>
            <?= $result['u_mobile']; ?>
            </td>
        </tr>
        <tr>
            <th>
                Information
            </th>
            <td>
            <?= $result['u_information']; ?>
            </td>
        </tr>
        <tr>
            <th>
                Created At
            </th>
            <td>
            <?= $result['u_createdate']; ?>
            </td>
        </tr>
    </table>
   <a href="blog_posts.php"> <input type="button" value="HOME"  ></a>
   <a href="update_user.php?id=<?=$u_id;?>"> <input type="button" value="UPDATE DETAILS"  ></a>
    <a href = "logout.php"><input type="button" value="LOGOUT"  ></a>
</body>
</html>