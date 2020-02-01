<?php require_once "dashboard.php";
require_once "postData.php";
sessionRedirect('email');

$logData = fetchAllRecord($conn,"user_log");
?>
<div class="data-student">
    <h2>Previously logged users</h2>
    <center>
    <table border="2">
        <tr>
            <th>Logged User</th>
            <th>Login Time</th>
            <th>Login Date</th>
            <th>Logout Time</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($logData)): ?>
        <tr>
            <td><?php echo $row['login_user']; ?></td>
            <td><?php echo $row['login_time']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['logout_time']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</center>
</div>
</body>
</html>