<?php
include "connection.php";

//print_r($_POST);

$userid = $_POST["userid"];
$productid = $_POST["productid"];

$result = mysqli_query($connection, "INSERT INTO `userproducts`(UserId, ProductId) VALUES ($userid, $productid)");

header('location: ../home.php');

?>