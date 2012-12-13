<?php
session_start();
$product_id = $_GET['id']; //the product id from the URL
$action = $_GET['action']; //the action from the URL

switch($action) { //decide what to do
    case "add":
        $_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id
    break;

    case "rem":
        $_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id
        if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items.
    break;

    case "empty":
        unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart.
    break;
}
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
                                            echo "<li><a href=merken.php?naam=".$row['naam'].">".$row['naam']."</a></li>";
                                        }
                                    ?>
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
        <h1> WINKELWAGEN </h1>
        <?php
            if($_SESSION['cart']){
                echo "<table class='table span3'>
                        <thead>
                            <tr>
                                <th>Productnaam</th>
                                <th>Prijs</th>
                                <th>Aantal</th>
                                <th>Subtotaal</th>
                                </tr>
                        </thead>";
                foreach($_SESSION['cart'] as $productid => $quantity){
                    $d="SELECT naam,prijs,pic_klein FROM artikel WHERE id='".$productid."';";
                    $database->doSQL($d);
                    $row = $database->getRecord();
                    
                    $line_cost = $row['prijs']*$quantity;
                    $total = $total + $line_cost;
                    echo "<tr>
                            <td><img src=".$row['pic_klein']." width='60' height='60'> ".$row['naam']."</td>
                            <td> €".$row['prijs']."</td>
                            <td>".$quantity."</td>
                            <td> €".$line_cost."</td>
                         </tr>";
                } 
                echo "</table>";
                echo "<div align=right>
                        <a href=\"$_SERVER[PHP_SELF]?action=empty\" \">BETALEN</a> ||  
                        <a href=\"$_SERVER[PHP_SELF]?action=empty\" onclick=\"return confirm('Are you sure?');\">LEGEN</a>
                     </div>";
                echo "<div align='right'><b> TOTAAL: €".$total."</b></div>";
            }else{
                echo "Je hebt geen Items in je winkelwaggie";
            }
        ?>
        </br></br>
        </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>