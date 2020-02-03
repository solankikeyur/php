<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Blog</title>
</head>
<?php require_once "post_data.php";
sessionRedirect('email');
$category = fetchAllRecord($conn,'parent_cat');
?>
<body>
    <h1>Add New Blog Post</h1>
    <form method="POST" action = "add_blog_post.php">
        <div class="data-blog">
            <div class="data-title">
                <label for="title">Title</label>
                <input type="text" name="blog[title]" id="title">
            </div>
            <div class="data-content">
                <label for="content">content</label>
                <textarea name="blog[content]" id="content" cols="30" rows="10"></textarea>
            </div>
            <div class="data-url">
                <label for="url">URL</label>
                <input type="text" name="blog[url]" id="url">
            </div>
            <div class="data-published">
                <label for="published">Published At</label>
                <input type="date" name="blog[published]" id="published">
            </div>
            <div class="data-category">
                <label for="category">Category</label>
                <select name="blog[category][]" multiple>
                    <?php while($c = mysqli_fetch_assoc($category)): ?>
                    <option value="<?= $c['cat_name']; ?>"><?= $c['cat_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <input type="submit" name="blog[submit]" value="Add Blog" >
    </form>
</body>
</html>