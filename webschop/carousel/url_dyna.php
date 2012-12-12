<?php
  if (isset($_GET['hiddenvalue_01']))
    { $nBezoeken = $_GET['hiddenvalue_01']; }
  else
    { $nBezoeken = 0; }
  $nBezoeken += 1;
?>

<html>
<body>
<h4>Info doorgeven via dynamische parameters</h4>
Je hebt een hyperlnk nodig o.i.d.; nou heb je dat nogal gauw als er user-interactie is ...
<?php $url=$_SERVER['PHP_SELF'].'?hiddenvalue_01='.$nBezoeken; ?>
<a href="<?php echo $url; ?>">klikken maar</a><br/>
PS: U bent hier voor de <?php echo $nBezoeken ?>e keer!<br>
</body>
</html>
