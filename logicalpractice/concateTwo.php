<?php
error_reporting(0);

function concateTwo($str1,$str2){
    $length = 0;
    if(strlen($str1) > strlen($str2)){
        $length = strlen($str1);
    }else{
        $length = strlen($str2);
    }
    $result = "";
    for($i = 0;$i < $length;$i++){
        $result = $result.$str1[$i].$str2[$i];
    }
   echo $result;
}
concateTwo("KEYUR","SOLANKI");
?>
