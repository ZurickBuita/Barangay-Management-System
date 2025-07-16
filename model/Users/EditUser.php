<?php
include '../../server/Database.php';

$response = [];
if (isset($_SESSION['username'])) {	
	$query = [];
	$result = [];
	$fields = [
		"id" => "id",
	    "username" => "username",
	    "password" => "password", 
	    "confirm_password" => "business_nature", 
	    "user_type" => "user_type"
	];

	foreach($fields as $key => $value) {
		$$key = isset($_POST[$value]) ? $conn->real_escape_string($_POST[$value]) : '';
	}

	// Check if Username is empty
	if(empty($username)) {
		$response['errors']['username'] = "Username field is required";
		$response['status'] = "error";
	} else {
		$query['is_username_exist'] = "SELECT * FROM `users` WHERE `username`='$username' AND `id`!='$id'";
		$result['is_username_exist'] = $conn->query($query['is_username_exist']);
		if($result['is_username_exist'] && $result['is_username_exist']->num_rows > 0) {
			$response['errors']['username'] = "Username field already exists!";
			$response['status'] = "error";
		}
	}

	 // Check if passwords match
    if (!empty($password) && ($password !== $confirm_password)) {
        $response['errors']['password'] = 'Passwords do not match!';
        $response['status'] = 'error';
    } 
	// Check if user type is empty
	if(empty($user_type)) {
		$response['errors']['user_type'] = "User Type field is required";
		$response['status'] = "error";
	}

	$img_name = $_FILES['avatar']['name'];
	$img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
	$img = uniqid("IMG-", true) .'.'. $img_extension;
	$path = "../../storage/user_img/" .$img;
	
	if (!empty($id) && !isset($response['status'])) {
		$query['edit'] = "UPDATE `users` SET `username`='$username',`user_type`='$user_type'";

		if(!empty($password)) {
			$password = sha1($password);
			$query['edit'] .= ",`password`= '$password'";
		}

		if(!empty($img_name)) {
			$query['edit'] .= ",`avatar`= '$img'";
			move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

			$query['select'] = "SELECT avatar FROM `users` WHERE id=$id";
			if($result['select'] = $conn->query($query['select'])) {
				$_SESSION['avatar'] = $img;
				$row = $result['select']->fetch_assoc();
				$prev_img = "../../storage/user_img/" .$row['avatar'];
				if(file_exists($prev_img)) {
					unlink($prev_img);
				}
			}
		}

		$query['edit'] .= "WHERE `id`='$id'";
		$result['edit'] = $conn->query($query['edit']);

		if ($result['edit']) {
			$response['message'] = 'User profile has been updated!';
			$response['status'] = 'success';
		} else {
			$response['message'] = 'Somethin went wrong!';
			$response['status'] = 'error';
		}
	} else {
		$response['message'] = 'No User profile ID found!';
		$response['status'] = 'error';
	}
}
echo json_encode($response);
?>