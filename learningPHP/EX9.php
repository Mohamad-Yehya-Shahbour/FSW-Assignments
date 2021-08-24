<?php

function DeleteFromArray($array, $valueToDelete)
{
    foreach ($array as $index => $value) {
        if ($value == $valueToDelete)
        {
            $indexToDelete = $index;
        }
    }
    unset($array[$indexToDelete]);

    return $array;
}

$array1 = ["a", "b", "c", "d", "e"];

print_r(DeleteFromArray($array1, "d"));

?>