<?php

echo "<h5>String word count</h5>";
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

echo "<h5>String Shuffle</h5>";
$shuffled = str_shuffle($string);

echo "Shuffled string is ".$shuffled."<br>";

echo "<h5>Sub-String</h5>";
$sub = substr($string,0,4);
echo $sub."<br>";

echo "<h5>String Reverse</h5>";
$rev = strrev($string);
echo $rev;

echo "<h5>Similar Text</h5>";
$string1 = "My name is keyur";
$string2 = "My name is nikunj";

similar_text($string1,$string,$result);

echo "Similarity is ".$result."<br>";

echo "<h5>String length</h5>";
echo strlen($string1)."<br>";
for($i=0;$i<strlen($string);$i++){
    echo $string[$i]."<br>";
}



?>

<form method="post" action="stringfunctions.php">
    <textarea name="txtString" placeholder="Enter Your Text Here...." row="4" col="6" ></textarea><br>
    <input type="submit" name="Convert" value="Convert Text To Lower" >
</form>
<?php
    echo "<h3>String to lower case and upper case converter</h3><hr>";
    if(isset($_POST['txtString'])){
        echo "Lower Case String<br>";
        echo strtolower($_POST['txtString'])."<br>";
        echo "Upper Case String<br>";
        echo strtoupper($_POST['txtString'])."<br>";
    }
    echo "<h4>String Position</h4>";
$str = "My name is keyur and his name is nikunj";
$find = 'is';
echo strpos($str,$find)."<br>";

echo "<h4>String Replace</h4>";
echo substr_replace($str,'ok',11,5)."<br>";

echo str_replace($find,"IS",$str)."<br>";

$list = array('is','keyur','nikunj');
$r = array('IS','KEYUR','NIKUNJ');

echo str_replace($list,$r,$str);
?>

