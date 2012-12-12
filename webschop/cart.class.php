<?php
session_start();
$product_id = $_GET['id']; //the product id from the URL
$action = $_GET['action']; //the action from the URL

switch($action) { //decide what to do
    case "add":
        $_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id
    break;

    case "remove":
        $_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id
        if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items.
    break;

    case "empty":
        unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart.
    break;
}
?>