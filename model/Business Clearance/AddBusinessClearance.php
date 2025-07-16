<?php
include "../../server/Database.php";

$response = [];
if (isset($_SESSION['username'])) {
    $fields = [
        "business_name" => "business_name",
        "business_owner" => "business_owner", 
        "business_nature" => "business_nature", 
        "date_applied" => "date_applied"
    ];

    foreach($fields as $key => $value) {
        $$key = isset($_POST[$value]) ? $conn->real_escape_string(trim($_POST[$value])) : '';
    }
    // Check if business_name is empty
    if (empty($business_name)) {
        $response['errors']['business_name'] = 'Business Name field is required!';
        $response['status'] = 'error';
    } 
    // Check if business_owner is empty
    if (empty($business_owner)) {
        $response['errors']['business_owner'] = 'Business Owner field is required!';
        $response['status'] = 'error';
    } 
    // Check if business_nature is empty
    if (empty($business_nature)) {
        $response['errors']['business_nature'] = 'Business Nature field is required!';
        $response['status'] = 'error';
    } 
    // Check if date_applied is empty
    if (empty($date_applied)) {
        $response['errors']['date_applied'] = 'Date Applied field is required!';
        $response['status'] = 'error';
    } 

    if(!isset($response['status'])) {
        // Insert query to database
        $query = "INSERT INTO `permit`(`name`, `owner`, `nature`, `applied`) VALUES ('$business_name', '$business_owner', '$business_nature', '$date_applied')";
        $result = $conn->query($query);

        // Check the result
        if ($result) {
            $response['message'] = 'Business Clearance  has been added!';
            $response['status'] = 'success';
        } else {
            $response['message'] = 'Something went wrong!';
            $response['status'] = 'error';
        }
    }
}
echo json_encode($response);
?>
