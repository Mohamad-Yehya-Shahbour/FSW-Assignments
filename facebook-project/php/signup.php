<?php
include "connection.php";



if(isset($_POST["namesignup"]) && $_POST["namesignup"] != "" && strlen($_POST["namesignup"]) >= 3) {
    $Name = $_POST["namesignup"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["emailsignup"]) && $_POST["emailsignup"] != "" && strlen($_POST["emailsignup"]) >= 5) {
    $Email = $_POST["emailsignup"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["passsignup"]) && $_POST["passsignup"] != "" && strlen($_POST["passsignup"]) >= 3) {
    $Pass = $_POST["passsignup"];
    $hash = hash('sha256', $Pass);
}else{
    die ("Enter a valid input");
}

if(isset($_POST["confirmpasssignup"]) && $_POST["confirmpasssignup"] != "" && strlen($_POST["confirmpasssignup"]) >= 3) {
    $ConfirmPass = $_POST["confirmpasssignup"];
}else{
    die ("Enter a valid input");
}

if($Pass =! $ConfirmPass){
    die ("Enter a valid input");
}



$sql1="SELECT * FROM users WHERE Email=?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$Email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();



if(empty($row)){
    $sql2 = "INSERT INTO users (Name, Email, Pass) VALUES (?, ?, ?);";
    $stmt2 = $connection->prepare($sql2);
    $stmt2->bind_param("sss", $Name, $Email, $hash);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    session_start();
    header('location: ../index.html');
    }
    else{
        session_start();
        header('location: ../index.html');
    }




?>