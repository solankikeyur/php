<?php
require_once "post_data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" >
    <title>Edit Blog</title>
</head>
<?php require_once "post_data.php";
sessionRedirect('email');
$id = $_GET['id'];
$category = fetchAllRecord($conn,'parent_cat');
$blogResult = fetchRecord($conn,'blog_post',"b_id = '$id' ");
$blog = mysqli_fetch_assoc($blogResult);
?>
<body>
    <h1>View Blog Post</h1>
    <center>
    <form method="POST" action = "">
        <div class="data-blog">
            <div class="data-title">
                <label for="title">Title</label><br><br>
                <input type="text" name="blog[title]" id="title" value="<?= $blog['b_title']; ?>" disabled><br><br>
            </div>
            <div class="data-content">
                <label for="content">content</label><br><br>
                <textarea name="blog[content]" id="content" cols="30" rows="10" disabled><?= $blog['b_content']; ?></textarea><br><br>
            </div>
            <div class="data-url">
                <label for="url">URL</label><br><br>
                <input type="text" name="blog[url]" id="url" value="<?= $blog['b_url']; ?>" disabled><br><br>
            </div>
            <div class="data-published">
                <label for="published">Published At</label><br><br>
                <input type="date" name="blog[published]" id="published" value="<?= $blog['b_published_at']; ?>" disabled><br><br>
            </div>
            <div class="data-category">
                <label for="category">Category</label><br><br>
                <?php $fetchCat = explode(",",$blog['b_category']); ?>
                <select name="blog[category][]" multiple disabled><br><br>
                    
                    <?php while($c = mysqli_fetch_assoc($category)): ?>
                    <option value="<?= $c['cat_name']; ?>" <?php if(in_array($c['cat_name'],$fetchCat)){echo "selected";} ?> ><?= $c['cat_name']; ?></option>
                    
                    <?php endwhile; ?>
                    
                </select>
            </div>
        </div>
        <a href="blog_posts.php"><input type="button" value="Back" class="styleBtn" ></a>
    </form>
    </center>
</body>
</html>