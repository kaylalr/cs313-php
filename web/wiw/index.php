<?php

// Create or access a Session
session_start();

//puppies array for shopping cart assignment
$puppies = array(
    array('id' => 1, 'Name' => 'Male Puppy 1', 'Price' => '$1200', 'ImagePath' => 'images/boy1sm.jpg', 'ImageDescription' => 'male puppy', 'Cart' => 'false'),
    array('id' => 2, 'Name' => 'Male Puppy 2', 'Price' => '$1200', 'ImagePath' => 'images/boy1sm.jpg', 'ImageDescription' => 'male puppy', 'Cart' => 'false'),
    array('id' => 3, 'Name' => 'Male Puppy 3', 'Price' => '$1200', 'ImagePath' => 'images/boy1sm.jpg', 'ImageDescription' => 'male puppy', 'Cart' => 'false'),
    array('id' => 4, 'Name' => 'Female Puppy 1', 'Price' => '$1200', 'ImagePath' => 'images/girl5sm.jpg', 'ImageDescription' => 'female puppy', 'Cart' => 'false'),
    array('id' => 5, 'Name' => 'Female Puppy 2', 'Price' => '$1200', 'ImagePath' => 'images/girl5sm.jpg', 'ImageDescription' => 'female puppy', 'Cart' => 'false'),
    array('id' => 6, 'Name' => 'Female Puppy 3', 'Price' => '$1200', 'ImagePath' => 'images/girl5sm.jpg', 'ImageDescription' => 'female puppy', 'Cart' => 'false'),
);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

// put these into a fuctions.php eventually
// this function needs access to the puppies array
function createCart($puppies) {
    $cartItems = "";
//    echo "sessoin variabl e: " . $_SESSION['cart'];
    foreach ($_SESSION['cart'] as $currentItem) {
        foreach ($puppies as $puppy) {
            if ($currentItem == $puppy['id']) {
                $cartItems .= '<div class="cartItem">';
                $cartItems .= '<img class="cartItemContent" src="' . $puppy['ImagePath'] . '" alt="' . $puppy['ImageDescription'] . '">';
                $cartItems .= '<div class="cartItemContent">';
                $cartItems .= '<h3>' . $puppy['Name'] . '</h3>';
                $cartItems .= '<p class="cartItemPrice">' . $puppy['Price'] . '</p>';
                $cartItems .= '<a href="index.php?action=removeCart&id=' . $puppy['id'] .'">Remove</a>';
                $cartItems .= '</div></div>';
            }
        }
    }
    return $cartItems;
}

switch ($action) {
    case "cart":
        $cartItems = createCart($puppies);
//        echo 'cart items: ' . $cartItems;
        print_r($_SESSION['cart']);
        include 'cart.php';
        break;
    case "puppies":
        $puppyGrid = "<div class='gridContainer'>";
        foreach ($puppies as $puppy) {
            $puppyGrid .= '<div class="gridItem">
                    <img src="' . $puppy['ImagePath'] . '" alt="' . $puppy['ImageDescription'] . '">
                    <h4>' . $puppy['Name'] . '</h4>
                    <p>Price: ' . $puppy['Price'] . '</p>
                    <a class="btn btn-warning" href="index.php?action=addCart&id=' . $puppy['id'] . '">Add to Cart</a>
                </div>';
        }
        $puppyGrid .= "</div>";
        include 'puppies.php';
        break;
    case "addCart":
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
//        make function to get puppy by id from database insead of doing the following
//        do {
        foreach ($puppies as $puppy) {
            if ($puppy['id'] == $id) {
                $addedPuppy = $puppy;
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array($puppy['id']);
                } else {
//                    $_SESSION['cart'] .= ", " . $puppy['id'];
                    array_push($_SESSION['cart'], $puppy['id']);
                }
            }
        }
//        print_r($_SESSION['cart']);
//        exit;
        $cartItems = createCart($puppies);
//        } while ($found == false);
        // get total number of things in cart
        if (!isset($_SESSION['cart']['total'])) {
            $_SESSION['cart']['total'] = 1;
        } else {
            $_SESSION['cart']['total'] += 1;
        }     
        header("Location: index.php?action=cart");
        break;
    case "removeCart":
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        foreach($_SESSION['cart'] as $key => $currentItem) {
//            echo "key => " . $key . " value => " . $currentItem . "<br>";
            if($currentItem == $id) {
//                unset($_SESSION['cart']);
//                echo '<br>remove key => ' . $key . " value => " . $currentItem . '<br>';
                array_splice($_SESSION['cart'], $key);
//                echo "<br><br>session cart: ";
//                print_r($_SESSION['cart']);
//                echo "<br><br>";
//                exit;
            }
        }
//        exit;
//        for($i = 0; $i <= $_SESSION['cart']; $i++) {
//            echo $_SESSION['cart']['i'];
//            exit;
//            if($_SESSION['cart'][i] == $id) {
//                array_splice($_SESSION, $i);
//            }
//        }
//        echo 'sesion variable: ';
//        print_r($_SESSION['cart']);
//        exit;
        header("Location: index.php?action=cart");
        break;
    case "cartDeleteAll":
        unset($_SESSION['cart']);
        header("Location: index.php?action=cart");
        break;
    default:
        include 'home.php';
}