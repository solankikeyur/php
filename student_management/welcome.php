<?php require_once "dashboard.php"; 
require_once "postData.php";
sessionRedirect('email');?>
<center>
<h1>Welcome, <?php echo $_SESSION['email']; ?></h1>
</center>
</body>
</html>