<?php
// Simulate processing the form submission and updating the contact details
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $newAddress = $_POST["address"];
    $newEmail = $_POST["email"];

    $data = array("address" => $newAddress, "email" => $newEmail);
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents('task/project/data/contact_details.json', $jsonString);

    // Return a JSON response to the frontend
    $response = array(
        "status" => "success",
        "message" => "Contact details updated successfully!",
        "newAddress" => $newAddress,
        "newEmail" => $newEmail
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

