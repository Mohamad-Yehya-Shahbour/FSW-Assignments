<?php

session_start();
include "connection.php";
$userId = $_SESSION["userId"] ;
$id = $_GET["id"];



$sql1="UPDATE connections 
SET IsPending = 0 , IsBlocked = 0, IsDeclined = 1 
WHERE connections.Friend_Id = $userId
AND connections.User_Id = $id";

$stmt1 = $connection->prepare($sql1);
$stmt1->execute();

$decline = "decline";

$sql2="INSERT INTO `notifications` (`User_Id`, `Message`,`Friend_Id` ) Values ( ?, ?, ?);";

$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("sss", $id, $decline, $userId);
$stmt2->execute();


$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;


?>