<?php
if (!$_SESSION['loggedin']) {
    header('Location: /wiw/index.php?action=login');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="main.css" type="text/css">
        <title>Admin</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <h1>Admin</h1>
            <div>
                <div>
                    <h2>Puppies</h2>
                    <a href="index.php?action=updatePuppies">Update Puppies</a><br>
                    <a href="index.php?action=addPuppy">Add Puppy</a><br>
                </div>
                <div>
                    <h2>Terriers</h2>
                    <a href="index.php?action=updateTerriers">Update Terriers</a><br>
                    <a href="index.php?action=addTerrier">Add Terrier</a><br>
                </div>
                <div>
                    <h2>Images</h2>
                    <a href="index.php?action=addImage">Add Image</a><br>
                    <a href="index.php?action=deleteImage">Delete Image</a><br>
                </div>
            </div>

            
        </main>
    </body>
</html>