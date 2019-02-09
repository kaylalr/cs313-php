<?php

function showPuppies($puppies) {
    $showPuppies = "<div class='gridContainer'>";
    foreach ($puppies as $puppy) {
    $showPuppies .= '<div class="gridItem">
                    <img src="' . $puppy['imgpath'] . '" alt="' . $puppy['imgdescription'] . '">
                    <h4>' . $puppy['name'] . '</h4>
                </div>';
    }
    $showPuppies .= '</div>';
    return $showPuppies;
}
