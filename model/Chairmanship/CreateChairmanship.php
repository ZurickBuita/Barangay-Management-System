<?php
include "../../server/Database.php";

$response = [];
if (isset($_SESSION['username'])) {
	$fields = [
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
	    $checkTitleQuery = "SELECT * FROM `chairmanship` WHERE `title` = '$title'";
	    $checkTitleresult = $conn->query($checkTitleQuery);
	    if ($checkTitleresult->num_rows > 0) {
	        $response['status'] = 'error';
	        $response['errors']['title'] = "Title must be unique!";
	    }
	}

	if(!isset($response['status'])) {
		// insert query to database
		$query = "INSERT INTO `chairmanship`(`title`) VALUES ('$title')";
		$result = $conn->query($query);

		// Check the result
		if($result) {
			$response['message'] = 'Chairmanship has been added!';
			$response['status'] = 'success';
		} else {
			$response['message'] = 'Something went wrong!';
				$response['status'] = 'error';
		}
	}
}
echo json_encode($response);
?>