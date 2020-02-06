<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlogPosts</title>
    <link rel="stylesheet" href="css/main.css" >
</head>
<?php require_once "post_data.php";
sessionRedirect('email');
$u_id = $_SESSION['u_id'];
$result = fetchRecord($conn,"blog_post","u_id = '$u_id' ");
?>
<body>
    <?php require_once "header.php"; ?>
    <h1>BLOG POSTS</h1>
    <a href="add_blog_post.php"><input type ="button" value="Add Blog Post" class="styleBtn" ></a>
    <table  border = "2">
        <tr>
            <th>Post Id</th>
            <th>Category Name</th>
            <th>Title</th>
            <th>Published Date</th>
            <th>Actions</th>
        </tr>
        <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($blog = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><a href="view_blog_post.php?id=<?=$blog['b_id'];?>"><?= $blog['b_id']; ?></a></td>
            <td><?= $blog['b_category']; ?></td>
            <td><?= $blog['b_title']; ?></td>
            <td><?= $blog['b_published_at']; ?></td>
            <td>
                <a href="edit_blog.php?id=<?= $blog['b_id']; ?>">Edit</a>
                <a href="delete.php?id=<?= $blog['b_id']; ?>&tbl=blog_post">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        <?php endif; ?>
    </table>
</body>
</html>