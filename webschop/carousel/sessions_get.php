<?php
  session_start();
?>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
  <title>Sessions Get</title>
</head>
<body>
<?php
  $kleur = $_SESSION['kleur'];
  $mijnNaam = $_SESSION['naam'];
  echo "<b>kleur = $kleur </b><br>";
  echo "<b>mijnNaam = $mijnNaam </b><br>";
?>

</body>
</html>
