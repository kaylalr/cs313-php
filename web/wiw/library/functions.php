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

function showPuppiesforUpdate($puppies) {
    $showPuppies = "<div class='gridContainer'>";
    foreach ($puppies as $puppy) {
        $showPuppies .= '<div class="gridItem">';
        if ($puppy['imgpath']) {
            $showPuppies .= '<img src="' . $puppy['imgpath'] . '" alt="' . $puppy['imgdescription'] . '">';
        } else {
            $showPuppies .= '<img id="no-image" src="/wiw/images/no-image.png" alt="no image available">';
        }
        $showPuppies .= '<h4><a href="index.php?action=updatePuppy&id=' . $puppy['puppyid'] . '">Update ' . $puppy['name'] . '</a></h4></div>';
    }
    $showPuppies .= '</div>';
    return $showPuppies;
}

function showTerriers($terriers) {
    $showTerriers = "<div class='gridContainer'>";
    foreach ($terriers as $terrier) {
        $showTerriers .= '<div class="gridItem">';
        if ($terrier['imgpath']) {
            $showTerriers .= '<img src="' . $terrier['imgpath'] . '" alt="' . $terrier['imgdescription'] . '">';
        } else {
            $showTerriers .= '<img id="no-image" src="/wiw/images/no-image.png" alt="no image available">';
        }
        $showTerriers .= '<h4>' . $terrier['name'] . '</h4></div>';
    }
    $showTerriers .= '</div>';
    return $showTerriers;
}

function showGallery($pictures) {
    $showGallery = "<div class='gridContainer'>";
    foreach ($pictures as $pic) {
        $showGallery .= '<div class="gridItem">';
        $showGallery .= '<img src="' . $pic['imgpath'] . '" alt="' . $pic['imgdescription'] . '"></div>';
    }
    $showGallery .= '</div>';
    return $showGallery;
}
