<?php
session_start();
include "connection.php";

/* $server = "localhost";
$username = "root";
$password = "";
$dbname = "e-commercedb";

$connection = new mysqli($server, $username, $password, $dbname);

if($connection->connect_error){
	die("Failed");
} */



$Name = $_SESSION["username"];
$UserId = $_SESSION["id"];

if(isset($_POST["title"]) && $_POST["title"] != "" && strlen($_POST["title"]) >= 3) {
    $Title = $_POST["title"];
}else{
    die ("Enter a valid title");
}

if(isset($_POST["description"]) && $_POST["description"] != "" && strlen($_POST["description"]) >= 3) {
    $Description = $_POST["description"];
}else{
    die ("Enter a valid description");
}

if(isset($_POST["image"]) && $_POST["image"] != "") {
    $Image = $_POST["image"];
    $ImageUrl = "images/".$Image;
}else{
    die ("Enter a valid image");
}


$sql1 = "INSERT INTO products (Title, Description, ImageUrl, SellerId) VALUES (?,?,?,?);"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("sssi", $Title, $Description, $ImageUrl, $UserId );
$stmt1->execute();
$result = $stmt1 -> get_result();

header('location: ../home.php');

?>