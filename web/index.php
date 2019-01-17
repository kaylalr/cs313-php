<?php 

// Create or access a Session
session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case "intro":
        include 'intro.php';
        break;
    case "assignments":
        include 'assignments.php';
        break;
    default:
        include 'home.php';
}