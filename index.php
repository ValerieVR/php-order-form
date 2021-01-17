<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();


// Here variables are defined
$email = $_POST['email'];
$street = $_POST['street'];
$streetnumber = $_POST['streetnumber'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$chosenProductsArray = $_POST['products'];
$totalValue = 0;
$emailInvalid = $streetInvalid = $streetnumberInvalid = $cityInvalid = $zipcodeInvalid = $productsInvalid = '';
$products = [
    ['name' => 'Classic Vanilla', 'price' => 2],
    ['name' => 'Chocolate', 'price' => 2],
    ['name' => 'Lemon Drizzle', 'price' => 2.5],
    ['name' => 'Red Velvet', 'price' => 3],
    ['name' => 'Cinnamon Toast', 'price' => 3],
    ['name' => 'Apple Crumble', 'price' => 3.5]
];


// Here functions are defined
// 1) Use this function when you need to need an overview of these variables
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

// 2) Function to display chosen cupcakes
function cupcakesOfChoice() {
    foreach ($GLOBALS['chosenProductsArray'] as $index => $value) {
        echo $GLOBALS['products'][$index]['name'];
        echo '<br>';
    }
}

// 3) Function to display customer's address
function sentCupcakesTo() {
    echo "{$GLOBALS['street']} {$GLOBALS['streetnumber']}";
    echo "<br>";
    echo "{$GLOBALS['zipcode']} {$GLOBALS['city']}";
}

// Loop to calculate total value of cupcakes
foreach ($chosenProductsArray as $index => $value) {
    $totalValue += $products[$index]['price'];
}

// if statements to check multiple cases
$errors = 0;
if (isset($_POST['submit'])) {
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailInvalid = ' *';
        $errors = 1;
    }

    if (empty($street)) {
        $streetInvalid = ' *';
        $errors += 1;
    }

    if (empty($streetnumber) || (is_numeric($streetnumber) === false)) {    
        $streetnumberInvalid = ' *';
        $errors += 1;
    }

    if (empty($city)) {
        $cityInvalid = ' *';
        $errors += 1;
    }

    if (empty($zipcode) || (is_numeric($zipcode) === false)) {
        $zipcodeInvalid  = ' *';
        $errors += 1;
    }

    if (empty($chosenProductsArray)) {
        $productsInvalid = ' *';
        $errors += 1;
    }
}

// if statements for the session variables
if (isset($_POST['submit'])) {
    if (!empty($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    }

    if (!empty($_POST['street'])) {
        $_SESSION['street'] = $_POST['street'];
    }

    if (!empty($_POST['streetnumber'])) {
        $_SESSION['streetnumber'] = $_POST['streetnumber'];
    }

    if (!empty($_POST['city'])) {
        $_SESSION['city'] = $_POST['city'];
    }

    if (!empty($_POST['zipcode'])) {
        $_SESSION['zipcode'] = $_POST['zipcode'];
    }
}

// Here functions are called
whatIsHappening();

require 'form-view.php';