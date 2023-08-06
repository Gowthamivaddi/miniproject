<?php
// Simulate processing the form submission and updating the hero banner content
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $newTitle = $_POST["title"];
	$newDescription = $_POST['description'];
    $data = array(
    	"title" => $newTitle,
    	"description" => $newDescription
    );
    
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);

    
    file_put_contents('task/project/data/hero_banner.json', $jsonString);

    // Return a JSON response to the frontend
    $response = array(
        "status" => "success",
        "message" => "Hero banner content updated successfully!",
        "newTitle" => $newTitle,
        "newDescription" => $newDescription
    );

    // Send the JSON response back to the frontend
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If the request method is not POST, return an error response
    $response = array(
        "status" => "error",
        "message" => "Invalid request method."
    );

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

