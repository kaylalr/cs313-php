<?php

function getAllPuppies() {
    echo "getAllPuppies() function being called";
    exit;
    $db = dbConnect();
    $sql = "Select * from Puppies";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $puppies = $stmt->fetchAll(PDO::FFETCH_ASSOC);
    $stmt->closeCursor();
    return $puppies;
}