<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Supersonic Banana</a>
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>-->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php echo $home ?>" href="index.php">Home</a>
            <a class="nav-item nav-link <?php echo $about ?>" href="index.php?aciton=about">About</a>
            <a class="nav-item nav-link <?php echo $login ?>" href="index.php?action=login">Login</a>
        </div>
    </div>
</nav>
<?php 
if (isset($_SESSION['user'])) {
    if ($_SESSION[user] == "admin") {
        echo "Welcome Admin";
    }
    if ($_SESSION[user] == "tester") {
        echo "Welcome Tester";
    }
}
?>