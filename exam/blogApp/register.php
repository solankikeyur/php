<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" >
    <title>Register Here</title>
</head>
<?php require_once "post_data.php"; ?>
<body>
    <h1>Register Here</h1><hr>
    <center>
    <form method="POST" action="register.php">
        <div class="data-reg">
            <div class="data-prefix">
                <label for="prefix">Prefix</label>
                <select name="reg[prefix]">
                    <?php $prefixData = ["MR","Dr","Miss","Mrs"]; 
                    foreach($prefixData as $pre): ?>
                    <option value="<?= $pre; ?>" <?php if($pre == getPostValue('reg','prefix')){echo "selected";} ?> ><?= $pre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="data-fname">
                <label for="fName">Firstname</label>
                <input type="text" name="reg[fname]"  id="fName" value="<?= getPostValue('reg','fname'); ?>" ><br> <?= checkFormValidation('reg','fname'); ?>
            </div>
            <div class="data-lname">
                <label for="lName">Lastname</label>
                <input type="text" name="reg[lname]"  id="lName" value="<?= getPostValue('reg','lname'); ?>"><br><?= checkFormValidation('reg','lname'); ?>
            </div>
            <div class="data-mobile">
                <label for="mobile">Mobile</label>
                <input type="number" name="reg[mobile]"  id="mobile" value="<?= getPostValue('reg','mobile'); ?>" ><br><?= checkFormValidation('reg','mobile'); ?>
            </div>
            <div class="data-email">
                <label for="email">Email</label>
                <input type="text" name="reg[email]" id="email"  value="<?= getPostValue('reg','email'); ?>"><br><?= checkFormValidation('reg','email'); ?>
            </div>
            <div class="data-password">
                <label for="password">Password</label>
                <input type="password" name="reg[password]" id="password"  value="<?= getPostValue('reg','password'); ?>" ><br><?= checkFormValidation('reg','password'); ?>
            </div>
            <div class="data-conPassword">
                <label for="conPassword">Confirm Password</label>
                <input type="password" name="reg[conPassword]"  id="conPassword"><br><?= checkFormValidation('reg','conPassword'); ?>
            </div>
            <div class="data-info">
                <label for="info">Information</label>
                <textarea name="reg[info]" id="info" cols="30" rows="10"><?= getPostValue('reg','info'); ?></textarea><br><?= checkFormValidation('reg','info'); ?>
            </div>
            <input type="checkbox" class="uk-checkbox" name="reg[check]" value = "yes">Hereby, I accept terms and condition
            <input type="submit" name="reg[submit]" value="Register" class="styleBtn"><br>
           <a href="login.php" > <input type="button"  value="Back to login" class="styleBtn"></a>
        </div>
    </form>
    </center>
</body>
</html>