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

function showTerriersForUpdate($terriers) {
    $showTerriers = "<div class='gridContainer'>";
    foreach ($terriers as $terrier) {
        $showTerriers .= '<div class="gridItem">';
        if ($terrier['imgpath']) {
            $showTerriers .= '<img src="' . $terrier['imgpath'] . '" alt="' . $terrier['imgdescription'] . '">';
        } else {
            $showTerriers .= '<img id="no-image" src="/wiw/images/no-image.png" alt="no image available">';
        }
        $showTerriers .= '<h4><a href="index.php?action=updateTerrier&id=' . $terrier[damid] . '">Update ' . $terrier['name'] . '</a></h4></div>';
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

// Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name) {
    // Gets the paths, full and local directory
    global $image_dir, $image_dir_path;
    echo ", getting here two";
    if (isset($_FILES[$name])) {
        // Gets the actual file name
        echo ", getting here three.one";

        $filename = $_FILES[$name]['name'];
        if (empty($filename)) {
            echo "not working!";
            return;
        }
        echo ", getting here three.two";

        // Get the file from the temp folder on the server
        $source = $_FILES[$name]['tmp_name'];
        // Sets the new path - images folder in this directory
        $target = $image_dir_path . '/' . $filename;
        // Moves the file to the target folder
        move_uploaded_file($source, $target);
        // Send file for further processing
        processImage($image_dir_path, $filename);
        // Sets the path for the image for Database storage
        $filepath = $image_dir . '/' . $filename;
        // Returns the path where the file is stored
        return $filepath;
    }
}

// Processes images by getting paths and 
// creating smaller versions of the image
function processImage($dir, $filename) {
    // Set up the variables
    $dir = $dir . '/';

    // Set up the image path
    $image_path = $dir . $filename;

    // Set up the thumbnail image path
    $image_path_tn = $dir . makeThumbnailName($filename);

    // Create a thumbnail image that's a maximum of 200 pixels square
    resizeImage($image_path, $image_path_tn, 200, 200);

    // Resize original to a maximum of 500 pixels square
    resizeImage($image_path, $image_path, 500, 500);
}
