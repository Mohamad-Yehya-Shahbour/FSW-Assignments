<?php
include "connection.php";



if(isset($_POST["email"]) && $_POST["email"] != "" && strlen($_POST["email"]) >= 5) {
    $Email = $_POST["email"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["pass"]) && $_POST["pass"] != "" && strlen($_POST["pass"]) >= 3) {
    $Pass = $_POST["pass"];
    $hash = hash('sha256', $Pass);
}else{
    die ("Enter a valid input");
}

if(isset($_POST["flexRadioDefault"]) && $_POST["flexRadioDefault"] != "") {
    $Role = $_POST["flexRadioDefault"];
}else{
    die ("Enter a valid input");
}


$sql1="SELECT * FROM `users` WHERE users.Email=? AND users.Pass=? AND users.Role=?;"; #Check if the user already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ssi",$Email, $hash, $Role);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();





$sql2="SELECT * FROM `products` WHERE products.SellerId=?;"; #getting products for specific seller
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("i", $row["Id"]);
$stmt2->execute();
$result2 = $stmt2->get_result();

$arr_rows = array();
while( $rows =  $result2->fetch_assoc() ){
    $arr_rows[] = $rows;
}





$count = mysqli_num_rows($result);



if($count != 0){
    $Name = $row["Name"];
    $Id = $row["Id"];
    session_start();
    
    $_SESSION["username"] = $Name;
    $_SESSION["role"] = $Role;
    $_SESSION["id"] = $Id;
    $_SESSION[ 'result' ] = $arr_rows;
    $_SESSION[ 'result2' ] = $arr_rows2;

    header('location: ../home.php');
    $_SESSION["checking"] = "";

    $connection -> close();
    }
    else{
        session_start();
        $_SESSION["checking"] = "enter valid input";
        header('location: ../login.php');
    }


?>