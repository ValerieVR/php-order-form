<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// This 3 lines are to display errors that may occur
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// We are going to use session variables so we need to enable sessions
session_start();

// variables
$email = $_POST['email'];
$street = $_POST['street'];
$streetnumber = $_POST['streetnumber'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$products_array = $_POST['products'];

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

whatIsHappening();

$products = [
    ['name' => 'Classic Vanilla', 'price' => 2],
    ['name' => 'Chocolate', 'price' => 2],
    ['name' => 'Lemon Drizzle', 'price' => 2.5],
    ['name' => 'Red Velvet', 'price' => 3],
    ['name' => 'Cinnamon Toast', 'price' => 3],
    ['name' => 'Apple Crumble', 'price' => 3.5]
];

$totalValue = 0;



require 'form-view.php';