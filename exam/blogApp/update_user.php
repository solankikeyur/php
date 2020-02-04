<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
    <link rel="stylesheet" href="css/main.css" >
</head>
<?php require_once "post_data.php";
$u_id = $_SESSION['u_id'];
sessionRedirect('email');
$r = fetchRecord($conn,"user","u_id = '$u_id' ");
$result = mysqli_fetch_assoc($r);
?>
<body>
    <h1>Update User</h1><hr>
    <center>
    <form method="POST" action="update_user.php">
        <div class="data-reg">
            <div class="data-prefix">
                <label for="prefix">Prefix</label>
                <select name="reg[prefix]">
                    <?php $prefixData = ["MR","Dr","Miss","Mrs"]; 
                    foreach($prefixData as $pre):
                    ?>
                    <option value="<?= $pre; ?>" <?php if($pre == $result['u_prefix']){echo "selected";} ?> ><?= $pre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="data-fname">
                <label for="fName">Firstname</label><br><br>
                <input type="text" name="reg[fname]" id="fName" value="<?= $result['u_fname']; ?>" > <?= checkFormValidation('reg','fname'); ?><br><br>
            </div>
            <div class="data-lname">
                <label for="lName">Lastname</label><br><br>
                <input type="text" name="reg[lname]" id="lName" value="<?= $result['u_lname']; ?>"><?= checkFormValidation('reg','lname'); ?><br><br>
            </div>
            <div class="data-mobile">
                <label for="mobile">Mobile</label><br><br>
                <input type="number" name="reg[mobile]" id="mobile" value="<?= $result['u_mobile']; ?>" ><?= checkFormValidation('reg','mobile'); ?><br><br>
            </div>
            <div class="data-email">
                <label for="email">Email</label><br><br>
                <input type="text" name="reg[email]" id="email" value="<?= $result['u_email']; ?>"><?= checkFormValidation('reg','email'); ?><br><br>
            </div>
            <div class="data-password">
                <label for="password">Password</label><br><br>
                <input type="password" name="reg[password]" id="password" value="<?= $result['u_password']; ?>" ><?= checkFormValidation('reg','password'); ?><br><br>
            </div>
            <div class="data-info">
                <label for="info">Information</label><br><br>
                <textarea name="reg[info]" id="info" cols="30" rows="10"><?= $result['u_information']; ?></textarea><?= checkFormValidation('reg','info'); ?><br><br>
            </div>
            <input type="submit" name="reg[update]" value="Update" class="styleBtn" ><br>
           <a href="my_profile.php" > <input type="button" class="styleBtn"  value="Back"></a>

        </div>
    </form>
    </center>
</body>
</html>