<?php

session_start();
include "connection.php";
$userId = $_SESSION["userId"] ;



$sql1="SELECT connections.Friend_Id as FriendId , users.Name FROM `connections`, users
WHERE connections.Friend_Id = users.Id
AND connections.User_Id = $userId
AND connections.IsPending = 0
AND connections.IsBlocked = 0
AND connections.IsDeclined = 0;";

$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
$result = $stmt1->get_result();

$sql2="SELECT connections.User_Id as FriendId, users.Name FROM `connections`, users
WHERE connections.User_Id = users.Id
AND connections.Friend_Id = $userId
AND connections.IsPending = 0
AND connections.IsBlocked = 0
AND connections.IsDeclined = 0;";

$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();

$arr_rows = array();

while( $rows =  $result->fetch_assoc() ){
    $arr_rows[] = $rows;
}
while( $rows =  $result2->fetch_assoc() ){
    $arr_rows[] = $rows;
}

$json = json_encode($arr_rows);

echo $json; 



?>