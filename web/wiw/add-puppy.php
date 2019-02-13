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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <title>Add Puppy</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <h1>Update Puppy</h1>
            <form method="post" action="index.php?action=addThePuppy">
                <label>Name:</label><br>
                <input name="name" type="text" required><br>
                <label>Birthday:</label><br>
                <input name="birthdate" type="date" required><br>
                <label>Mother:</label><br>
                <select name="mother" required>
                    <option selected disabled>Chose one...</option>
                    <?php
                    foreach ($mothers as $mother) {
                        echo "<option value='$mother[damid]'>$mother[name]</option>";
                    }
                    ?>
                </select><br>
                <label>Details:</label><br>
                <input name="details" type="textarea" required><br>
                <label>Mark puppy as sold?</label><br>
                <input type="radio" name="sold" value="true" >Yes
                <input type="radio" name="sold" value="false" checked>No<br>
                <label>Gender:</label><br>
                <input type="radio" name="gender" value="true" >Male
                <input type="radio" name="gender" value="false" >Female<br><br>
                <p class="warning">To add an image for the puppy, go to the "Update Images" page</p>
                <input type="submit" value="Add">
            </form>
        </main>
    </body>
</html>