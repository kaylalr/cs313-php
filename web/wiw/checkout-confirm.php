<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css" type="text/css">
        <title>Checkout</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <h2><?php echo $firstName ?>, your checkout was successful!</h2>
            <p><br>Your purchase will be shipped to:</p>
            <p><?php echo $shippingAddress ?></p>
                
            <h3><a href="index.php?aciton=puppies">Return to shopping</a></h3>
        </main>
    </body>
</html>