<?php
session_start();   
class Arloader{
    private $database; //de database;
    
    function Arloader($db){
        $this->database = $db;
    }
    function Load($q){
        $this->database->doSQL($q);
            echo "<div class='row'>";
                while($row = $this->database->getRecord()){
                    echo "<div class='span5'><img src =".$row['pic']." alt='".$row['description']."'>
                            <p>".$row['naam']."</p>
                            <p>".$row['description']."</p>
                            <b> €".$row['prijs']."</b></br>
                            <td><a href=\"cart.class.php?action=add&id=".$row['id']."\">In winkelwagen</a></td>
                            </br></br>
                         </div>";
                    }
            echo "</div>";
         $this->database->close();
    }
}
?>
