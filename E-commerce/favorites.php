<?php

session_start();
include "php/connection.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap 4 Static Navbar</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- <link href="style/homestyle.css" rel="stylesheet" type="text/css" media="all"> -->
<link href="style/bootstrap4.min.css" rel="stylesheet">
<link href="style/test.css" rel="stylesheet">

</head>


<body>


<nav class="bg-dark navbar-dark ">
        <div class="container">


            <a  class=" d-inline navbar-brand my-font text-white">
              <i class="fas fa-tree mr-2"></i><?php
                                                    if($_SESSION["role"] == 0){
                                                        $name = $_SESSION["username"];
                                                        echo $name;
                                                    }else{
                                                        $name = $_SESSION["username"];
                                                        echo $name . " Real Estate";
                                                    }
                                                ?>
            </a>
            <a href="home.php" class=" d-inline text-white mb-3 myfavfont navbar-brand">Lands</a>
            <a href="php/logout.php" class="d-inline text-white  mt-3 navbar-brand float-right">logout</a>


        </div>
    </nav>
    <section id="header" class="jumbotron text-center ">
        <h1 class="display-3">LANDS SHOP</h1>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        <!-- <a href="" class="btn btn-primary">Click</a> -->
        
    </section>
        
    <section id="gallery">
        
        <div class="container pt-5">
            
            <h2  class = 'text-center'><i class='fas fa-tree'> <u> Your Favorite Lands </u></h2></i><br>
            
            <div class="row mt-5">


            <?php
                    $userid1 = $_SESSION["id"];

                    $result3 = mysqli_query($connection, "SELECT * FROM userproducts, products WHERE userproducts.ProductId = products.Id AND userproducts.UserId=$userid1"); #getting favorite products for specific user
                    $arr_rows3 = array();
                    while( $rows3 =  $result3->fetch_assoc() ){
                        $arr_rows3[] = $rows3;
                    }


                    //$row3 = $_SESSION["result3"];
                    foreach($arr_rows3 as $row){
                        echo   '
                                    <div class="col-lg-3 mb-4">
                                        <div class="card">
                                            <img src="'.$row["ImageUrl"].'" alt="" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">'.$row["Title"].'</h5>
                                                <p class="card-text">'.$row["Description"].'</p>
                                                <form action="php/removeFromFav.php" method="post">
                                                <input type="hidden" id="custId" name="productid" value="'.$row["Id"].'">
                                                <input type="hidden" id="custId" name="usersidproducts" value="'.$row["UserId"].'">
                                                <input type="submit" class="btn btn-outline-danger btn-sm" value="Remove From Fav"></input>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                ';
                    }
                
            ?>


                <!-- <div class="col-lg-3 mb-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Sunset</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.  praesentium quae!</p>
                            <a href="" class="btn btn-outline-success btn-sm">Add To Favorite</a>
                            <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                </div> -->

                
                
            </div>
      </div>
    </section>
      
    <!-- <div class="col-lg-3 mb-4">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Sunset</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. riaturaesentium quae!</p>
                <a href="" class="btn btn-outline-success btn-sm">Add To Favorite</a>
                <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
            </div>
        </div>
    </div>   -->









</body>
</html>