<?php
include '../../server/Database.php';

// Get the ID from the request and escape it
$id = $conn->real_escape_string($_GET['id']);

$response = [];

if (!empty($id)) {
    $query = "DELETE FROM blotter WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result === true) {
        $response['status'] = 'success';
        $response['message'] = 'Blotter has been removed!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Something went wrong!';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Missing Blotter ID!';
}

// Set the content type to application/json
header('Content-Type: application/json');
// Return the JSON response
echo json_encode($response);
