<?php

function showPuppies($puppies) {
    $showPuppies = "<div class='gridContainer'>";
    foreach ($puppies as $puppy) {
    $showPuppies .= '<div class="gridItem">';
    if ($puppy['imgpath']) {
        $showPuppies .= '<img src="' . $puppy['imgpath'] . '" alt="' . $puppy['imgdescription'] . '">';
    } else {
        $showPuppies .= '<img id="no-image" src="/wiw/images/no-image.png" alt="no image available">';
    }
    $showPuppies .= '<h4>' . $puppy['name'] . '</h4></div>';
    }
    $showPuppies .= '</div>';
    return $showPuppies;
}
