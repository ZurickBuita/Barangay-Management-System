<?php
include "../../server/Database.php";

$response = [];
if (isset($_SESSION['username'])) {
    $fields = [
        "position" => "position",
        "order" => "order",
    ];
    foreach ($fields as $key => $value) {
        $$key = (isset($_POST[$value])) ? $conn->real_escape_string(trim($_POST[$value])) : "";
    }

    // Validate position
    if (empty($position)) {
        $response['status'] = 'error';
        $response['errors']['position'] = "Position field is required!";
    } else {
        // Check if position already exists
        $checkPositionQuery = "SELECT * FROM `position` WHERE `position` = '$position'";
        $checkPositionResult = $conn->query($checkPositionQuery);
        if ($checkPositionResult->num_rows > 0) {
            $response['status'] = 'error';
            $response['errors']['position'] = "Position must be unique!";
        }
    }

    // Validate order
    if (empty($order)) {
        $response['status'] = 'error';
        $response['errors']['order'] = "Order field is required!";
    } else {
        // Check if order already exists
        $checkOrderQuery = "SELECT * FROM `position` WHERE `order` = '$order'";
        $checkOrderResult = $conn->query($checkOrderQuery);
        if ($checkOrderResult->num_rows > 0) {
            $response['status'] = 'error';
            $response['errors']['order'] = "Order must be unique!";
        }
    }

    // If there are no errors, proceed to insert
    if (!isset($response['status'])) {
        // Insert query to database
        $query = "INSERT INTO `position`(`position`, `order`) VALUES ('$position','$order')";
        $result = $conn->query($query);

        // Check the result
        if ($result) {
            $response['message'] = 'Position has been added!';
            $response['status'] = 'success';
        } else {
            $response['message'] = 'Something went wrong!';
            $response['status'] = 'error';
        }
    }
}
echo json_encode($response);
?>
