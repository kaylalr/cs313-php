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
        <title>Update Terrier</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <div id="admin-page">
                <?php include 'common/admin-sidenav.php' ?>
                <div class="admin-content">
                    <h1>Update Terrier</h1>
                    <form method="post" action="index.php?action=updateCurrentTerrier">
                        <label>Name:</label><br>
                        <input name="name" type="text" value="<?php echo $terrier['name'] ?>" required><br>
                        <label>Description:</label><br>
                        <input name="details" type="textArea" value="<?php echo $terrier['description'] ?>" required><br>
                        <p class="warning">To add an image for the puppy, go to the "Update Images" page</p>
                        <input type="hidden" name="damid" value="<?php echo $terrier['damid'] ?>">
                        <input type="submit" value="Update">
                    </form>
                </div>
            </div>
            
        </main>
    </body>
</html>