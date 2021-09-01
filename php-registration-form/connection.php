<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "usersdb";

$connection = new mysqli($server, $username, $password, $dbname); //establishing the connection between php and database

if($connection->connect_error){
	die("Failed");
}

?>