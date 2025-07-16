<?php
include "../../server/Database.php";

$response = [];

if (isset($_SESSION['username'])) {
    $fields = [
        "id" => "id",
        "purok" => "purok",
        "details" => "details",
    ];

    foreach ($fields as $key => $value) {
        $$key = (isset($_POST[$value])) ? $conn->real_escape_string(trim($_POST[$value])) : "";
    }

    if (empty($purok)) {
        $response['status'] = 'error';
        $response['errors']['purok'] = "Purok field is required!";
    } else {
        // Check if the purok already exists, excluding the current ID
        $query = "SELECT * FROM `purok` WHERE name='$purok' AND id != '$id'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $response['status'] = 'error';
            $response['errors']['purok'] = "Purok field already exists!";
        } else {
            if (!empty($id)) {
                // Update query to database
                $query = "UPDATE `purok` SET `name`='$purok', `details`='$details', `updated_at`=NOW() WHERE id = '$id'";
                $result = $conn->query($query);

                // Check the result
                if ($result) {
                    $response['message'] = 'Purok has been updated!';
                    $response['status'] = 'success';
                } else {
                    $response['message'] = 'Something went wrong!';
                    $response['status'] = 'error';
                }
            } else {
                $response['message'] = 'No purok ID found!';
                $response['status'] = 'error';
            }
        }
    }
}

echo json_encode($response);
?>
