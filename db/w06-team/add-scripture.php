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
function getTopics() {
    $db = dbConnect();
    $statement = $db->prepare('SELECT topicid, name FROM topics');
    $statement->execute();
    $topics = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $topics;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Scripture</title>
</head>
<body>
    <form method="post" action="insert-scripture.php">
        <label>Book:</label>
        <input type="text" name="book">
        <label>Chapter:</label>
        <input type="text" name="chapter">
        <label>Verse:</label>
        <input type="text" name="verse">
        <label>Content:</label>
        <input type="textarea" name="content">
        <?php 
        $topics = getTopics();
        foreach ($topics as $topic) {
            echo "<input type='checkbox' name='topic[]' value='" . $topic['topicid'] . "'>" . $topic['name'];
        }
        ?>
        <input type="submit" value="Add Scripture">
    </form>
</body>
</html>