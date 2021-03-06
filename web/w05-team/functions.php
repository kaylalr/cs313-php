<?php

function dbConnect() {
    try {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"], '/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
}

function getAllScriptures() {
    $db = dbConnect();
    $statement = $db->query('SELECT * FROM scriptures');
    $scriptures = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $scriptures;
}

function getScriptureById($id) {
    $db = dbConnect();
    $statement = $db->prepare('SELECT * FROM scriptures WHERE scriptureid = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $scripture = $statement->fetch(PDO::FETCH_ASSOC);
    return $scripture;
}

function getScripturesByBook($book) {
    $db = dbConnect();
    $statement = $db->prepare('SELECT * FROM scriptures WHERE book = :book');
    $statement->bindValue(':book', $book, PDO::PARAM_INT);
    $statement->execute();
    $scriptures = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $scriptures;
}