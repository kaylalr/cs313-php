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
    $statement = $db->query('SELECT * FROM scriptures WHERE scriptureId = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $scripture = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $scripture;
}