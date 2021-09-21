<?php

session_start();
include "connection.php";
$name = $_GET["name"];
$userId = $_SESSION["userId"] ;

//echo $userId;

$sql1="SELECT * FROM users WHERE users.Name LIKE '%$name%' 
AND users.Id <> $userId
AND users.Id NOT IN (SELECT connections.Friend_Id
                        FROM connections, users
                        WHERE connections.User_Id= users.Id
                        AND connections.User_Id=$userId
                        AND connections.IsBlocked=1
                        OR(connections.IsPending=0 AND connections.IsBlocked=0 And connections.IsDeclined=0)
						)
                        AND users.Id
                        NOT IN (SELECT connections.User_Id
                        FROM connections, users
                        WHERE connections.Friend_Id= users.Id
                        AND connections.Friend_Id=$userId
                        AND connections.IsBlocked=1
                        OR(connections.IsPending=0 AND connections.IsBlocked=0 And connections.IsDeclined=0)
                        ) ;";

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