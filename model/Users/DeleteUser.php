<?php
	include '../../server/Database.php';

	// Get the id from the request and escape it
	$id = $conn->real_escape_string($_GET['id']);

	if(!empty($id)) {
		$query = [];
		$result = [];
		$response = []; // Initialize response array

		$query['select'] = "SELECT avatar FROM `users` WHERE id=$id LIMIT 1";
		$result['select'] = $conn->query($query['select']);
		$row = $result['select']->fetch_assoc();
		$img = $row['avatar'];

		$query['delete'] = "DELETE FROM users WHERE id = '$id'";
	    $result['delete'] = $conn->query($query['delete']);

	    if ($result['delete'] == true) {
	    	$img_path = "../../storage/user_img/".$img;
	    	if(!empty($img)) {
	    		if(file_exists($img_path)) {
					unlink($img_path);
				}
	    	}
			
	        $response['status'] = 'success';
	        $response['message'] = 'User has been removed!';
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