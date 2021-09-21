<?php

session_start();
include "connection.php";
$name = $_SESSION["userName"];

$array = [];
$array["userName"] = $name;

$json = json_encode($array);
echo $json;


?>