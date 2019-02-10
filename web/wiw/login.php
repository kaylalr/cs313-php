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
            <h1>Login</h1>

                <form class="form" method="post" action="/acme/accounts/index.php">
                    <label><strong>Email Address</strong></label>
                    <input name="username" id="clientEmail" type="text" placeholder="username" required>
                    <label><strong>Password</strong></label>
                    <input name="password" id="clientPassword" type="password" placeholder="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <input type="hidden" name="action" value="login">
                    <button id="loginBtn" class="formBtn">Login</button>
                </form>
        </main>
    </body>
</html>