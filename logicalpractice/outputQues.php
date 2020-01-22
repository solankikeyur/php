<?php

$a = '1';
echo $b = &$a."<br>";
echo $c = "2$b"."<br>";

echo "Var Dump<br>";
var_dump(0123 == 123);
echo "<br>"; //flse
var_dump('0123' == 123);
echo "<br>";  //true
var_dump('0123' === 123); //false
echo "<br>";
$x = true and false;
//var_dump($x);


$array = [1 => "a","1" => "b",1.5 => "c",true => "d","2" => "k",2.5 => "y"];

print_r($array);
?>