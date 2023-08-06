<?php

// Function to create a connection to the JSON files 
function createConnection()
{
    $jsonFolderPath = '/task/data/';
    $heroBannerFile = $jsonFolderPath . 'hero_banner.json';
    $contactDetailsFile = $jsonFolderPath . 'contact_details.json';

    // Read JSON files and decode them into PHP arrays
    $heroBannerData = json_decode(file_get_contents($heroBannerFile), true);
    $contactDetailsData = json_decode(file_get_contents($contactDetailsFile), true);

    // Return an array with both JSON data
    return [
        'hero_banner' => $heroBannerData,
        'contact_details' => $contactDetailsData,
    ];
}

// Usage Example:
$connection = createConnection();

?>

