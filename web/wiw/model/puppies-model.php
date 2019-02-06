<?php

function getAllPuppies() {
    $db = dbConnect();
//    $sql = 'Select * from Puppies';
//    $stmt = $db->query($sql);
//    $stmt->execute();
//    $puppies = $stmt->fetchAll(PDO::FFETCH_ASSOC);
//    $stmt->closeCursor();
    $statement = $db->query('SELECT username, password FROM note_user');
    $puppies = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo "puppies: " . $puppies;
    exit;
    return $puppies;
}

//    $db = acmeConnect();
//    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword 
//         FROM clients
//         WHERE clientEmail = :email';
//    $stmt = $db->prepare($sql);
//    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
//    $stmt->execute();
//    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
//    $stmt->closeCursor();
//    return $clientData;

//$statement = $db->query('SELECT username, password FROM note_user');
//while ($row = $statement->fetch(PDO::FETCH_ASSOC))