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
        $book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
        $scripturesByBook = getScripturesByBook($book);
        header('Location: index.php?action=ViewSearchScriptures');
        break;
    case "ViewSearchScripture":
        
        include 'search-scriptures';
        break;
    case "viewScripture":
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $scriptureDetail = getScriptureById($id);
        include 'scriptures-details.php';
        break;
    default:
        $scriptures = getAllScriptures();
        include 'view-scriptures.php';
}