<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" >
    <title>Add Blog</title>
</head>
<?php require_once "post_data.php";
sessionRedirect('email');
$category = fetchAllRecord($conn,'parent_cat');
?>
<body>
    <h1>Add New Blog Post</h1><center>
    <form method="POST" action = "add_blog_post.php">
        <div class="data-blog">
            <div class="data-title">
                <label for="title">Title</label><br><br>
                <input type="text" name="blog[title]" id="title"><br><br>
            </div>
            <div class="data-content">
                <label for="content">content</label><br><br>
                <textarea name="blog[content]" id="content" cols="30" rows="10"></textarea><br><br>
            </div>
            <div class="data-url">
                <label for="url">URL</label><br><br>
                <input type="text" name="blog[url]" id="url"><br><br>
            </div>
            <div class="data-published">
                <label for="published">Published At</label><br><br>
                <input type="date" name="blog[published]" id="published"><br><br>
            </div>
            <div class="data-category">
                <label for="category">Category</label><br><br>
                <select name="blog[category][]" multiple><br><br>
                    <?php while($c = mysqli_fetch_assoc($category)): ?>
                    <option value="<?= $c['cat_name']; ?>"><?= $c['cat_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <input type="submit" name="blog[submit]" value="Add Blog" class="styleBtn" >
        <a href="blog_posts.php"><input type="button" value="Back" class="styleBtn" ></a>
    </form>
    </center>
</body>
</html>