<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?action=viewPuppies">Puppies</a></li>
        <li><a href="index.php?action=viewTerriers">Terriers</a></li>
        <li><a href="index.php?action=viewGallery">Gallery</a></li>
        <!--<li><a href="index.php?action=puppies">Puppies-Cart</a></li>-->
        <!--        <li><a href="#">Link</a></li>
                <li><a href="#">Another</a></li>
                <li><a href="#">Link</a></li>-->
    </ul>
</nav>
<?php
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin']) {
        echo '<button class = "btn btn-default btn-sm pull-right"><a href="index.php?action=admin">Admin</a></button>';
    }
}
?>
<!--<button type="button" class="btn btn-default btn-sm"><a href="index.php?action=cart">
        <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
    </a></button>-->