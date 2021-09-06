<?php
include "connection.php";


$userid = $_POST["usersidproducts"];
$productid = $_POST["productid"];


$result = mysqli_query($connection, "DELETE FROM `userproducts` WHERE userproducts.UserId = $userid AND userproducts.ProductId = $productid");

header('location: ../home.php');

?>