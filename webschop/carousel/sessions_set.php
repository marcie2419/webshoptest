<?php
  session_start();
  $mijnNaam = "Pamela";
?>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
  <title>Sessions Set</title>
</head>
<body>
<?php
  $_SESSION['kleur'] = "rood";
  $_SESSION['naam']  = $mijnNaam;
  echo "<b>Session ingesteld</b>";
?>
</body>
</html>
