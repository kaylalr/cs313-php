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
            <h1>Search Scriptures</h1>
            <form action="index.php?action=searchScriptures" method="post">
                <lable>Choose a book:</lable>
<!--                <select name="book">
                    <option value="John">John</option>
                    <option value="Doctrine and Covenants">Doctrine and Covenants</option>
                    <option value="Mosiah">Mosiah</option>
                </select>-->
                <input name="book" type="text">
                <input type="submit" value="Submit">
            </form>
            <?php
            var_dump($scripturesByBook);
            exit;
            $view = "<div>";
            foreach ($scripturesByBook as $scripture) {
                $view .= "<div>";
                $view .= "<h3><a href='index.php?action=viewScripture&id=$scripture[scriptureid]'>$scripture[book] $scripture[chapter]:$scripture[verse]</a></h3>";
                $view .= "</div>";
            }
            $view .= "</div>";
            echo $view;
            ?>
        </main>
    </body>
</html>