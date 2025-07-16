<?php
include "../../server/Database.php";

$response = [];
if (isset($_SESSION['username'])) {
	$fields = [
		"start_term" => "start_term",
		"end_term" => "end_term",
	];
	
	foreach ($fields as $key => $value) {
		$$key = isset($_POST[$value]) ? $conn->real_escape_string(trim($_POST[$value])) : '';
	}

	// Check if start term is empty
	if(empty($start_term)) {
		$response['errors']['start_term'] = 'Start Term field is required!';
		$response['status'] = 'error';	
	} 
	// Check if end term is empty
	if(empty($end_term)) {
		$response['errors']['end_term'] = 'End Term field is required!';
		$response['status'] = 'error';	
	} 

	// Check for schedule conflicts
    if (!isset($response['status'])) {
        $conflictQuery = "SELECT * FROM `official_term` WHERE 
                          (start_term <= '$end_term' AND end_term >= '$start_term')";
        $conflictResult = $conn->query($conflictQuery);
        if ($conflictResult && $conflictResult->num_rows > 0) {
            $response['errors']['start_term'] = 'The new term conflicts with an existing term!';
            $response['status'] = 'error';
        }
    }

	if(!isset($response['status'])) {
		// insert query to database
		$query = "INSERT INTO `official_term`(`start_term`, `end_term`) VALUES ('$start_term', '$end_term')";
		$result = $conn->query($query);

		// Check the result
		if($result) {
			$response['message'] = 'Official Term has been added!';
			$response['status'] = 'success';
		} else {
			$response['message'] = 'Something went wrong!';
   			$response['status'] = 'error';
		}
	}
}
echo json_encode($response);
?>