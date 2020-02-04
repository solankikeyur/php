<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Category</title>
    <link rel="stylesheet" href="css/main.css" >
</head>
<?php 
require_once "post_data.php";
sessionRedirect('email');
$selectQuery = "SELECT * FROM category c INNER JOIN parent_cat p ON c.parent_cat_id = p.parent_cat_id";
$result = mysqli_query($conn,$selectQuery);
?>
<body>
<?php require_once "header.php"; ?>

    <h1>Blog Category</h1><br><br>
    <a href="add_category.php"><input type ="button" value="Add Category" class="styleBtn" ></a>
    <table  border = "2">
        <tr>
            <th>Category Id</th>
            <th>Category Image</th>
            <th>Category Name</th>
            <th>Created Date</th>
            <th>Actions</th>
        </tr>
        <?php while($cat = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $cat['c_id']; ?></td>
            <td><img src="<?=$cat['c_image']?>" width="100px" height="100px"></td>
            <td><?= $cat['cat_name']; ?></td>
            <td><?= $cat['created_at']; ?></td>
            <td>
                <a href="edit_cat.php?id=<?=$cat['c_id']?>">Edit</a>
                <a href="delete.php?id=<?= $cat['c_id']?>&tbl=category">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>