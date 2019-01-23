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

switch ($action) {
    case "cart":
        include 'cart.php';
        break;
    case "puppies":
        $puppyGrid = "<div class='gridContainer'>";
        foreach ($puppies as $puppy) {
            $puppyGrid .= '<div class="gridItem">
                    <img src="' . $puppy['ImagePath'] . '" alt="' . $puppy['ImageDescription'] . '">
                    <p>' . $puppy['Name'] . '</p>
                    <p>Price: ' . $puppy['Price'] . '</p>
                    <a class="btn btn-warning" href="index.php?action=addCart&id='. $puppy['id'] .'">Add to Cart</a>
                </div>';
        }
        $puppyGrid .= "</div>";
        include 'puppies.php';
        break;
    case "addCart":
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
//        make function to get puppy by id from database insead of doing the following
//        do {
        foreach($puppies as $puppy) {
            if($puppy['id'] == $id) {
                $addedPuppy = $puppy;
            }
        }
//        } while ($found == false);
        
        // get total number of things in cart
        if (isset($_SESSION['cart']['total']) && $_SESSION['cart']['total'] > 0) {
            $_SESSION['cart']['total'] += 1;
        } else {
            $_SESSION['cart']['total'] = 1;
        }
        echo $_SESSION['cart']['total'];
        exit;
        
        if(isset($cartItems)) {
            $cartItems .= '<div class="cartItem">';
            $cartItems .= '<img class="cartItemPic" src="' . $addedPuppy['ImagePath'] . '" alt="' . $addedPuppy['ImageDescription'] . '">';
            $cartItems .= '<div class="cartItemInfo">';
            $cartItems .= '<h3>' . $addedPuppy['Name'] . '</h3>';
            $cartItems .= '<p class="cartItemPrice">' . $addedPuppy['Price'] . '</p>';
            $cartItems .= '</div></div>';
        } else {
            $cartItems = '<div class="cartItem">';
            $cartItems .= '<img class="cartItemPic" src="' . $addedPuppy['ImagePath'] . '" alt="' . $addedPuppy['ImageDescription'] . '">';
            $cartItems .= '<div class="cartItemInfo">';
            $cartItems .= '<h3>' . $addedPuppy['Name'] . '</h3>';
            $cartItems .= '<p class="cartItemPrice">' . $addedPuppy['Price'] . '</p>';
            $cartItems .= '</div></div>';
        }

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