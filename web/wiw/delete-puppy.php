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
        <title>Delete Puppy</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <div id="admin-page">
                <?php include 'common/admin-sidenav.php' ?>
                <div class="admin-content">
                    <?php 
                    $name = $puppyToDelete['name'];
                    echo "<h1>Are you sure you want to delete $name?</h1>";
                    ?>
                    <a href="index.php?action=deleteThePuppy&id=<?php echo $puppyToDelete['puppyid']?>"><button type="button" class="btn btn-danger">Yes</button></a>
                    <a href="index.php?action=deletePuppies"><button type="button" class="btn btn-secondary">No</button></a>
                </div>
            </div>
        </main>
    </body>
</html>