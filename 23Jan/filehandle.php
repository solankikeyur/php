<?php

$details = file_get_contents("regDetails.txt");
$array = json_decode($details);
print_r($array);
echo $array[1]->name;

?>