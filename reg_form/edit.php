<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Form</title>
<style>
    span{
        color:red;
    }
</style>
</head>
<?php require_once "post_data.php";
    $c_id = $_GET['c_id'];
    $customerResult = viewRecord($conn,"customers","c_id=$c_id");
    $customer = mysqli_fetch_assoc($customerResult);
    $addressResult = viewRecord($conn,"customer_address","c_id=$c_id");
    $address = mysqli_fetch_assoc($addressResult);
    $otherResult = viewRecord($conn,"customer_additional_info","c_id=$c_id");
    $other = fetchOtherData($otherResult);
?>
<body>
    <form method="POST" action="edit.php?c_id=<?=$c_id?>" >
        <fieldset>
            <legend>Account Information</legend>
            <div class="data-account">
                <div class="data-prefix">
                    <label for="prefix">Prefix</label>
                    <select name="account[prefix]" id="prefix">
                    <?php $prefixData = ['Mr','Miss','Mrs','Dr'];
                    foreach ($prefixData as $key => $value):
                    ?>
                        <option value="<?php echo $value; ?>" <?php if($value == $customer['c_prefix']){echo "selected";} ?> ><?php echo $value; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div><br>
                <div class="data-firstname">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="account[firstname]" id="firstname" value="<?php echo $customer['c_fname']; ?>" >
                    <?php if(validateEmpty('account','firstname')){echo "<span>Please enter firstname</span>";} ?>
                </div><br>
                <div class="data-lastname">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="account[lastname]" id="lastname" value="<?php echo $customer['c_lname']; ?>" >
                    <?php if(validateEmpty('account','lastname')){echo "<span>Please enter lastname</span>";} ?>

                </div><br>
                <div class="data-email">
                    <label for="email">E-mail</label>
                    <input type="text" name="account[email]" id="email" value="<?php echo $customer['c_email']; ?>" >
                    <?php if(validateEmpty('account','email')){echo "<span>Please enter email</span>";} ?>
                    <?php if(validateEmail('account','email')){echo "<span>Enter valid email</span>";} ?>
                </div><br>
                <div class="data-phonenumber">
                    <label for="phonenumber">Phonenumber</label>
                    <input type="number" name="account[phonenumber]" id="phonenumber" value="<?php echo $customer['c_phonenumber']; ?>" >
                    <?php if(validateEmpty('account','phonenumber')){echo "<span>Please enter phonenumber</span>";} ?>

                </div><br>
                <div class="data-password">
                    <label for="password">Password</label>
                    <input type="password" name="account[password]" id="password" value="<?php echo $customer['c_password']; ?>" >
                    <?php if(validateEmpty('account','password')){echo "<span>Please enter password</span>";} ?>
                </div><br>
                <div class="data-conpassword">
                    <label for="conpassword">Confirm Password</label>
                    <input type="password" name="account[conpassword]" id="conpassword" >
                    <?php if(validateEmpty('account','conpassword')){echo "<span>Please enter password again</span>";} ?>
                </div><br>
            </div><br>
        </fieldset><br>
        <fieldset>
            <legend>Address Information</legend><br>
            <div class="data-address">
                <div class="data-addressline1">
                    <label for="addressline1">Addressline1</label>
                    <input type="text" name="address[addressline1]" id="addressline1" value="<?php echo $address['c_addressline1']; ?>" >
                    <?php if(validateEmpty('address','addressline1')){echo "<span>Please enter addresslin1</span>";} ?>
                </div><br>
                <div class="data-addressline2">
                    <label for="addressline2">Addressline2</label>
                    <input type="text" name="address[addressline2]" id="addressline2" value="<?php echo $address['c_addressline2']; ?>" >
                    <?php if(validateEmpty('address','addressline2')){echo "<span>Please enter addresslin2</span>";} ?>
                </div><br>
                <div class="data-company">
                    <label for="company">Company</label>
                    <input type="text" name="address[company]" id="company" value="<?php echo $address['c_company']; ?>" >
                    <?php if(validateEmpty('address','company')){echo "<span>Please enter company</span>";} ?>
                </div><br>
                <div class="data-state">
                    <label for="state" >State</label>
                    <input type="text" name="address[state]" id="state" value="<?php echo $address['c_state']; ?>" >
                    <?php if(validateEmpty('address','state')){echo "<span>Please enter state</span>";} ?>
                </div><br>
                <div class="data-country">
                    <?php $countryData = ['India','America','Pakistan','Africe']; ?>
                    <label for="country">Country</label>
                    <select name="address[country]">
                        <option selected>Select City</option>
                        <?php foreach($countryData as $c): ?>
                        <option value="<?php echo $c; ?>" <?php if($c == $address['c_country']){echo "selected";} ?> ><?php echo $c; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><br>
                <div class="data-postalcode">
                    <label for="postalcode">Postalcode</label>
                    <input type="number" name="address[postalcode]" id="postalcode" value="<?php echo $address['c_postalcode']; ?>" >
                    <?php if(validateEmpty('address','postalcode')){echo "<span>Please enter postalcode</span>";} ?>
                </div><br>
            </div><br>
        </fieldset><br>
        <fieldset>
            <legend>Other Information</legend>
            <div class="data-other">
                <div class="data-describe">
                    <label for="describe">Describe</label>
                    <textarea id="describe" name="other[describe]" rows="10" cols="25"><?php echo $other['describe']; ?></textarea>
                    <?php if(validateEmpty('other','describe')){echo "<span>Please describe</span>";} ?>
                </div><br>
                <div class="data-profile">
                    <label for="profileimage">Profile Image</label>
                    <input type="file" name="other[profileimage]" id="profileimage" >
                </div><br>
                <div class="data-certificate">
                    <label for="certificate">Certificate</label>
                    <input type="file" name="other[certificate]" id="certificate" >
                </div><br>
                <div class="data-business">
                    <?php $businessData = ['under 1 year','1-2 year','2-5 year','5-10 year','over 10 year']; ?>
                    <label for="business" >How long you have been in business ?</label>
                    <?php foreach($businessData as $b): ?>
                    <input type="radio" name="other[business]" id="business" value="<?php echo $b; ?>" <?php if($b == $other['business']){echo "checked";} ?> ><?php echo $b; ?>
                    <?php endforeach; ?>
                </div><br>
                <div class="data-clients">
                    <?php $clientsData = ['1-5','6-10','11-15','15+']; ?>
                    <label for="clients">Number of clients each week</label>
                    <select name="other[clients]">
                        <?php foreach($clientsData as $c): ?>
                        <option value="<?php echo $c; ?>" <?php if($c == $other['clients']){echo "selected";} ?>  ><?php echo $c; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><br>
                <?php $getInTouchData = ['Post','SMS','Mail','Phone']; ?>
                <div class="data-getintouch">
                    <label for="getintouch">How do you like to get in touch ?</label>
                    <?php $getInTouch = explode(" ",$other['getintouch']);?>
                    <?php foreach($getInTouchData as $g): ?>
                    <input type="checkbox" name="other[getintouch][]" id="getintouch" <?php if(in_array($g,$getInTouch)){echo "checked";} ?> value="<?php echo $g; ?>" ><?php echo $g; ?>
                    <?php endforeach; ?>
                </div><br>
                <div class="data-hobbies">
                    <label for="hobbies">Hobbies</label>
                    <?php $hobbiesData = ['Sports','Singing','ListeingMusic','Art'];?>
                    <?php $hobbies = explode(" ",$other['hobbies']);?>
                    <select name="other[hobbies][]" multiple >
                        <?php foreach ($hobbiesData as $key => $value): ?>
                        <option value="<?php echo $value; ?>"  <?php if(in_array($value,$hobbies)){echo "selected";} ?>><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><br>
            </div>
        </fieldset><br>
        <input type="submit" value="Update Record" name="update" >
    </form>
</body>
</html>