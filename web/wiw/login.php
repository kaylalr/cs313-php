<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css" type="text/css">
        
<!--     don't know if I need this    -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Login</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <!--<h1>Login</h1>-->

            <!--                <form class="form" method="post" action="/wiw/index.php?action=admin">
                                <label><strong>Email Address</strong></label>
                                <input name="username" id="username" type="text" placeholder="username" required>
                                <label><strong>Password</strong></label>
                                <input name="password" id="password" type="password" placeholder="password" required>
                                <input type="hidden" name="action" value="admin">
                                <button id="loginBtn" class="formBtn">Login</button>
                            </form>-->
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-form-1">
                        <h3>Login</h3>
                        <form method="post" action="/wiw/index.php?action=admin">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="username" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Login" />
                            </div>
                            <!--                        <div class="form-group">
                                                        <a href="#" class="ForgetPwd">Forget Password?</a>
                                                    </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

