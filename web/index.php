<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="">
        <title>Home</title>
    </head>
    <body>
        <header>
            <?php // include($_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php') 
            include ($_SERVER['DOCUMENT_ROOT'] . '/web/common/header.php'?>
        </header>
        <main>
            <a href="intro.php">Introduction</a><br>
            <a href="assignments.php">Assignments</a><br>
        </main>
        <footer>
            <?php echo "Today is " . date("m-d-Y") ?>
        </footer>
    </body>
</html>