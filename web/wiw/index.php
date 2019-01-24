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
    foreach ($_SESSION['cart']['puppyId'] as $currentItem) {
        echo $currentItem;
        exit;
        foreach ($puppies as $puppy) {
            if ($currentItem == $puppy['id']) {
                echo 'working';
                exit;
                $cartItems .= '<div class="cartItem">';
                $cartItems .= '<img class="cartItemContent" src="' . $puppy['ImagePath'] . '" alt="' . $puppy['ImageDescription'] . '">';
                $cartItems .= '<div class="cartItemContent">';
                $cartItems .= '<h3>' . $puppy['Name'] . '</h3>';
                $cartItems .= '<p class="cartItemPrice">' . $puppy['Price'] . '</p>';
                $cartItems .= '</div></div>';
            }
        }
    }
//    echo $cartItems;
//    exit;
    return $cartItems;
}

switch ($action) {
    case "cart":
        $cartItems = createCart($puppies);
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
                $_SESSION['cart']['puppyId'] .= $puppy['id'];
//                echo $_SESSION['cart']['puppyId'];
//                exit;
            }
        }
        $cartItems = createCart($puppies);
//        } while ($found == false);
        // get total number of things in cart
        if (isset($_SESSION['cart']['total']) && $_SESSION['cart']['total'] > 0) {
            $_SESSION['cart']['total'] += 1;
        } else {
            $_SESSION['cart']['total'] = 1;
        }
//        echo $_SESSION['cart']['total'];
//        if(isset($cartItems)) {
//            $cartItems .= '<div class="cartItem">';
//            $cartItems .= '<img class="cartItemContent" src="' . $addedPuppy['ImagePath'] . '" alt="' . $addedPuppy['ImageDescription'] . '">';
//            $cartItems .= '<div class="cartItemContent">';
//            $cartItems .= '<h3>' . $addedPuppy['Name'] . '</h3>';
//            $cartItems .= '<p class="cartItemPrice">' . $addedPuppy['Price'] . '</p>';
//            $cartItems .= '</div></div>';
//        } else {
//            $cartItems = '<div class="cartItem">';
//            $cartItems .= '<img class="cartItemContent" src="' . $addedPuppy['ImagePath'] . '" alt="' . $addedPuppy['ImageDescription'] . '">';
//            $cartItems .= '<div class="cartItemContent">';
//            $cartItems .= '<h3>' . $addedPuppy['Name'] . '</h3>';
//            $cartItems .= '<p class="cartItemPrice">' . $addedPuppy['Price'] . '</p>';
//            $cartItems .= '</div></div>';
//        }
        // build cart
//        foreach($puppies as $puppy) {
//            if($puppy['Cart']) {
//                
//            }
//        }
//        
        include 'cart.php';
        break;
    default:
        include 'home.php';
}