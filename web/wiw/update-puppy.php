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
        <title>Update Puppy</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <h1>Update Puppy</h1>
            <form>
                <label>Name:</label>
                <input name="name" type="text" value="<?php echo $puppy['name']?>" required>
                <label>Birthday:</label>
                <input name="birthdate" type="date" value="<?php echo $puppy['birthdate']?>" required>
                <label>Details:</label>
                <input name="details" type="textarea" value="<?php echo $puppy['details']?>" required>
                <label>Mark puppy as sold?</label>
                <input type="radio" name="sold" value="true" <?php if($puppy['sold']) { echo 'checked';}?>>
                <input type="radio" name="sold" value="false" <?php if(!$puppy['sold']) { echo 'checked';}?>>
                <label>Gender:</label>
                <input type="radio" name="gender" value="true" <?php if($puppy['male']) { echo 'checked';}?>>
                <input type="radio" name="sold" value="false" <?php if(!$puppy['male']) { echo 'checked';}?>>
                <label>Image:</label>
                <input name="imgpath" type="file" value="<?php echo $puppy['imgpath']?>" required>
                <label>Image Description:</label>
                <input name="imgdescription" type="text" value="<?php echo $puppy['imgdescription']?>" required>
            </form>
        </main>
    </body>
</html>