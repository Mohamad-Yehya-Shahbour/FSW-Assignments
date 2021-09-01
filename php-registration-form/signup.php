<?php

include "connection.php"; // connect php to database

//checking if we are recieving the array including data from the user
if(isset($_POST) && !empty($_POST) && sizeof($_POST) >= 3
&&!empty($_POST['name']) && !empty($_POST['email']) 
&& !empty($_POST['pass'])){

    //putting entered data in variables
    $FullName = $_POST['name'];
    $Email = $_POST['email'];
    $Pass = $_POST['pass'];

    //hashing password
    $HashedPass = hash("sha256", $Pass);

    //writing the query, executing it and fetching the output data 
    $query = $connection ->
    prepare("SELECT * FROM users WHERE users.Email = ?");

    $query -> bind_param("s", $Email);

    $query->execute();

    $result = $query->get_result();

    $result -> fetch_assoc();

    // getting rows number of recieved data
    $number = mysqli_num_rows($result);

    $query->close();

    //checking if we are getting data. If yes that means the email is already existed
    if($number>0){

        die("email taken");

    }else{
        
        //adding data to database
        $stmt = $connection->prepare("INSERT INTO users (FullName, Email, Pass) VALUES (?, ?, ?)");

        $stmt->bind_param("sss", $FullName, $Email, $HashedPass);

        $stmt->execute();

        $stmt->close();

        $connection->close();

        header("Location: index.html");
        
    }
    
}else{
    die("please enter required data ");
}



    
    




    







    /*$query = $connetion -> prepare("INSERT INTO users (FullName, Email, Pass) Values (?,?,?)");
    $query -> bind_param("sss", $FullName, $Email, $HashedPass);
    $query -> execute();
    $query -> close();
    $connetion -> close();
    header ("Location:index.html");*/

    /*$sql = "INSERT INTO users (FullName, Email, Pass) Values ('$FullName','$Email','$Pass')";
    if (mysqli_query($connection, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "error";}*/

?>