<?php require_once "dashboard.php";
require_once "postData.php";
sessionRedirect('email');

$stuData = fetchAllRecord($conn,"stu_data");
?>
<div class="data-student">
    <h2>Students Record</h2>
    <center>
    <table border="2">
        <tr>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Student Class</th>
            <th>Student Address</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($stuData)): ?>
        <tr>
            <td><?php echo $row['stu_name']; ?></td>
            <td><?php echo $row['stu_email']; ?></td>
            <td><?php echo $row['stu_class']; ?></td>
            <td><?php echo $row['stu_address']; ?></td>
            <td><a href="edit.php?stuid=<?php echo $row['stu_id'] ?>">Edit</a><a href="delete.php?stuid=<?php echo $row['stu_id'] ?>">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</center>
</div>
</body>
</html>