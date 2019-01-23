<!--<ul>
    <li><a href="index.php">Home</a></li>
    <li><a>Other</a></li>
    <li><a>Link</a></li>
</ul>
<button type="button" class="btn btn-default btn-sm">
    <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
</button>-->

<!--<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
      
  </div>
</nav>-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php 
if (isset($_SESSION['user'])) {
    if ($_SESSION[user] == "admin") {
        echo "<a class='navbar-brand' href='#'>Welcome Admin</a>";
    }
    if ($_SESSION[user] == "tester") {
        echo "<a class='navbar-brand' href='#'>Welcome Tester</a>";
    }
}
else {
    echo "<a class='navbar-brand' href='#'>Supersonic Banana</a>";
}
?>
    
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>-->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php echo $home ?>" href="index.php">Home</a>
            <a class="nav-item nav-link <?php echo $about ?>" href="index.php?action=about">About</a>
            <a class="nav-item nav-link <?php echo $login ?>" href="index.php?action=login">Login</a>
        </div>
    </div>
</nav>
