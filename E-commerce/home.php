<?php

session_start();


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
<link href="style/homestyle.css" rel="stylesheet" type="text/css" media="all">

</head>


<body>


<div  class="bs-example ">
    <nav class="navbar navbar-expand-md navbar bg">
        <h3 class="text-white ">
        <?php
        if($_SESSION["role"] == 0){
            $name = $_SESSION["username"];
            echo $name;
        }else{
            $name = $_SESSION["username"];
            echo $name . " Shop";
        }
        
    ?>
        </h3>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">

                <?php
                    if($_SESSION["role"] == 0){
                        $userid1 = $_SESSION["id"];
                       
                        echo '<form action="php/getfavorites.php" method="post">
                                <input type="hidden" id="custId" name="userid" value="'.$userid1.'">
                                <input type="submit" class="btn nav-item nav-link active text-white ml-4" value="My Favorites"></input>
                             </form>
                            ';
                    }else{
                       
                        echo '<a href="#" class="nav-item nav-link active text-white ml-4">Home</a>';
                    }
                ?>

            </div>
            <div class="navbar-nav ml-auto">
                <a href="php/logout.php" class="btn text-white logout">LogOut</a>
            </div>
        </div>
    </nav>
</div>
<hr>



<div class="bigcontainer">
        <div class="container">

            <?php
            if($_SESSION["role"] == 0){
                $name = $_SESSION["username"];
                echo "<h3 style='color: #bcdca8;' class = ''> Products: </h3><br>";
            }else{
                $name = $_SESSION["username"];
                echo "<h3 style='color: #bcdca8;' class = ''>Your Products: </h3><br>
                <a href='addProduct.php' class='btn btn-dark text-white mb-3'>ADD Product</a>";
            } 
            ?>
            
                

        <div class="card-group vgr-cards">
            <?php
                if($_SESSION["role"] == 1){
                    $row1 = $_SESSION["result"];
                    foreach($row1 as $row){
                        echo    '
                                    <div class="card">
                                        <div class="card-img-body m-0">
                                             <img name="image" class="card-img" src="'.$row["ImageUrl"].'" alt="Card image cap">
                                        </div>
                                            <div class="card-body">
                                                <h4 name="title" class="card-title text-white">'.$row["Title"].'</h4>
                                                <p name="description" class="card-text text-white">'.$row["Description"].'<br>
                                                <form action="php/deleteitem.php" method="post">
                                                    <input type="hidden" id="custId" name="id" value="'.$row["Id"].'">
                                                    <input type="submit" class="btn btn-white text-white buy" value="Delete Product"></input>
                                                </form>
                                            </div>
                                    </div>
                                ';
                    }
                }else{
                    $userid = $_SESSION["id"];
                    $row2 = $_SESSION["result2"];
                    foreach($row2 as $row){
                        echo    '<div class="card">
                                    <div class="card-img-body m-0">
                                        <img class="card-img" src="'.$row["ImageUrl"].'" alt="Card image cap">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-white">'.$row["Title"].'</h4>
                                        <p class="card-text text-white">'.$row["Description"].'<br>
                                    <form action="php/addtocard.php" method="post">
                                        <input type="hidden" id="custId" name="productid" value="'.$row["Id"].'">
                                        <input type="hidden" id="custId" name="userid" value="'.$userid.'">
                                        <input type="submit" class="btn btn-white text-white buy" value="add to card"></input>
                                    </form>
                                    </div>
                                </div>';
                    }
                }
            ?>

            <!-- <div class="card">
                <div class="card-img-body m-0">
                    <img class="card-img" src="https://picsum.photos/500/230" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title text-white">Card title</h4>
                    <p class="card-text text-white">This is a wider card with supporting text below as a naturtional content. This content is a little bit longer. This is a wider card w<br>
                    <a href="#" class="btn btn-white text-white buy">Primary</a>
                </div>
            </div> -->
            
            
        </div>
        </div>
</div>


</body>
</html>