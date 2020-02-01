<?php

require_once "connect.php";
echo "<pre>";

echo "</pre>";

$result = fetchRecords($conn,"customers");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Details</title>
</head>
<body>
    <table border="2">
        <tr>
            <th>C_Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>State</th>
            <th>Country</th>
            <th>Hobbies</th>
            <th>Clients</th>
            <th>Actions</th>
        </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
        <td>
                <?php echo $row['c_id']; ?>
            </td>
            <td>
                <?php echo $row['c_fname']; ?>
            </td>
            <td>
                <?php echo $row['c_lname']; ?>
            </td>
            <td>
                <?php echo $row['c_state']; ?>
            </td>
            <td>
                <?php echo $row['c_country']; ?>
            </td>
            <td>
                <?php echo $row['Hobbies']; ?>
            </td>
            <td>
                <?php echo $row['Clients']; ?>
            </td>
            <td>
                <a href="view.php?c_id=<?php echo $row['c_id'] ?>" target="_blank">View</a>
                <a href="edit.php?c_id=<?php echo $row['c_id'] ?>">Edit</a>                
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
</body>
</html>