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
            <h1>Scriptures</h1>
            <?php
            $view = "<div>";
            
            foreach ($scriptures as $scripture) {
//                $id = $scripture['scriptureId'];
                $view .= "<div>";
                $view .= "<h3><a href='index.php?action=viewScripture&id=$scripture[scriptureid]'>$scripture[book] $scripture[chapter]:$scripture[verse]</a></h3>";
//                $view .= "<p>$scripture[content]</p>";
                $view .= "</div>";
            }
            $view .= "</div>";
            echo $view;
             ?>
        </main>
    </body>
</html>