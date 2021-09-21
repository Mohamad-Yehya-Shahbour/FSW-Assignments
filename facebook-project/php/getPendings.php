<?php

session_start();
include "connection.php";
$userId = $_SESSION["userId"] ;



$sql1="SELECT connections.User_Id, users.Name 
FROM users, connections 
WHERE users.Id = connections.User_Id 
AND connections.Friend_Id=$userId 
AND connections.IsPending=1
AND connections.IsBlocked=0;";

$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
$result = $stmt1->get_result();

$arr_rows = array();

while( $rows =  $result->fetch_assoc() ){
    $arr_rows[] = $rows;
}

$json = json_encode($arr_rows);

echo $json; 



?>