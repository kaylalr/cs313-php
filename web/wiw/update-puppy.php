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
            <form method="post" action="index.php?action=updateCurrentPuppy">
                <label>Name:</label><br>
                <input name="name" type="text" value="<?php echo $puppy['name']?>" required><br>
                <label>Birthday:</label><br>
                <input name="birthdate" type="date" value="<?php echo $puppy['birthdate']?>" required><br>
                <label>Details:</label><br>
                <input name="details" type="textarea" value="<?php echo $puppy['details']?>" required><br>
                <label>Mark puppy as sold?</label><br>
                <input type="radio" name="sold" value="true" <?php if($puppy['sold']) { echo 'checked';}?>>Yes
                <input type="radio" name="sold" value="false" <?php if(!$puppy['sold']) { echo 'checked';}?>>No<br>
                <label>Gender:</label><br>
                <input type="radio" name="gender" value="true" <?php if($puppy['male']) { echo 'checked';}?>>Male
                <input type="radio" name="sold" value="false" <?php if(!$puppy['male']) { echo 'checked';}?>>Female<br>
                <label>Image:</label><br>
                <input name="imgpath" type="file" value="<?php if($puppy['imgpath'] != null){echo $puppy['imgpath'];}?>"><br>
                <label>Image Description:</label><br>
                <input name="imgdescription" type="text" value="<?php if($puppy['imgdescription'] != null){echo $puppy['imgdescription'];}?>"><br>
                <input type="hidden" name="puppyid" value="<?php echo $puppy['puppyid']?>">
                <input type="submit" value="Update">
            </form>
        </main>
    </body>
</html>