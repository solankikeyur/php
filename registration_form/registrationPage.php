<?php

session_start();
$nameError = $emailError = $phoneError = $addressLine1Error = $addressLine2Error = $countryError = $postalCodeError = 
$describeError = $getInTouchError = $certificateError = $confirmPasswordError = $profileImageError = $companyError = $cityError = $stateError = $passwordError = "";

$firstName = $lastName = $email = $password = $phoneNumber = $addressLine1 = $addressLine2 = $country = $postalCode = $desribe = $uniqueClients = $businessYear = 
$company = $city = $state = $certificatePath = $profileImagePath = "";
$getInTouch = $hobbies = [];
$imageTypes = ['image/jpeg','image/jpg','image/gif','image/png'];
$data = $user = [];

if(isset($_SESSION['data'])){
   if(!empty($_SESSION['data'])){
       $fetchedData = $_SESSION['data'];
       $firstName = $fetchedData['firstName'];
       $lastName = $fetchedData['lastName'];
       $email = $fetchedData['email'];
       $password = $fetchedData['password'];
       $phoneNumber = $fetchedData['phoneNumber'];
       $addressLine1 = $fetchedData['addressLine1'];
       $addressLine2 = $fetchedData['addressLine2'];
       $country = $fetchedData['country'];
       $postalCode = $fetchedData['postalCode'];
       $desribe = $fetchedData['describe'];
       $uniqueClients = $fetchedData['uniqueClients'];
       $businessYear = $fetchedData['businessYear'];
       $company = $fetchedData['company'];
       $city = $fetchedData['city'];
       $state = $fetchedData['state'];
       $certificatePath = $fetchedData['certificatePath'];
       $profileImagePath = $fetchedData['profileImagePath'];
       $getInTouch = $fetchedData['getInTouch'];
       $hobbies = $fetchedData['hobbies'];
   } 
}

if(isset($_POST['submit'])){

    //check name
    if(empty($_POST['firstName']) || empty($_POST['lastName'])){
        $nameError = "Please enter all fields";
    }else{
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
    }
    //check email
    if(empty($_POST['email'])){
        $emailError = "Please enter email";
    }else{
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $email = $_POST['email'];
        }else{
            $emailError = "E-Mail not valid";
        }
    }
    //check phonenumber
    if(empty($_POST['phoneNumber'])){
        $phoneError = "Please enter phone number";
    }else{
        $phoneLen = strlen($_POST['phoneNumber']);
        if($phoneLen == 10 ){
            $phoneNumber = $_POST['phoneNumber'];
        }else{
            $phoneError = "Phone number not valid";
        }
    }

    //check password
   if(empty($_POST['password'])){
       $passwordError = "Please enter password";
   }else if(empty($_POST['confirmPassword'])){
       $password = $_POST['password'];
    $confirmPasswordError = "Please enter password again";
   }else if($_POST['password'] != $_POST['confirmPassword']){
       $passwordError = "Password doen't matched";
   }else{
       $password = $_POST['password'];
   }


    //check addressline1
    if(empty($_POST['addressLine1'])){
        $addressLine1Error = "Please enter address";
    }else{
        $addressLine1 = $_POST['addressLine1'];
    }
    //check addressline2
    if(empty($_POST['addressLine2'])){
        $addressLine2Error = "Please enter address";
    }else{
        $addressLine2 = $_POST['addressLine2'];
    }
    //check country
        if(empty($_POST['country'])){
            $countryError = "Please select country";
        }else{
            $country = $_POST['country'];
        }
    //check postalcode
    if(empty($_POST['postalCode'])){
        $postalCodeError = "Please enter postal code";
    }else{
        $postalCode = $_POST['postalCode'];
    }

    //check describe ur self
    if(empty($_POST['describe'])){
        $describeError = "Please describe your self";
    }else{
        $desribe = $_POST['describe'];
    }

    //company
    if(empty($_POST['company'])){
        $companyError = "Please enter company name";
    }else{
        $company = $_POST['company'];
    }

    //city
    if(empty($_POST['city'])){
        $cityError = "Please enter city name";
    }else{
        $city = $_POST['city'];
    }

    //state
    if(empty($_POST['state'])){
        $stateError = "Please enter state name";
    }else{
        $state = $_POST['state'];
    }

    //check unique clients
    if(empty($_POST['uniqueClients'])){
        $uniqueClientsError = "Please select any one";
    }else{
        $uniqueClients = $_POST['uniqueClients'];
    }
    
    //businessYear
    if(!empty($_POST['businessYear'])){
        $businessYear = $_POST['businessYear'];
    }

    //getInTouch
    if(empty($_POST['getInTouch'])){
        $getInTouchError = "Please select any one way";
    }else{
        $getInTouch = $_POST['getInTouch'];
    }

    //hobbies
    if(!empty($_POST['hobbies'])){
        $hobbies = $_POST['hobbies'];
    }

    //certificate
    if(empty($_FILES['certificate']['name'])){
        $certificateError = "Please upload certificate";
    }else{
        if($_FILES['certificate']['type'] == 'application/pdf'){
            move_uploaded_file($_FILES['certificate']['tmp_name'],"certificates/".$_FILES['certificate']['name']);
            $certificatePath = "certificates/".$_FILES['certificate']['name'];
        }else{
            $certificateError = "Only PDF files are allowed";
        }
    }

    //profile upload
    if(empty($_FILES['profileImage']['name'])){
        $profileImageError = "Please upload image";
    }else{
        if(in_array($_FILES['profileImage']['type'],$imageTypes)){
            move_uploaded_file($_FILES['profileImage']['tmp_name'],"profileImages/".$_FILES['profileImage']['name']);
            $profileImagePath = "profileImages/".$_FILES['profileImage']['name'];
        }else{
            $profileImageError = "Please upload valid image file";
        }
    }

    //final Output to store
    if($firstName != "" && $lastName != "" && $email != "" && $phoneNumber != "" && $addressLine1 != "" &&
    $addressLine2 != "" && $country != "" && $postalCode != "" && $desribe != "" && $uniqueClients != "" && $businessYear != "" &&
    $getInTouch != [] && $hobbies != [] && $city != "" && $state != "" && $company != "" && $password != "" &&
    $profileImagePath != "" && $certificatePath != ""){
     
        $user["firstName"] = $firstName;
        $user["lastName"] = $lastName;
        $user['email'] = $email;
        $user['phoneNumber'] = $phoneNumber;
        $user['addressLine1'] = $addressLine1;
        $user['addressLine2'] = $addressLine2;
        $user['country'] = $country;
        $user['postalCode'] = $postalCode;
        $user['describe'] = $desribe;
        $user['uniqueClients'] = $uniqueClients;
        $user['businessYear'] = $businessYear;
        $user['getInTouch'] = $getInTouch;
        $user['hobbies'] = $hobbies;
        $user['city'] = $city;
        $user['state'] = $state;
        $user['company'] = $company;
        $user['password'] = $password;
        $user['profileImagePath'] = $profileImagePath;
        $user['certificatePath'] = $certificatePath;

        //store data to session
        $data = $user;
        $_SESSION['data'] = $data;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
    .error{
        color:red;
        font-size:15px;
    }
</style>
</head>
<body>
    <div class="container">
        <form method="POST" action="registrationPage.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Your Account Details</legend>
                <label>Enter Full Name</label>
                <div class="row">
                    <div class="col-md-2">
                        <select name="namePrefix" class="form-control">
                            <option>Mr.</option>
                            <option>Miss</option>
                            <option>Ms</option>
                            <option>Mrs</option>
                            <option>Dr.</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>" placeholder="Enter Firstname" >
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>" placeholder="Enter Lastname" >
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $nameError; ?></label>
                        </div>
                    </div>
                </div>
                <label>Date Of Birth</label>
                <input type="date" name="birthDate" class="form-control" >
                <label>Phone Number</label>
                <input type="number" placeholder="Enter phonenumber" class="form-control" value="<?php echo $phoneNumber; ?>" name="phoneNumber" >
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $phoneError; ?></label>
                        </div>
                    </div>
                <label>Enter E-mail</label>
                <input type="email" placeholder="Enter E-mail" class="form-control" name="email" value="<?php echo $email; ?>" >
                <div class="row">
                    <div class="col-md-12">
                    <label class="error"><?php echo $emailError; ?></label>
                    </div>
                </div>
                <label>Enter Password</label>
                <input type="password" placeholder="Enter Password" class="form-control" name="password" value="<?php echo $password; ?>" >
                <div class="row">
                    <div class="col-md-12">
                    <label class="error"><?php echo $passwordError; ?></label>
                    </div>
                </div>
                <label>Confirm Password</label>
                <input type="password" placeholder="Enter Password again" class="form-control" name="confirmPassword" >
                <div class="row">
                    <div class="col-md-12">
                    <label class="error"><?php echo $confirmPasswordError; ?></label>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Address Information</legend>
                <label>Addressline 1</label>
                <input type="text" name="addressLine1" placeholder="Addressline 1" class="form-control" value="<?php echo $addressLine1; ?>" >
                <div class="row">
                    <div class="col-md-12">
                    <label class="error"><?php echo $addressLine1Error; ?></label>
                    </div>
                </div>      
                <label>Addressline 2</label>
                <input type="text" name="addressLine2" placeholder="Addressline 2" class="form-control" value="<?php echo $addressLine2; ?>" >
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $addressLine2Error; ?></label>
                        </div>
                    </div>
                <label>Enter Company</label>
                <input type="text" name="company" placeholder="company" class="form-control" value = "<?php echo $company; ?>" >
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $companyError; ?></label>
                        </div>
                    </div>
                <label>Enter City</label>
                <input type="text" name="city" placeholder="Enter city" class="form-control" value = "<?php echo $city; ?>" >
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $cityError; ?></label>
                        </div>
                    </div>
                <label>Enter State</label>
                <input type="text" name="state" placeholder="Enter state" class="form-control" value = "<?php echo $state; ?>" >
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $stateError; ?></label>
                        </div>
                    </div>
                <label>Select Country</label>
                <select name="country" class="form-control" >
                    <option disabled selected>Select country</option>
                    <option value="India" <?php if($country == 'India'){echo 'selected';} ?>>India</option>
                    <option value="Srilanka" <?php if($country == 'Srilanka'){echo 'selected';} ?>>Srilanka</option>
                    <option value="Afghanistan" <?php if($country == 'Afghanistan'){echo 'selected';} ?>>Afghanistan</option>
                    <option value="America" <?php if($country == 'America'){echo 'selected';} ?>>America</option>
                </select>
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $countryError; ?></label>
                        </div>
                    </div>

                <label>Enter Postalcode</label>
                <input type="text" name="postalCode" placeholder="Enter Postal code" class="form-control" value="<?php echo $postalCode; ?>" >

                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $postalCodeError; ?></label>
                        </div>
                    </div>
            </fieldset>
            <div class="form-check">
                <input type="checkbox" id="otherInfo" class="form-check-input" onchange="checkOtherBlock()" >
                <label class="form-check-label">Other Information</label>
            </div>
            <fieldset id="otherInfoBlock">
                <label>Describe Yourself</label>
                <textarea name="describe" rows="5" cols="25" class="form-control"><?php echo $desribe; ?></textarea>
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $describeError; ?></label>
                        </div>
                    </div>
                <label>Profile Image</label>
                <input type="file" name="profileImage" class="form-control" >
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $profileImageError; ?></label>
                        </div>
                    </div>
                <label>Certificate Upload</label>
                <input type="file" name="certificate" class="form-control" >
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $certificateError; ?></label>
                        </div>
                    </div>
                <label>How long you have
                    been in business ?</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="businessYear" value="under1Year" <?php if($businessYear == "under1Year"){echo "checked";} ?> >
                        <label class="form-check-label">Under 1 Year</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="businessYear" value="1-2Years" <?php if($businessYear == "1-2Years"){echo "checked";} ?> >
                        <label class="form-check-label">1-2 Years</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="businessYear" value="2-5Years" <?php if($businessYear == "2-5Years"){echo "checked";} ?> >
                        <label class="form-check-label">2-5 Years</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="businessYear" value="5-10Years" <?php if($businessYear == "5-10Years"){echo "checked";} ?> >
                        <label class="form-check-label">5-10 Years</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="businessYear" value="over10Years" <?php if($businessYear == "over10Years"){echo "checked";} ?> >
                        <label class="form-check-label">Over 10 Years</label>
                    </div>
                <label>Number of unique clients you see each week ?</label>
                <select name="uniqueClients" class="form-control">
                    <option disabled selected>Select Clients</option>
                    <option value="1to5" <?php if($uniqueClients == '1to5'){echo "selected"; } ?> >1-5</option>
                    <option value="1to6" <?php if($uniqueClients == '1to6'){echo "selected"; } ?> >6-10</option>
                    <option value="11to15" <?php if($uniqueClients == '11to15'){echo "selected"; } ?> >11-15</option>
                    <option value="15+" <?php if($uniqueClients == '15+'){echo "selected"; } ?> >15+</option>
                </select>
                <label>How would you like to get in touch with you ?</label>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="getInTouch[]" value="post" <?php foreach($getInTouch as $t){if($t == "post"){echo "checked";}} ?> ><label class="form-check-label">Post</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="getInTouch[]" value="email" <?php foreach($getInTouch as $t){if($t == "email"){echo "checked";}} ?> ><label class="form-check-label">E-Mail</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="getInTouch[]" value="sms" <?php foreach($getInTouch as $t){if($t == "sms"){echo "checked";}} ?> ><label class="form-check-label">SMS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="getInTouch[]" value="phone" <?php foreach($getInTouch as $t){if($t == "phone"){echo "checked";}} ?> ><label class="form-check-label">Phone</label>
                </div><br>
                <div class="row">
                        <div class="col-md-12">
                        <label class="error"><?php echo $getInTouchError; ?></label>
                        </div>
                    </div>
                <label>Hobbies</label>
                <select multiple class="form-control" name="hobbies[]">
                    <option value="listen music" <?php foreach($hobbies as $h){if($h == "listen music"){echo "selected";}} ?> >Listen Music</option>
                    <option value="travelling" <?php foreach($hobbies as $h){if($h == "travelling"){echo "selected";}} ?>>Travelling</option>
                    <option value="blogging" <?php foreach($hobbies as $h){if($h == "blogging"){echo "selected";}} ?>>Blogging</option>
                    <option value="sports" <?php foreach($hobbies as $h){if($h == "sports"){echo "selected";}} ?>>Sports</option>
                    <option value="art" <?php foreach($hobbies as $h){if($h == "art"){echo "selected";}} ?>>Art</option>
                </select>
            </fieldset>
            <input type="submit" name="submit" class="btn btn-primary" value="Submit Details" >
        </form>
    </div>
    <script src="reg.js"></script>

</body>
</html>