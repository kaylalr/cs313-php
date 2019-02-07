<?php 

// Create or access a Session
//session_start();
require_once ('functions.php');


$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case "searchScriptures":
        include 'search-scriptures.php';
        break;
    case "scriptureDetails":
        include 'scriptures-details.php';
        break;
    default:
        $scriptures = getAllScriptures();
        include 'view-scriptures.php';
}