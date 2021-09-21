<?php

session_start();
include "connection.php";
$userId = $_SESSION["userId"] ;
$name = $_GET["name"];




$sql1="UPDATE users SET users.Name = ? WHERE users.Id = ?;";

$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss", $name, $userId);
$stmt1->execute();

$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;


?>