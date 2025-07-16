<?php
include "../../server/Database.php";

$response = [];
if (isset($_SESSION['username'])) {

    $fields = [
        "residents_id" => "residents_id",
        "position_id" => "position_id", 
        "chairmanship_id" => "chairmanship_id", 
        "term_id" => "term_id",
        "status" => "status"
    ];

    foreach($fields as $key => $value) {
        $$key = (isset($_POST[$value])) ? $conn->real_escape_string(trim($_POST[$value])) : "";
    }
    // Check if residents_id is empty
    if (empty($residents_id)) {
        $response['errors']['residents_id'] = 'Resident field is required!';
        $response['status'] = 'error';
    } 
    if (empty($position_id)) {
        $response['errors']['position_id'] = 'Position field is required!';
        $response['status'] = 'error';
    } 
    // Check if chairmanship_id is empty
    if (empty($chairmanship_id)) {
        $response['errors']['chairmanship_id'] = 'Chairmanship field is required!';
        $response['status'] = 'error';
    } 
    // Check if term_id is empty
    if (empty($term_id)) {
        $response['errors']['term_id'] = 'Term field is required!';
        $response['status'] = 'error';
    } 
    // Check if status is empty
    if (empty($status)) {
        $response['errors']['status'] = 'Status field is required!';
        $response['status'] = 'error';
    } 

    if(!isset($response['status'])) {
        // Insert query to database
        $query = "INSERT INTO `officials`(`status`, `chairmanship_id`, `position_id`, `term_id`, `resident_id`) VALUES ('$status', '$chairmanship_id', '$position_id', '$term_id', '$residents_id')";
        $result = $conn->query($query);

        // Check the result
        if ($result) {
            $response['message'] = 'Official has been added!';
            $response['status'] = 'success';
        } else {
            $response['message'] = 'Something went wrong!';
            $response['status'] = 'error';
        }
    }
}
echo json_encode($response);
?>
