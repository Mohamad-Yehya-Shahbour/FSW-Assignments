<?php

session_start();
include "connection.php";
$id = $_GET["id"];
$userId = $_SESSION["userId"] ;




$sql1="INSERT INTO `connections`(`User_Id`, `Friend_Id`, `IsPending`, `IsBlocked`, `IsDeclined`) VALUES ( $userId, $id, 0, 1, 0);";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();

$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;


?>