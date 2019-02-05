<?php

function getAllPuppies() {
    $db = dbConnect();
    echo "dbConnect() working";
    exit;
    $sql = "Select * from Puppies";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $puppies = $stmt->fetchAll(PDO::FFETCH_ASSOC);
    $stmt->closeCursor();
    return $puppies;
}