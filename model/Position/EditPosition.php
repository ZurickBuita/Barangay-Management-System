<?php
include '../../server/Database.php';

if (isset($_SESSION['username'])) {
	
	$fields = [
		"id" => "id",
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
        $checkPositionQuery = "SELECT * FROM `position` WHERE `position` = '$position' AND `id`!='$id'";
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
        $checkOrderQuery = "SELECT * FROM `position` WHERE `order` = '$order' AND `id`!='$id'";
        $checkOrderResult = $conn->query($checkOrderQuery);
        if ($checkOrderResult->num_rows > 0) {
            $response['status'] = 'error';
            $response['errors']['order'] = "Order must be unique!";
        }
    }

	if (!empty($id) && !isset($response['status'])) {

		$query = "UPDATE position SET `position` = '$position', `order`=$order, `updated_at`=NOW() WHERE `id`=$id;";
		$result = $conn->query($query);

		if ($result) {
			$response['message'] = 'Position has been updated!';
			$response['status'] = 'success';
		} else {
			$response['message'] = 'Somethin went wrong!';
			$response['status'] = 'error';
		}
	} else {
		$response['message'] = 'No position ID found!';
		$response['status'] = 'error';
	}
}
echo json_encode($response);
?>