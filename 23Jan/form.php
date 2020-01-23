<?php

$page_name = $_SERVER['SCRIPT_NAME'];
$ip_address = $_SERVER['REMOTE_ADDR'];

?>

<form action="<?php echo $page_name; ?>" method="POST">
    <input type="submit" name="submit">
</form>