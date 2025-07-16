<?php
include "../../server/Database.php";

$response = [];

if (isset($_SESSION['username'])) {
    $fields = [
        "purok" => "purok",
        "details" => "details",
    ];

    foreach ($fields as $key => $value) {
        $$key = isset($_POST[$value]) ? $conn->real_escape_string(trim($_POST[$value])) : "";
    }

    if (empty($purok)) {
        $response['status'] = 'error';
        $response['errors']['purok'] = "Purok field is required!";
    } else {
        // Check if the purok already exists
        $query = "SELECT * FROM `purok` WHERE name='$purok'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $response['status'] = 'error';
            $response['errors']['purok'] = "Purok field already exists!";
        } else {
            // Insert query to database
            $query = "INSERT INTO `purok`(`name`, `details`) VALUES ('$purok', '$details')";
            $result = $conn->query($query);

            // Check the result
            if ($result) {
                $response['message'] = 'Purok has been added!';
                $response['status'] = 'success';
            } else {
                $response['message'] = 'Something went wrong!';
                $response['status'] = 'error';
            }
        }
    }
}

echo json_encode($response);
?>
