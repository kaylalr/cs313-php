<?php

function showPuppies($puppies) {
    $showPuppies = "<div class='gridContainer'>";
    foreach ($puppies as $puppy) {
    $showPuppies .= '<div class="gridItem">';
    if ($puppy['imgpath']) {
        $showPuppies .= '<img src="' . $puppy['imgpath'] . '" alt="' . $puppy['imgdescription'] . '">';
    }
    $showPuppies = '<h4>' . $puppy['name'] . '</h4></div>';
    }
    $showPuppies .= '</div>';
    return $showPuppies;
}
