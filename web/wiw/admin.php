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

        <title>Admin</title>
    </head>
    <body>
        <header>
            <?php include 'common/header.php' ?>
        </header>
        <main>
            <h1>Admin</h1>
            <!--            <div>
                            <div>
                                <h2>Puppies</h2>
                                <a href="index.php?action=updatePuppies">Update Puppies</a><br>
                                <a href="index.php?action=addPuppy">Add Puppy</a><br>
                            </div>
                            <div>
                                <h2>Terriers</h2>
                                <a href="index.php?action=updateTerriers">Update Terriers</a><br>
                                <a href="index.php?action=addTerrier">Add Terrier</a><br>
                            </div>
                            <div>
                                <h2>Images</h2>
                                <a href="index.php?action=addImage">Add Image</a><br>
                                <a href="index.php?action=deleteImage">Delete Image</a><br>
                            </div>
                        </div>-->
            <div class="row">
                <div class="col-sm-2">
                    <nav class="nav-sidebar">
                        <ul class="nav">
                            <li class="active"><a href="javascript:;">Home</a></li>
                            <li><a href="javascript:;">About</a></li>
                            <li><a href="javascript:;">Products</a></li>
                            <li>
                                <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> MENU 1 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                                <ul id="submenu-1" class="collapse">
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.1</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.2</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.3</a></li>
                                </ul>
                            </li>
                            <!--                            <li><a href="javascript:;">FAQ</a></li>
                                                        <li class="nav-divider"></li>
                                                        <li><a href="javascript:;"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>-->
                        </ul>
                    </nav>
                </div>
            </div>


        </main>
    </body>
</html>