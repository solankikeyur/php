<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
</head>
<?php require_once "post_data.php";
sessionRedirect('email'); ?>
<body>
    <h1>Add New Category</h1><hr>
    <form method="POST" action="add_category.php">
    <div class="data-cat">
        <div class="data-title">
            <label for="title">Title</label><br><br>
            <input type="text" name="cat[title]" id="title"><br><br>
        </div>
        <div class="data-content">
            <label for="content">Content</label><br><br>
            <textarea name="cat[content]" id="content" cols="30" rows="10"></textarea><br><br>
        </div>
        <div class="data-url">
            <label for="url">URL</label><br><br>
            <input type="text" name="cat[url]" id="url"><br><br>
        </div>
        <div class="data-meta">
            <label for="metaTitle">Meta-Title</label><br><br>
            <input type="text" name="cat[meta]" id="metaTitle"><br><br>
        </div>
        <div class="data-parentCat">
            <label for="parentCat">ParentCategory</label>
            <?php $catRessult = fetchAllRecord($conn,"parent_cat");?>
            <select name="cat[parentCat]">
                <?php while($cat = mysqli_fetch_assoc($catRessult)): ?>
                <option value=<?= $cat['parent_cat_id']; ?>><?= $cat['cat_name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div><br><br>
        <input type="submit" name="addCat[submit]" value="Add Category">
    </div>
</form>
</body>
</html>