<?php
    include "database.class.php";
    $database = new Database('nljson1_db');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Plan B</title>
        <style type="text/css">
           body {
            padding-top: 20px;
            padding-bottom: 40px;
           }
            /* Custom container */
           .container-narrow {
                 margin: 0 auto;
                 max-width: 1100px;
           }
           .container-narrow > hr {
                 margin: 30px 0;
            }
        </style>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="container-narrow">
    <div class="hero-unit">
        <h1> WEBSCHOP BETA </h1>
        </div>
        <div class="navbar">  
            <div class="navbar-inner">  
                <div class="container">  
                    <ul class="nav">  
                    <li class="active">  
                        <a class="brand" href="#">$$$$</a>  
                    </li>  
                    <ul class="nav">  
                        <li class="dropdown">  
                            <a href="#"  
                                class="dropdown-toggle"  
                                data-toggle="dropdown">  
                                MERKEN
                                <b class="caret"></b>  
                            </a>  
                                <ul class="dropdown-menu"> 
                                    <?php
                                        $query="SELECT * FROM MERK;";
                                        $database->doSQL($query);
                                        while($row = $database->getRecord()){
                                            echo "<li><a href=".$row['naam'].".php>".$row['naam']."</a></li>";
                                        }
                                    ?>
                         </li>  
                    </ul>  
                            <?php
                                $d="SELECT * FROM CATEGORY";
                                $database->doSQL($d);
                                while($row = $database->getRecord()){
                                    echo "<li><a href=".$row['naam'].".php>".$row['naam']."</a></li>";
                                }
                            ?>
                        <li><a href="cart.class.php">Winkelwagentje</a></li>
                    </ul>    
                </div>  
            </div>  
        </div>
        </br></br>
        <div class="container">
                <div id="myCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active"><a href="BOARDS.php"><img src="carousel/gabiviteri_slide2.jpg"></a></div>
                        <div class="item"><img src="carousel/gor zombies.jpg"></div>
                        <div class="item"><img src="carousel/shit.jpg"></div>
                        <div class="item"><a href="BOARDS.php"><img src="carousel/skateboard.jpg"></a></div>
                        <div class="item"><img src="carousel/snowboard.jpg"></div>
                    </div>
                     <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                     <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>>
                </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>