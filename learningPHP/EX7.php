<?php

$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

$max=0;
foreach ($age as $x => $value) {
    if($value > $max)
    {
        $max = $value;
        $result = $x;
    }
}

print($result);

?>