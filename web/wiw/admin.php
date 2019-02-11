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
        <link rel="stylesheet" href="main.css" type="text/css">
        <title>Puppies</title>
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
                    <a href="index.php?action=updatePuppies">Update Puppies</a>
                    <a href="index.php?action=?addPuppy">Add Puppy</a>
                </div>
                <div>
                    <h2>Terriers</h2>
                    <a href="index.php?action=updateTerriers">Update Terriers</a>
                    <a href="index.php?action=addTerrier">Add Terrier</a>
                </div>
                <div>
                    <a href="index.php?action=addImage">Add Image</a>
                    <a href="index.php?action=deleteImage">Delete Image</a>
                </div>
            </div>

            
        </main>
    </body>
</html>