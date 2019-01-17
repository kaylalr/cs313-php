<?php 

// Create or access a Session
session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'about':
        include 'about.php';
        break;
    case 'login':
        include 'login.php';
        break;
    case 'adminLogin':
        $loginMessage = "You are logged in as Administrator.";
        $_SESSION['user'] = "admin";
        include 'home.php';
        break;
    case 'testerLogin';
        $loginMessage = "You are logged in as a Tester.";
        $_SESSION['user'] = "tester";
        include 'home.php';
        break;
    default:
        include 'home.php';
}