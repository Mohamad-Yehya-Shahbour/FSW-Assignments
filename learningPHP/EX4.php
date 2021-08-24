<?php

function ReverseArray($arr)
{
    
    $arr2 = array();

    for ($i = count($arr)-1; $i > -1; $i--)
    {
        $arr2[] = $arr[$i];
    }
    return $arr2;
}

$arr1 = ["red", "blue", "orange", "yellow", "green", "gray"];

print_r(ReverseArray($arr1));

?>