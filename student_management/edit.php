<?php
require_once "dashboard.php";
require_once "postData.php";
if(isset($_GET['stuid'])){
    $stuId = $_GET['stuid'];
}
$stuData = fetchRecord($conn,"stu_data","stu_id = '$stuId'");
$stuData = mysqli_fetch_assoc($stuData);
?>
<form method="POST" action = "edit.php?stuid=<?= $stuId?>">
<div class="data-student">
    <fieldset>
        <div class="data-name">
            <label for="stuName">Enter Student Name</label>
            <input type="text" name="stu[name]" id="stuName" value="<?php echo $stuData['stu_name']; ?>" >
            <?php echo validateForm('stu','name'); ?>
        </div>
        <div class="data-email">
            <label for="stuEmail">Enter Student Email</label>
            <input type="text" name="stu[email]" id="stuEmail" value="<?php echo $stuData['stu_email']; ?>" >
            <?php echo validateForm('stu','email'); ?>
        </div>
        <div class="data-class">
            <label for="stuClass">Select Student Class</label>
            <?php $classData = fetchAllRecord($conn,"stu_classes"); ?>
            <select name="stu[class]" id="stuClass">
                <?php while($row = mysqli_fetch_assoc($classData)): ?>
                <option value="<?php echo $row['class_name']; ?>" <?php if($row['class_name'] == $stuData['stu_class']){echo "selected";} ?> ><?php echo $row['class_name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="data-address">
            <label for="stuAddress">Enter Student Address</label>
            <textarea name="stu[address]" id="stuAddress" cols="30" rows="5"><?php echo $stuData['stu_address']; ?></textarea>
            <?php echo validateForm('stu','address'); ?>
        </div>
        <input type="submit" name="updateStudent" value="Update Student" >
    </fieldset>
</div>
</form>