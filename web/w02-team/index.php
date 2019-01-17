<?php 

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'adminLogin':
        $loginMessage = "You are logged in as Administrator.";
        include 'home.php';
        break;
}