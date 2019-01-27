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
            <!--            <form>
                            <label for="firstName">First Name:</label>
                            <input type="text" name="firstName">
                            <label for="lastName">Last Name:</label>
                            <input type="text" name="LastName">
                            <label for="streetAddress">Street Address</label>
                            <input type="text" name="streetAddress">
                            <label for="city">City</label>
                            <input type="text" name="city">
                            <label for="state">State</label>
                            <input type="text" name="state">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" name="zipcode">
                        </form>-->
                    <h2>Checkout</h2>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName">First Name:</label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastName">Last Name:</label>
                        <input type="password" class="form-control" id="inputLastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group formPadding">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group formPadding">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="checkoutBtnDiv formPadding">
                    <button type="submit" class="btn btn-warning">Checkout</button>
                </div>
            </form>
        </main>
    </body>
</html>