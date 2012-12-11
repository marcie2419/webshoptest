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
                 max-width: 1000px;
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
                                            echo "<li><a href=#>".$row['naam']."</a></li>";
                                        }
                                    ?>
                                </ul>  
                         </li>  
                    </ul>  
                    <li><a href="#">SKATE</a></li>  
                    <li><a href="#">BOARDS</a></li>  
                    <li><a href="#">TEES</a></li>  
                    </ul>    
                </div>  
            </div>  
        </div>
        <div>
            <ul class="nav nav-pills nav-stacked span2">
                <?php                       
                    $database->doSQL($query);
                    while($row = $database->getRecord()){
                        echo "<li><a href=#>".$row['naam']."</a></li>";
                    }
                ?> 
            </ul>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
