<?php
include '../../server/Database.php';

$response = [];
if (isset($_SESSION['username'])) {
	$fields = [
		"id" => "id",
	    "title" => "title",
	];
	foreach ($fields as $key => $value) {
	    $$key = (isset($_POST[$value])) ? $conn->real_escape_string(trim($_POST[$value])) : "";
	}

	// Validate title
	if (empty($title)) {
	    $response['status'] = 'error';
	    $response['errors']['title'] = "Title field is required!";
	} else {
	    // Check if title already exists
	    $checkTitleQuery = "SELECT * FROM `chairmanship` WHERE `title` = '$title' AND `id` != '$id'";
	    $checkTitleresult = $conn->query($checkTitleQuery);
	    if ($checkTitleresult->num_rows > 0) {
	        $response['status'] = 'error';
	        $response['errors']['title'] = "Title must be unique!";
	    }
	}

	if (!empty($id) && !isset($response['status'])) {
		$query = "UPDATE chairmanship SET `title` = '$title', `updated_at`=NOW() WHERE `id`='$id'";
		$result = $conn->query($query);

		if ($result) {
			$response['message'] = 'Chairmanship has been updated!';
			$response['status'] = 'success';

		} else {
			$response['message'] = 'Somethin went wrong!';
			$response['status'] = 'error';
		}

	} else {
		$response['message'] = 'No title ID found!';
		$response['status'] = 'error';
	}
}
echo json_encode($response);
?>