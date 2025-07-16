<?php
include "../../server/Database.php";

$response = [];
if (isset($_SESSION['username'])) {
    $fields = [
        "username" => "username",
        "password" => "password", 
        "confirm_password" => "confirm_password",
        "user_type" => "user_type",
    ];

    foreach($fields as $key => $value) {
        $$key = isset($_POST[$value]) ? $conn->real_escape_string($_POST[$value]) : ''; 
    }
    
    // Check if username is empty
    if (empty($username)) {
        $response['errors']['username'] = 'Username is required!';
        $response['status'] = 'error';
    } 
    // Check if password is empty
    if (empty($password)) {
        $response['errors']['password'] = 'Passwords is required!';
        $response['status'] = 'error';
    } 
     // Check if confirm password is empty
    if (empty($confirm_password)) {
        $response['errors']['confirm_password'] = 'Confirm password is required!';
        $response['status'] = 'error';
    } 
    // Check if passwords match
    if ($password !== $confirm_password) {
        $response['errors']['password'] = 'Passwords do not match!';
        $response['status'] = 'error';
    } 
    // Check if user type is empty
    if (empty($user_type)) {
        $response['errors']['user_type'] = 'User type is required!';
        $response['status'] = 'error';
    } 

    if(!isset($response['status'])) {
        // Get user avatar
        $avatar_name = $_FILES['avatar']['name'];
        $file_extension = pathinfo($avatar_name, PATHINFO_EXTENSION);
        $avatar_img = uniqid("IMG-", true). '.'. $file_extension;
        $target = "../../storage/user_img/". $avatar_img;
        // Hash the password before storing it
        $hashed_password = sha1($password);

        if (!empty($avatar_name)) {
            // Insert query to database
            $query = "INSERT INTO `users`(`avatar`, `username`, `password`, `user_type`) VALUES ('$avatar_img', '$username', '$hashed_password', '$user_type')";
            move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
        } else {
            // Insert query to database
            $query = "INSERT INTO `users`(`username`, `password`, `user_type`) VALUES ('$username', '$hashed_password', '$user_type')";
        }
       
        $result = $conn->query($query);

        // Check the result
        if ($result) {
            $response['message'] = 'User has been added!';
            $response['status'] = 'success';
        } else {
            $response['message'] = 'Something went wrong!';
            $response['status'] = 'error';
        }
    }
}
echo json_encode($response);
?>
