<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href='main.css'>
    <title>Login</title>
</head>
<body>
    <header>
        <?php $login = "active"; include 'header.php'; ?>
    </header>
    <main>
        <ul>
            <li><a href="index.php?action=adminLogin">Login as Administrator</a></li>
            <li>Login as Tester</li>
        </ul>
    </main>
</body>
</html>