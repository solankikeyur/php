<?php

$string = "My name is keyur solanki .";

$count = str_word_count($string);

echo $count;

//pass argument 1 to return array and 2 to return associative array

$count = str_word_count($string,1);
print_r($count);

$count = str_word_count($string,2);
print_r($count);

//third argument to include that string 

$count = str_word_count($string,1,".");
print_r($count);

$shuffled = str_shuffle($string);

echo "Shuffled string is ".$shuffled."<br>";

$sub = substr($string,0,4);
echo $sub."<br>";

$rev = strrev($string);
echo $rev;

$string1 = "My name is keyur";
$string2 = "My name is nikunj";

similar_text($string1,$string,$result);

echo "Similarity is ".$result."<br>";

echo strlen($string1);

?>