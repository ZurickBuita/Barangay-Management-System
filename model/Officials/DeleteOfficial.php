<?php
include '../../server/Database.php';

// Get the ID from the request and escape it
$id = $conn->real_escape_string($_GET['id']);

$response = []; // Initialize response array

if (!empty($id)) {
    $query = "DELETE FROM officials WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result === true) {
        $response['status'] = 'success';
        $response['message'] = 'Official has been removed!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Something went wrong!';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Missing Official ID!';
}

// Set the content type to application/json
header('Content-Type: application/json');
// Return the JSON response
echo json_encode($response);
