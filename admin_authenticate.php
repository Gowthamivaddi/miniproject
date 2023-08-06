<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adminId = $_POST["admin_id"];
    $adminPassword = $_POST["admin_password"];
    $validAdminId = 'ADMIN';
    $validAdminPassword = '12345';

    if ($adminId === $validAdminId && $adminPassword === $validAdminPassword) {
        // Authentication successful
        $response = array(
            "status" => "success",
            "message" => "Admin authenticated successfully!"
        );
    } else {
        // Authentication failed
        $response = array(
            "status" => "error",
            "message" => "Invalid admin credentials."
        );
    }

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

