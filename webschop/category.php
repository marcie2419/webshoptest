<?php
    $naam = $_GET['naam'];
    include "database.class.php";
    include "Arloader.php";
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
            .container-in {
                margin: 0 auto;
                max-width: 783px;
            }
           .container-in > hr {
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
                        <a class="brand" href="index.php">$$$$</a>  
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
                                            echo "<li><a href=merken.php?naam=".$row['naam'].">".$row['naam']."</a></li>";
                                        }
                                    ?>
                                </ul>  
                         </li>  
                    </ul>  
                            <?php
                                $d="SELECT * FROM CATEGORY";
                                $database->doSQL($d);
                                while($row = $database->getRecord()){
                                   echo "<li><a href=category.php?naam=".$row['naam'].">".$row['naam']."</a></li>";
                                }
                            ?> 
                    </ul>    
                </div>  
            </div>  
        </div>
        </br>
        <div class="container-in">
        <?php
             $q = "SELECT * FROM ARTIKEL WHERE category_naam='".$naam."'";
             $arloader = new Arloader($database);
             $arloader->Load($q);
        ?>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
