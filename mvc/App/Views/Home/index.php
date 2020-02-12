<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
    <h1>This is Index page of Home View</h1><br>
    <h2>Welcome<?php echo htmlspecialchars($name); ?></h2>
    <ul>
        <?php foreach ($colors as $c): ?>
        <li><?php echo  htmlspecialchars($c); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>