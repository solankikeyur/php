
<?php 
require_once "dashboard.php";
require_once "postData.php";
sessionRedirect('email');
?>
<h2>Add Student Details</h2>
<form method="POST" action = "addStudent.php">
<div class="data-student">
    <fieldset>
        <div class="data-name">
            <label for="stuName">Enter Student Name</label>
            <input type="text" name="stu[name]" id="stuName" value="<?php echo getPostData('stu','name'); ?>" >
            <?php echo validateForm('stu','name'); ?>
        </div>
        <div class="data-email">
            <label for="stuEmail">Enter Student Email</label>
            <input type="text" name="stu[email]" id="stuEmail" value="<?php echo getPostData('stu','email'); ?>" >
            <?php echo validateForm('stu','email'); ?>
        </div>
        <div class="data-class">
            <label for="stuClass">Select Student Class</label>
            <?php $classData = fetchAllRecord($conn,"stu_classes"); ?>
            <select name="stu[class]" id="stuClass">
                <?php while($row = mysqli_fetch_assoc($classData)): ?>
                <option value="<?php echo $row['class_name']; ?>" <?php if($row['class_name'] == getPostData('stu','class')){echo "selected";} ?> ><?php echo $row['class_name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="data-address">
            <label for="stuAddress">Enter Student Address</label>
            <textarea name="stu[address]" id="stuAddress" cols="30" rows="5"><?php echo getPostData('stu','address'); ?></textarea>
            <?php echo validateForm('stu','address'); ?>
        </div>
        <input type="submit" name="addStudent" value="Add Student" >
    </fieldset>
</div>
</form>
</body>
</html>
