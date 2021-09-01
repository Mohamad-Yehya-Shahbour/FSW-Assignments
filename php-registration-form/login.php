<?php

session_start();
include "connection.php"; // connect php to database

//checking if we are recieving the array including data from the user

if(isset($_POST) && !empty($_POST)
&& sizeof($_POST) == 2 
&&!empty($_POST['email']) 
&& !empty($_POST['pass']) ){

    //putting entered data in variables

    $Email = $_POST['email'];
    $Pass = $_POST['pass'];

    //hashing password
    $HashedPass = hash("sha256", $Pass);

    //writing the query, executing it and fetching the output data 
    $query = $connection -> 
    prepare("SELECT * FROM users WHERE users.Email = ? AND users.Pass = ?");

    $query -> bind_param("ss", $Email, $HashedPass);

    $query->execute();

    $result = $query->get_result();
    
    $user = $result -> fetch_assoc();

    $username = $user["FullName"];

    // getting rows number of recieved data
    $number = mysqli_num_rows($result);

        if($number==1){
            //echo "logged in";
            header("Location: home.php");

            $_SESSION["username"] = $username;
            
        }else{
            //echo "not logged in";
            header("Location: login.html");
        
        }

}else{
    die("please enter required data");
}



?>