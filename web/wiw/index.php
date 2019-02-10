<?php

// Create or access a Session
session_start();

// Get the database connection file
require_once('library/connections.php');
// Get the functions file
require_once ('library/functions.php');
// Get puppies model
require_once ('model/puppies-model.php');

//puppies array for shopping cart assignment
$puppies = array(
    array('id' => 1, 'Name' => 'Male Puppy 1', 'Price' => '$1200', 'ImagePath' => 'images/boy1sm.jpg', 'ImageDescription' => 'male puppy', 'Gender' => 'male'),
    array('id' => 2, 'Name' => 'Male Puppy 2', 'Price' => '$1200', 'ImagePath' => 'images/boy1sm.jpg', 'ImageDescription' => 'male puppy', 'Gender' => 'male'),
    array('id' => 3, 'Name' => 'Male Puppy 3', 'Price' => '$1200', 'ImagePath' => 'images/boy1sm.jpg', 'ImageDescription' => 'male puppy', 'Gender' => 'male'),
    array('id' => 4, 'Name' => 'Female Puppy 1', 'Price' => '$1200', 'ImagePath' => 'images/girl5sm.jpg', 'ImageDescription' => 'female puppy', 'Gender' => 'female'),
    array('id' => 5, 'Name' => 'Female Puppy 2', 'Price' => '$1200', 'ImagePath' => 'images/girl5sm.jpg', 'ImageDescription' => 'female puppy', 'Gender' => 'female'),
    array('id' => 6, 'Name' => 'Female Puppy 3', 'Price' => '$1200', 'ImagePath' => 'images/girl5sm.jpg', 'ImageDescription' => 'female puppy', 'Gender' => 'female'),
);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

// put these into a fuctions.php eventually
// this function needs access to the puppies array
function createCart($puppies) {
    $cartItems = "";
    foreach ($_SESSION['cart'] as $currentItem) {
        foreach ($puppies as $puppy) {
            if ($currentItem == $puppy['id']) {
                $cartItems .= '<div class="cartItem">';
                $cartItems .= '<img class="cartItemContent" src="' . $puppy['ImagePath'] . '" alt="' . $puppy['ImageDescription'] . '">';
                $cartItems .= '<div class="cartItemContent">';
                $cartItems .= '<h3>' . $puppy['Name'] . '</h3>';
                $cartItems .= '<p class="cartItemPrice">' . $puppy['Price'] . '</p>';
                $cartItems .= '<a href="index.php?action=removeCart&id=' . $puppy['id'] . '">Remove</a>';
                $cartItems .= '</div></div>';
            }
        }
    }
    return $cartItems;
}

switch ($action) {
    case "cart":
//        $puppies = getAllPuppies();
//        print_r($puppies);
//        exit;
        $cartItems = createCart($puppies);
        include 'cart.php';
        break;
    case "puppies":
        $genderFilter = filter_input(INPUT_POST, 'genderFilter', FILTER_SANITIZE_STRING);
        if ($genderFilter == null) {
            $genderFilter = 'both';
        }
        $puppyGrid = "<div class='gridContainer'>";
        foreach ($puppies as $puppy) {
            if ($genderFilter == 'male' && $puppy['Gender'] == 'male') {
                $puppyGrid .= '<div class="gridItem">
                    <img src="' . $puppy['ImagePath'] . '" alt="' . $puppy['ImageDescription'] . '">
                    <h4>' . $puppy['Name'] . '</h4>
                    <p>Price: ' . $puppy['Price'] . '</p>
                    <a class="btn btn-warning" href="index.php?action=addCart&id=' . $puppy['id'] . '">Add to Cart</a>
                </div>';
            } elseif ($genderFilter == 'female' && $puppy['Gender'] == 'female') {
                $puppyGrid .= '<div class="gridItem">
                    <img src="' . $puppy['ImagePath'] . '" alt="' . $puppy['ImageDescription'] . '">
                    <h4>' . $puppy['Name'] . '</h4>
                    <p>Price: ' . $puppy['Price'] . '</p>
                    <a class="btn btn-warning" href="index.php?action=addCart&id=' . $puppy['id'] . '">Add to Cart</a>
                </div>';
            } elseif ($genderFilter == 'both') {
                $puppyGrid .= '<div class="gridItem">
                    <img src="' . $puppy['ImagePath'] . '" alt="' . $puppy['ImageDescription'] . '">
                    <h4>' . $puppy['Name'] . '</h4>
                    <p>Price: ' . $puppy['Price'] . '</p>
                    <a class="btn btn-warning" href="index.php?action=addCart&id=' . $puppy['id'] . '">Add to Cart</a>
                </div>';
            }
        }
        $puppyGrid .= "</div>";
        include 'puppies.php';
        break;
    case "addCart":
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        foreach ($puppies as $puppy) {
            if ($puppy['id'] == $id) {
                $addedPuppy = $puppy;
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array($puppy['id']);
                } else {
                    array_push($_SESSION['cart'], $puppy['id']);
                }
            }
        }
        $cartItems = createCart($puppies);
        $newItemMessage = "<h2>Congratulations! You added" . $addedPuppy['name'] . "to your cart!</h2>";
        header("Location: index.php?action=cart");
        break;
    case "removeCart":
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        foreach ($_SESSION['cart'] as $key => $currentItem) {
            if ($currentItem == $id) {
                array_splice($_SESSION['cart'], $key, 1);
            }
        }
        header("Location: index.php?action=cart");
        break;
    case "cartDeleteAll":
        unset($_SESSION['cart']);
        header("Location: index.php?action=cart");
        break;
    case "checkout":
        include 'checkout.php';
        break;
    case 'checkoutConfirm':
        $firstName = filter_input(INPUT_POST, 'inputFirstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'inputLastName', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'inputAddress', FILTER_SANITIZE_STRING);
        $address2 = filter_input(INPUT_POST, 'inputAddress2', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'inputCity', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'inputState', FILTER_SANITIZE_STRING);
        $zipcode = filter_input(INPUT_POST, 'inputZip', FILTER_SANITIZE_STRING);

        $shippingAddress = "$firstName $lastName<br>"
                . "$address $address2<br>"
                . "$city, $state $zipcode";

        include 'checkout-confirm.php';
        break;
    case 'viewPuppies':
        $genderFilter = filter_input(INPUT_POST, 'genderFilter', FILTER_SANITIZE_STRING);
        switch ($genderFilter) {
            case 'male':
                $filterShow = "<h2>Sowing all male puppies.</h2>";
                $puppies = getMalePuppies();
                break;
            case 'female':
                $filterShow = "<h2>Sowing all female puppies.</h2>";
                $puppies = getFemalePuppies();
                break;
            default:
                $filterShow = "<h2>Sowing all puppies.</h2>";
                $puppies = getAllPuppies();
        }
//        var_dump($puppies);
//        exit;
        $showPuppies = showPuppies($puppies);
        include 'view-puppies.php';
        break;
    case 'viewTerriers':
        $terriers = getTerriers();
        $showTerriers = showTerriers($terriers);
        include 'view-terriers.php';
        break;
    case 'viewGallery':
        $pictures = getAllPictures();
        $showGallery = showGallery($pictures);
        include 'view-gallery.php';
        break;
    case 'login':
        include 'login.php';
        break;
    case 'loggedin':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $verify = checkUser($username);
//        var_dump($verify);
//        echo "password: $password";
//        exit;
        if ($verify['userpassword'] == $password) {
//            echo "getting here";
            $_SESSION['loggedin'] = TRUE;
            include 'admin.php';
        }
        break;
    default:
        include 'home.php';
}