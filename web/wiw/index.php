<?php 

// Create or access a Session
session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case "cart":
        include 'cart.php';
        break;
    case "puppies":
        include 'puppies.php';
        break;
    case "addCart":
        if(isset($_SESSION['cart']['total']) && $_SESSION['cart']['total'] > 0) {
            $_SESSION['cart']['total'] += 1;
        } else {
            $_SESSION['cart']['total'] = 1;
        }
//        include 'puppies.php';
        break;
    default:
        include 'home.php';
}