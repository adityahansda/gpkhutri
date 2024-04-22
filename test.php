<?php

function generateUniqueID() {
    $prefix = "LB";
    $year = date("y"); // Get current year in two digits
    $random_numbers = mt_rand(100, 999); // Generate random 3-digit number
    $suffix = ""; // Or any other fixed suffix you want

    // Concatenate the parts to form the unique ID
    $uniqueID = $prefix . $year . $random_numbers . $suffix;

    return $uniqueID;
}

// Example usage:
$uniqueID = generateUniqueID();
echo $uniqueID;

