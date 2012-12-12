<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

// - add 1 product
if (isset($_GET['ADD']))
{
  $_SESSION['aBasket'][$_GET['ID']] += 1;
}

// - Remove product
if (isset($_GET['DEL']))
{
  unset($_SESSION['aBasket'][$_GET['ID']]);
}

// - Remove all
if (isset($_GET['EMP']))
{
  unset($_SESSION['aBasket']);
}

// - Show
if (isset($_SESSION['aBasket']))
{
  foreach ( $_SESSION['aBasket'] as $key=>$val )
    {
      echo "$key: $val<br>\n";
    }
}
?>

<form>
Product:
<input type="text" name="ID">
<input type="submit" name="ADD" value="Add">
<input type="submit" name="DEL" value="Del">
<input type="submit" name="EMP" value="Empty">
</form>

