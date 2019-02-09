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
            <div class='filter'>
                <h4>Gender:</h4>
                <form method='post' action="index.php?action=viewPuppies">
                    <select name="genderFilter">
                        <option value="both">Both</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <input class='btn btn-primary' type='submit' value='Go'>
                </form>
            </div>
            <?php echo $filterShow; echo $showPuppies; ?>
        </main>
    </body>
</html>