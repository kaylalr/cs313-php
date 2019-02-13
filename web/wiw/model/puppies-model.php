<?php

function getAllPuppies() {
    $db = dbConnect();
    $statement = $db->query('SELECT p.name, i.imgpath, i.imgdescription, p.puppyid FROM puppies p left join images i on i.puppyid = p.puppyid');
    $puppies = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $puppies;
}

function getMalePuppies() {
    $db = dbConnect();
    $statement = $db->query('SELECT * FROM puppies p left join images i on i.puppyid = p.puppyid WHERE male = true');
    $puppies = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $puppies;
}

function getFemalePuppies() {
    $db = dbConnect();
    $statement = $db->query('SELECT * FROM puppies p left join images i on i.puppyid = p.puppyid WHERE male = false');
    $puppies = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $puppies;
}

function getPuppyById($id) {
    $db = dbConnect();
    $statement = $db->prepare('SELECT p.puppyId, p.damid, p.name, p.birthdate, p.details, p.sold, p.male, i.imgpath, i.imgdescription FROM puppies p left join images i on i.puppyid = p.puppyid WHERE p.puppyid = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $puppy = $statement->fetch(PDO::FETCH_ASSOC);
    return $puppy;
}

function updatePuppy($id, $name, $birthdate, $details, $sold, $gender) {
    $db = dbConnect();
    $statement = $db->prepare('UPDATE puppies SET name = :name, birthdate = :birthdate, details = :details, sold = :sold, male = :gender WHERE puppyid = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':name', $name, PDO::PARAM_STR);
    $statement->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
    $statement->bindValue(':details', $details, PDO::PARAM_STR);
    $statement->bindValue(':sold', $sold, PDO::PARAM_STR);
    $statement->bindValue(':gender', $gender, PDO::PARAM_STR);
    $statement->execute();
    $rowsChanged = $statement->rowCount();
    return $rowsChanged;
}

function addPuppy($name, $mother, $birthdate, $details, $sold, $gender) {
    $db = dbConnect();
    $statement = $db->prepare('INSERT INTO puppies VALUES (default, :mother, :name, :birthdate, :details, :sold, :gender)');
    $statement->bindValue(':name', $name, PDO::PARAM_STR);
    $statement->bindValue(':mother', $mother, PDO::PARAM_INT);
    $statement->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
    $statement->bindValue(':details', $details, PDO::PARAM_STR);
    $statement->bindValue(':sold', $sold, PDO::PARAM_STR);
    $statement->bindValue(':gender', $gender, PDO::PARAM_STR);
    $statement->execute();
    $rowsChanged = $statement->rowCount();
    return $rowsChanged;
}

function deletePuppy($id) {
    $db = dbConnect();
    $statement = $db->prepare('DELETE FROM puppies WHERE puppyid = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $rowsChanged = $statement->rowCount();
    return $rowsChanged;
}

function getTerriers() {
    $db = dbConnect();
    $statement = $db->query('SELECT d.damid, d.name, d.description, i.imgpath, i.imgdescription FROM dams d left join images i on i.damid = d.damid');
    $puppies = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $puppies;
}

function getTerrierById($id) {
//    echo "damid: $id";
//    exit;
    $db = dbConnect();
    $statement = $db->prepare('SELECT d.damid, d.name, d.description FROM dams d left join images i on i.damid = d.damid WHERE d.damid = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $terrier = $statement->fetch(PDO::FETCH_ASSOC);
    return $terrier;
}

function updateTerrier($id, $name, $details) {
    $db = dbConnect();
    $statement = $db->prepare('UPDATE dams SET name = :name, description = :details WHERE damid = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':name', $name, PDO::PARAM_STR);
    $statement->bindValue(':details', $details, PDO::PARAM_STR);
    $statement->execute();
    $rowsChanged = $statement->rowCount();
    return $rowsChanged;
}

function addTerrier($name, $details) {
    $db = dbConnect();
    $statement = $db->prepare('INSERT INTO dams VALUES (default, :name, :details)');
    $statement->bindValue(':name', $name, PDO::PARAM_STR);
    $statement->bindValue(':details', $details, PDO::PARAM_STR);
    $statement->execute();
    $rowsChanged = $statement->rowCount();
    return $rowsChanged;
}

function deleteTerrier($id) {
    $db = dbConnect();
    $statement = $db->prepare('DELETE FROM dams WHERE damid = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $rowsChanged = $statement->rowCount();
    return $rowsChanged;
}

function getAllPictures() {
    $db = dbConnect();
    $statement = $db->query('SELECT * FROM images');
    $images = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $images;
}

function storeImages($imgPath, $imgDescription) {
    $db = dbConnect();
    $stmt = $db->prepare('INSERT INTO images VALUES (default, :imgPath, :imgDescription)');
    // Store the full size image information
    $stmt->bindValue(':imgPath', $imgPath, PDO::PARAM_STR);
    $stmt->bindValue(':imgDescription', $imgDescription, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    return $rowsChanged;
}

function checkUser($username) {
    $db = dbConnect();
    $statement = $db->prepare('SELECT username, userpassword FROM users WHERE username = :username');
    $statement->bindValue(':username', $username, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}