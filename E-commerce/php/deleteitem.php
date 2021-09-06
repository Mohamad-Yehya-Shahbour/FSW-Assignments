<?php
include "connection.php";

print_r($_POST);

$id = $_POST["id"];

$result = mysqli_query($connection, "DELETE FROM `products` WHERE products.Id = $id"); #deleting specific product by its seller

header('location: ../home.php');

?>