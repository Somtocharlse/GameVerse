<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "config.php";


if (!isset($_GET['id'])) {

    header("Location: index.php");
    exit();

}


$game_id = $_GET['id'];


// create cart if not exist

if (!isset($_SESSION['cart'])) {

    $_SESSION['cart'] = array();

}


// add game

$_SESSION['cart'][] = $game_id;


// check session

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<br><a href='cart.php'>Go to Cart</a>";

?>