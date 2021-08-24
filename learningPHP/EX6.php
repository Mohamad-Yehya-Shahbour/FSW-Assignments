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


function ConvertBinaryToDecimal($binary)
{
    $binary = strval($binary);
    $binaryArray = str_split($binary);
    $reversedBinaryArray = ReverseArray($binaryArray);
    
    $result = 0;
    for ($i = 0; $i < count($reversedBinaryArray); $i++)
    {
        $res = $reversedBinaryArray[$i] * pow(2, $i);
        $result = $result + $res;
    }
    return $result;
}


$binary = 101010;
print(ConvertBinaryToDecimal($binary));

?>