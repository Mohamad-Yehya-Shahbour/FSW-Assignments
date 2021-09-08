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

            <?php
                if($_SESSION["role"] == 0){
                    echo '
                        <a href="favorites.php" class=" d-inline text-white mb-3 myfavfont navbar-brand">My Favorites</a>
                        ';
                }
            ?>
            
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
            
            <?php
                if($_SESSION["role"] == 0){
                    $name = $_SESSION["username"];
                    echo "<h2  class = 'text-center'><i class='fas fa-tree'> <u>Available Lands </u></h2></i><br>";
                }else{
                    $name = $_SESSION["username"];
                    echo "<h2  class = 'text-center'><i class='fas fa-tree'> <u>Your Lands </u></h2></i><br>
                    <a href='addProduct.php' class='btn btn-secondary text-white'>ADD Land</a>";
                } 
            ?>
            
            <div class="row mt-5">


                    <?php
                        if($_SESSION["role"] == 1){
                            $Id = $_SESSION["id"];
                            $sql2="SELECT * FROM `products` WHERE products.SellerId=?;"; #getting products for specific seller
                            $stmt2 = $connection->prepare($sql2);
                            $stmt2->bind_param("i", $Id);
                            $stmt2->execute();
                            $result2 = $stmt2->get_result();

                            $arr_rows = array();
                            while( $rows =  $result2->fetch_assoc() ){
                                $arr_rows[] = $rows;
                            }


                            //$row1 = $_SESSION["result"];
                            foreach($arr_rows as $row){
                                echo    '
                                            <div class="col-lg-3 mb-4">
                                                <div class="card">
                                                    <img src="'.$row["ImageUrl"].'" alt="" class="card-img-top">
                                                    <div class="card-body">
                                                        <h5 class="card-title">'.$row["Title"].'</h5>
                                                        <p class="card-text">'.$row["Description"].'</p>
                                                        <form action="php/deleteitem.php" method="post">
                                                            <input type="hidden" id="custId" name="id" value="'.$row["Id"].'">
                                                            <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete Land"></input>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                            }
                        }else{
                            $result3 = mysqli_query($connection, "SELECT * FROM `products`"); #getting all  products for buyers

                            $arr_rows2 = array();
                            while( $rows2 =  $result3->fetch_assoc() ){
                                $arr_rows2[] = $rows2;
                            }


                            $userid = $_SESSION["id"];
                        // $row2 = $_SESSION["result2"];
                            foreach($arr_rows2 as $row){
                                echo    '
                                            <div class="col-lg-3 mb-4">
                                                <div class="card">
                                                    <img src="'.$row["ImageUrl"].'" alt="" class="card-img-top">
                                                    <div class="card-body">
                                                        <h5 class="card-title">'.$row["Title"].'</h5>
                                                        <p class="card-text">'.$row["Description"].'</p>
                                                        <form action="php/addtocard.php" method="post">
                                                            <input type="hidden" id="custId" name="productid" value="'.$row["Id"].'">
                                                            <input type="hidden" id="custId" name="userid" value="'.$userid.'">
                                                            <input type="submit" class="btn btn-outline-success btn-sm" value="Add To Favorite"></input>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                            ';
                            }
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