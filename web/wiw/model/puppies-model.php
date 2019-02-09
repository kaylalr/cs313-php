<?php

function getAllPuppies() {
    $db = dbConnect();
    $statement = $db->query('SELECT * FROM puppies p left join images i on i.puppyid = p.puppyid');
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

function getTerriers() {
    $db = dbConnect();
    $statement = $db->query('SELECT * FROM dams d left join images i on i.damid = d.damid');
    $puppies = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $puppies;
}