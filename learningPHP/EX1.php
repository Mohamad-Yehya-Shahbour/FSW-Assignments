<?php

function Factorial($num)
{
    if ($num < 0)
    {
        return null;
    }
    if ($num == 0)
    {
        return 1;
    }
    
    $result = 1;
    for ($i = 1; $i < $num + 1; $i++)
    {
        $result = $result * $i;
    }
    return $result;
}

print(Factorial(0));


?>