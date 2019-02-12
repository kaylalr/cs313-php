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

function getScriptures() {
$db = dbConnect();
    $statement = $db->prepare('SELECT s.book, s.chapter, s.verse, s.content, t.name FROM scriptures s JOIN scripture_topic st ON s.scriptureid = st.scriptureid JOIN topics t ON t.topicid = st.topicid');
    $statement->execute();
    $topics = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($topics);
    return $topics;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scripture List</title>
</head>
<body>
<h1>All Scriptures</h1>
    <?php 
    // $scriptures = getScriptures();
    // $currentScripture = null;
    // foreach ($scriptures as $scripture) {
    //     if ($currentScripture != "$scripture['book'] . $scripture['chapter'] . $scripture['verse']") {
    //     echo "<h2>" . $scripture['book'] . " " . $scripture['chapter']  . ":" . $scripture['verse'] . "</h2>";
    //     $currentScripture = "$scripture['book'] . $scripture['chapter'] . $scripture['verse']";
    //     }
    //     echo "<span>". $scripture['name'] . "</span>";
    // }
    ?>
</body>
</html>