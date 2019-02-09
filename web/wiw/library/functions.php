<?php

function showPuppies($puppies) {
    $showPuppies = "<div class='gridContainer'>";
    foreach ($puppies as $puppy) {
    $showPuppies .= '<div class="gridItem">';
    if ($puppy['imgpath']) {
        $showPuppies .= '<img src="' . $puppy['imgpath'] . '" alt="' . $puppy['imgdescription'] . '">';
    } else {
        $showPuppies .= '<img src="/web/images/no-image.png" alt="no image available">';
    }
    $showPuppies .= '<h4>' . $puppy['name'] . '</h4></div>';
    }
    $showPuppies .= '</div>';
    echo $showPuppies;
    exit;
    return $showPuppies;
}
