<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="main.css" type="text/css">
        <title>Shopping Cart | West Idaho Westies</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <p><a href="index.php?action=puppies">Back to Browse</a></p>
            <!--<h2>Congratulations! You added <?php // echo $addedPuppy['Name'] ?> to your cart!</h2>-->
            <?php echo $newItemMessage; ?>
            <div>
                <?php echo $cartItems ?>
            </div>
            <?php if ($cartItems != null) { ?>
            <div class="deleteCheckoutBtns">
                <a href="index.php?action=cartDeleteAll">Delete all</a>
                <a class="btn btn-warning" href="index.php?action=checkout">Checkout</a>
            </div>
            <?php } else { ?>
                <h2>You have nothing in your cart.</h2>
                <!--<p></p>-->
            <?php } ?>
        </main>
    </body>
</html>