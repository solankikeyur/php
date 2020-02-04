<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <link rel="stylesheet" href="css/main.css" >
</head>
<?php require_once "post_data.php";
sessionRedirect('email'); 
$id = $_GET['id'];
$result = fetchRecord($conn,"category","c_id = '$id'");
$category = mysqli_fetch_assoc($result);
$pId = $category['parent_cat_id'];
$parentCat = fetchRecord($conn,"parent_cat","parent_cat_id = '$pId'");
$pResult = mysqli_fetch_assoc($parentCat);

?>
<body>
    <h1>Update Category</h1><hr>
    <center>
    <form method="POST" action="edit_cat.php?id=<?=$id?>" enctype="multipart/form-data" >
    <div class="data-cat">
        <div class="data-title">
            <label for="title">Title</label><br><br>
            <input type="text" name="cat[title]" id="title" value="<?=$category['c_title']?>"><br><br>
        </div>
        <div class="data-content">
            <label for="content">Content</label><br><br>
            <textarea name="cat[content]" id="content" cols="30" rows="10"><?=$category['c_content']?></textarea><br><br>
        </div>
        <div class="data-url">
            <label for="url">URL</label><br><br>
            <input type="text" name="cat[url]" id="url" value="<?=$category['c_url']?>"><br><br>
        </div>
        <div class="data-meta">
            <label for="metaTitle">Meta-Title</label><br><br>
            <input type="text" name="cat[meta]" id="metaTitle" value="<?=$category['c_meta_title']?>"><br><br>
        </div>
        <div class="data-parentCat">
            <label for="parentCat">ParentCategory</label>
            <?php $catRessult = fetchAllRecord($conn,"parent_cat");?>
            <select name="cat[parentCat]">
                <?php while($cat = mysqli_fetch_assoc($catRessult)): ?>
                <option value=<?= $cat['parent_cat_id']; ?> <?php if($cat['cat_name'] == $pResult['cat_name'] ){echo "selected";} ?>><?= $cat['cat_name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div><br><br>
        <div class="data-image">
            <label for="catImage">Image</label>
            <input type="file" name="image" id="catImage">
        </div><br>
        <input type="submit" name="addCat[update]" value="Update Category" class="styleBtn">
        <a href="manage_cat.php"><input type="button" value="Back" class="styleBtn" ></a>
    </div>
</form>
</center>
</body>
</html>