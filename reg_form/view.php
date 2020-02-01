<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Record</title>
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
        <fieldset>
            <legend>Account Information</legend>
            <div class="data-account">
                <div class="data-prefix">
                    <label for="prefix">Prefix:-</label>
                    <input type="textbox" value="<?php echo $customer['c_prefix']; ?>" disabled >
                </div><br>
                <div class="data-firstname">
                    <label for="firstname">Firstname:-</label>
                    <label><?php echo $customer['c_fname']; ?></label>
                    <input type="textbox" value="<?php echo $customer['c_fname']; ?>" disabled >
                </div><br>
                <div class="data-lastname">
                    <label for="lastname">Lastname</label>
                    <label><?php echo $customer['c_lname']; ?></label>
                    <input type="textbox" value="<?php echo $customer['c_lname']; ?>" disabled >
                </div><br>
                <div class="data-email">
                    <label for="email">E-mail</label>
                    <label><?php echo $customer['c_email']; ?></label>
                    <input type="textbox" value="<?php echo $customer['c_email']; ?>" disabled >
                </div><br>
                <div class="data-phonenumber">
                    <label for="phonenumber">Phonenumber</label>
                    <label><?php echo $customer['c_phonenumber']; ?></label>
                    <input type="textbox" value="<?php echo $customer['c_phonenumber']; ?>" disabled >
                </div><br>
            </div><br>
        </fieldset><br>
        <fieldset>
            <legend>Address Information</legend><br>
            <div class="data-address">
                <div class="data-addressline1">
                    <label for="addressline1">Addressline1</label>
                    <input type="textbox" value="<?php echo $address['c_addressline1']; ?>" disabled >
                </div><br>
                <div class="data-addressline2">
                    <label for="addressline2">Addressline2</label>
                    <input type="textbox" value="<?php echo $address['c_addressline2']; ?>" disabled >
                </div><br>
                <div class="data-company">
                    <label for="company">Company</label>
                    <input type="textbox" value="<?php echo $address['c_company']; ?>" disabled >
                </div><br>
                <div class="data-state">
                    <label for="state" >State</label>
                    <input type="textbox" value="<?php echo $address['c_state']; ?>" disabled >
                </div><br>
                <div class="data-country">
                    <label for="country">Country</label>
                    <input type="textbox" value="<?php echo $address['c_country']; ?>" disabled >
                </div><br>
                <div class="data-postalcode">
                    <label for="postalcode">Postalcode</label>
                    <input type="textbox" value="<?php echo $address['c_postalcode']; ?>" disabled >
                </div><br>
            </div><br>
        </fieldset><br>
        <fieldset>
            <legend>Other Information</legend>
            <div class="data-other">
                <div class="data-describe">
                    <label for="describe">Describe</label>
                    <textarea disabled><?php echo $other['describe']; ?></textarea>
                </div><br>
                <div class="data-profile">
                    <label for="profileimage">Profile Image</label>
                </div><br>
                <div class="data-certificate">
                    <label for="certificate">Certificate</label>
                </div><br>
                <div class="data-business">
                    <label for="business" >How long you have been in business ?</label>
                    <input type="textbox" value="<?php echo $other['business']; ?>" disabled >
                </div><br>
                <div class="data-clients">
                    <label for="clients">Number of clients each week</label>
                    <input type="textbox" value="<?php echo $other['clients']; ?>" disabled >
                </div><br>
                <div class="data-getintouch">
                    <label for="getintouch">How do you like to get in touch ?</label>
                    <input type="textbox" value="<?php echo $other['getintouch']; ?>" disabled >
                </div><br>
                <div class="data-hobbies">
                    <label for="hobbies">Hobbies</label>
                    <input type="textbox" value="<?php echo $other['hobbies']; ?>" disabled >
                </div><br>
            </div>
        </fieldset><br>
</body>
</html>