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
                <a href="home.php" class="nav-item nav-link active text-white ml-4">products</a>
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
           <h3 style="color: #bcdca8;" class = ''> Your Favorite Products: </h3><br>
        <div class="card-group vgr-cards">
            <?php
                    $row3 = $_SESSION["result3"];
                    foreach($row3 as $row){
                        echo   '<div class="card">
                                    <div class="card-img-body m-0">
                                            <img name="image" class="card-img" src="'.$row["ImageUrl"].'" alt="Card image cap">
                                    </div>
                                        <div class="card-body">
                                            <h4 name="title" class="card-title text-white">'.$row["Title"].'</h4>
                                            <p name="description" class="card-text text-white">'.$row["Description"].'<br>
                                            <form action="php/removeFromFav.php" method="post">
                                                <input type="hidden" id="custId" name="productid" value="'.$row["Id"].'">
                                                <input type="hidden" id="custId" name="usersidproducts" value="'.$row["UserId"].'">
                                                <input type="submit" class="btn btn-white text-white buy" value="Remove From Fav"></input>
                                            </form>
                                        </div>
                                    </div>';
                    }
                
            ?>
            
        </div>
        </div>
</div>


</body>
</html>