<?php

$arr = [5, 12, 18, 2, 7, 0, 20, 3, 25, -5, -8, -12];
$max = 0;
$min = 0;

foreach ($arr as $num) {
    if ($num > $max)
    {
        $max = $num;
    }
    if ($num < $min)
    {
        $min = $num;
    }
}

print("maximum is: " . $max . "\n");
print("minimum is: " . $min);

?>