<?php

session_start();
include "connection.php";
$id = $_GET["id"];
$userId = $_SESSION["userId"] ;




$sql1="UPDATE connections 
SET IsPending = 0 , IsBlocked = 1, IsDeclined = 0 
WHERE (connections.Friend_Id = $userId
AND connections.User_Id = $id)
OR (connections.Friend_Id = $id
AND connections.User_Id = $userId);";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();

$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;


?>