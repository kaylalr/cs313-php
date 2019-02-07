<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="homemain.css">
        <title>Home</title>
    </head>
    <body>
        <main>
            <h1>Scripture Details</h1>
            <?php 
            $view = "<h3>$scripture[book] $scripture[chapter]:$scripture[verse]</h3>";
            $view .= "<p>$scripture[content]</p>";
            echo $view;
            ?>
        </main>
    </body>
</html>