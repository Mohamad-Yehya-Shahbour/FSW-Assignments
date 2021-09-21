<?php

session_start();
include "connection.php";
$userId = $_SESSION["userId"] ;



$sql1="SELECT notifications.Friend_Id, notifications.Message, users.Name 
FROM `notifications`, users 
WHERE notifications.Friend_Id = users.Id 
AND notifications.User_Id = $userId;";

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