<?php

$arr = [5, 9, 2, 8, 12, 20, 7, 6, -2, 0, 1, 11, 13, 33, 15];
$oddArray = array();
$evenArray = array();

foreach ($arr as $value) {
    if ($value%2 == 0)
    {
        $evenArray[]=$value;
    }
    else {
        $oddArray[]=$value;
    }
}

print_r($evenArray);
print_r($oddArray);

?>