<?php
include "../../server/Database.php";

$response = [];
if (isset($_SESSION['username'])) {

    $fields = [
       "complainant" => "complainant",
       "respondent" => "respondent", 
       "victim" => "victim", 
       "type" => "type",
       "location" => "location",
       "date" => "date",
       "time" => "time", 
       "details" => "details", 
       "status" => "status",
    ];

    foreach($fields as $key => $value) {
        $$key = isset($_POST[$value]) ? $conn->real_escape_string(trim($_POST[$value])) : '';
    }

    // Validate complainant
    if (empty($complainant)) {
        $response['errors']['complainant'] = "Complainant field is required!";
        $response['status'] = 'error';
    } 
    // Validate respondent
    if (empty($respondent)) {
        $response['errors']['respondent'] = "Respondent field is required!";
        $response['status'] = 'error';
    } 
    // Validate victim
    if (empty($victim)) {
        $response['errors']['victim'] = "Victim field is required!";
        $response['status'] = 'error';
    } 
    // Validate type
    if (empty($type)) {
        $response['errors']['type'] = "Type field is required!";
        $response['status'] = 'error';
    } 
    // Validate location
    if (empty($location)) {
        $response['errors']['location'] = "Location field is required!";
        $response['status'] = 'error';
    } 
    // Validate date
    if (empty($date)) {
        $response['errors']['date'] = "Date field is required!";
        $response['status'] = 'error';
    }
    // Validate time
    if (empty($time)) {
        $response['errors']['time'] = "Time field is required!";
        $response['status'] = 'error';
    } 
    // Validate details
    if (empty($details)) {
        $response['errors']['details'] = "Details field is required!";
        $response['status'] = 'error';
    } 
    // Validate status
    if (empty($status)) {
        $response['errors']['status'] = "Status field is required!";
        $response['status'] = 'error';
    } 

    if(!isset($response['status'])) {
        // Insert query to database
        $query = "INSERT INTO `blotter`(`complainant`, `respondent`, `victim`, `type`, `location`, `date`, `time`, `details`, `status`) VALUES ('$complainant', '$respondent', '$victim', '$type', '$location', '$date', '$time', '$details', '$status')";
        $result = $conn->query($query);

        // Check the result
        if ($result) {
            $response['message'] = 'Blotter  has been added!';
            $response['status'] = 'success';
        } else {
            $response['message'] = 'Something went wrong!';
            $response['status'] = 'error';
        }
    }
}
echo json_encode($response);
?>
