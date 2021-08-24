<?php

$array1 = [1, 2, 4, 9, 15, 8, 15];
$array2 = [13, 12, 4, 1, 7, 15, 8, 8];

function Union($array1, $array2)
{
    $array = array();

    for ($i = 0 ; $i < count($array2); $i++)
    {
        $array1[] = $array2[$i];
    }
    
    $filtered = array_unique($array1);

return $filtered;
}

print_r(Union($array1, $array2));

?>