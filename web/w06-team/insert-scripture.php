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

$book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
$chapter = filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_INT);
$verse = filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_NUMBER_INT);
$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
$topics = $_POST['topic'];

// var_dump($_POST);

// echo "$book, $chapter, $verse, $content";
// var_dump($topics);

$db = dbConnect();

    $statement = $db->prepare('INSERT INTO scriptures VALUES (default, :book, :chapter, :verse, :content)');
    $statement->bindValue(':book', $book, PDO::PARAM_STR);
    $statement->bindValue(':chapter', $chapter, PDO::PARAM_INT);
    $statement->bindValue(':verse', $verse, PDO::PARAM_INT);
    $statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->execute();
    $rowsChanged = $statement->rowCount();
    // return $rowsChanged;

    $newScriptureId = $pdo->lastInsertId('scriptureid');

    echo "scriptureId: " . $newScriptureId;
    exit;

    foreach ($topics as $topic) {
        $statement = $db->prepare('INSERT INTO scripture_topic VALUES (default, :scriptureid, :topicid)');
        $statement->bindValue(':scriptureid', $newScriptureId, PDO::PARAM_STR);
        $statement->bindValue(':topicid', $topic, PDO::PARAM_STR);
        $statement->execute();
    }

include 'scripture-list.php';