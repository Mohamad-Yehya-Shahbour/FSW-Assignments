<?php
/* session_start();

$server = "localhost";
$username = "root";
$password = "";
$dbname = "e-commercedb";

$connection = new mysqli($server, $username, $password, $dbname);

if($connection->connect_error){
	die("Failed");
}


//print_r($_POST);
$userid = $_POST['userid'];


$result3 = mysqli_query($connection, "SELECT * FROM userproducts, products WHERE userproducts.ProductId = products.Id AND userproducts.UserId=$userid"); #getting favorite products for specific user
$arr_rows3 = array();
while( $rows3 =  $result3->fetch_assoc() ){
    $arr_rows3[] = $rows3;
}

$_SESSION[ 'result3' ] = $arr_rows3;


header('location: ../favorites.php'); */

?>