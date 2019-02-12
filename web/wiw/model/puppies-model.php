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
    $statement = $db->prepare('SELECT * FROM puppies p left join images i on i.puppyid = p.puppyid WHERE p.puppyid = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $puppy = $statement->fetch(PDO::FETCH_ASSOC);
    return $puppy;
}

function getTerriers() {
    $db = dbConnect();
    $statement = $db->query('SELECT * FROM dams d left join images i on i.damid = d.damid');
    $puppies = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $puppies;
}

function getAllPictures() {
    $db = dbConnect();
    $statement = $db->query('SELECT * FROM images');
    $images = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $images;
}

function checkUser($username) {
    $db = dbConnect();
    $statement = $db->prepare('SELECT username, userpassword FROM users WHERE username = :username');
    $statement->bindValue(':username', $username, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}