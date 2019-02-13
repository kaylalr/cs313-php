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
        <title>Add Image</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <div id="admin-page">
                <?php include 'common/admin-sidenav.php' ?>
                <div class="admin-content">
                    <h1>Add Image</h1>
                    <form method="post" action="index.php?action=addTheImage" enctype="multipart/form-data">
                        <label>Upload Image:</label><br>
                        <input type="file" name="file1"><br>
                        <label>Description:</label><br>
                        <input type="textarea" name="description"><br>
                        <label>Choose a puppy (if applicable):</label><br>
                        <?php echo $puppiesDropDown ?><br>
                        <label>Choose a terrier (if applicable):</label><br>
                        <?php echo $terriersDropDown ?><br>
                        <input type="submit" value="Upload">
                    </form>
                </div>
            </div>

        </main>
    </body>
</html>