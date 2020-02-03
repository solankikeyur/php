<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Category</title>
    <style>
        ul li{
            display:inline;
        }
        </style>
</head>
<?php 
require_once "post_data.php";
sessionRedirect('email');
$selectQuery = "SELECT * FROM category c INNER JOIN parent_cat p ON c.parent_cat_id = p.parent_cat_id";
$result = mysqli_query($conn,$selectQuery);
?>
<body>
    <div class="data-nav">
        <ul>
            <li><a  href="blog_posts.php">HOME</a></li>
            <li><a href="manage_cat.php">Manage Category</a></li>
            <li><a href="">My Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <h1>Blog Category</h1><br><br>
    <a href="add_category.php"><input type ="button" value="Add Category" ></a>
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
            <td>Image</td>
            <td><?= $cat['cat_name']; ?></td>
            <td><?= $cat['created_at']; ?></td>
            <td>
                <a href="">Edit</a>
                <a href="delete.php?id=<?= $cat['c_id']?>&tbl=category">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>