<?php

$directory = "openfiles";
if($open = opendir($directory.'/')){
    while($f = readdir($open)){
        echo "<a href='$directory/$f'>".$f."</a>"."<br>";
    }
}

$file_name = "fileOne.txt";

if(file_exists("openFiles/".$file_name)){
    echo "File Already Exists";
}else{
    echo "Created";
}

?>