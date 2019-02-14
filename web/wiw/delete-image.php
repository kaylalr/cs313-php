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
        <title>Delete Image</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <div id="admin-page">
                <?php include 'common/admin-sidenav.php' ?>
                <div class="admin-content">
                    <h1>Are you sure you want to delete this image?</h1>
                    <?php // var_dump($imageDelete); exit; ?>
                    <img src="<?php echo $imageDelete[imgpath]?>" alt="<?php echo $imageDelete[imgdescription]?>">
                    <?php 
                    if ($imageDelete[puppyid] != null) {
                        $puppy = getPuppyById($imageDelete[puppyid]);
                        echo "<h2>This image is linked to the following puppy: " . $puppy[name] . "</h2>";
                    }
                    if ($imageDelete[damid] != null) {
                        $terrier = getTerrierByIdById($imageDelete[puppyid]);
                        echo "<h1>This image is linked to the following terrier: " . $terrier[name] . "</h2>";
                    }
                    ?>
                    <a href="index.php?action=deleteTheImage&id=<?php echo $imageDelete['imageid']?>"><button type="button" class="btn btn-danger">Yes</button></a>
                    <a href="index.php?action=deleteImages"><button type="button" class="btn btn-secondary">No</button></a>
                </div>
            </div>

        </main>
    </body>
</html>