<?php

$list1 = "4, 5, 6, 7, 10, 12, 15, 1, 5, 6, 20";
$list2 = "4, 5, 7, 8, 10, 15";
$list = $list1 .",". $list2;

$listArray = explode(",", $list);
$filtered = array_unique($listArray);
$result = implode(",", $filtered);

print($result)

?>