<?php
include "../../server/Database.php";

$response = [];
if (isset($_SESSION['username'])) {

    $fields = [
       "national_id" => "national_id",
       "citizenship" => "citizenship", 
       "firstname" => "firstname",
       "middlename" => "middlename",
       "lastname" => "lastname",
       "birthday" => "birthday",
       "age" => "age",
       "civilstatus" => "civilstatus",
       "sex" => "sex",
       "is_voter" => "is_voter",
       "email" => "email",
       "occupation" => "occupation",
       "address" => "address",
       "is_deceased" => "is_deceased",
       "purok_id" => "purok_id",
       "is_indigenous" => "is_indigenous",
       "salary" => "salary",
    ];

    foreach($fields as $key => $value) {
        $$key = isset($_POST[$value]) ? $conn->real_escape_string(trim($_POST[$value])) : '';
    }

    // Check if national_id is empty
    if (empty($national_id)) {
        $response['errors']['national_id'] = 'National Id field is required!';
        $response['status'] = 'error';
    } 
    // Check if citizenship is empty
    if (empty($citizenship)) {
        $response['errors']['citizenship'] = 'Citizenship field is required!';
        $response['status'] = 'error';
    } 
    // Check if firstname is empty
    if (empty($firstname)) {
        $response['errors']['firstname'] = 'Firstname field is required!';
        $response['status'] = 'error';
    } 
    // Check if lastname is empty
    if (empty($lastname)) {
        $response['errors']['lastname'] = 'Lastname field is required!';
        $response['status'] = 'error';
    } 
    // Check if birthday is empty
    if (empty($birthday)) {
        $response['errors']['birthday'] = 'Birthday field is required!';
        $response['status'] = 'error';
    } 
    // Check if age is empty
    if (empty($age)) {
        $response['errors']['age'] = 'Age field is required!';
        $response['status'] = 'error';
    } 
    // Check if civilstatus is empty
    if (empty($civilstatus)) {
        $response['errors']['civilstatus'] = 'Civil Status field is required!';
        $response['status'] = 'error';
    } 
    // Check if sex is empty
    if (empty($sex)) {
        $response['errors']['sex'] = 'Sex field is required!';
        $response['status'] = 'error';
    } 
    // Check if is_voter is empty
    if (empty($is_voter)) {
        $response['errors']['is_voter'] = 'Voter field is required!';
        $response['status'] = 'error';
    } 
    // Check if email is empty
    if (empty($email)) {
        $response['errors']['email'] = 'Email field is required!';
        $response['status'] = 'error';
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['errors']['email'] = 'Invalid Email format!';
            $response['status'] = 'error';
        }
    }

     // Check if occupation is empty
    if (empty($occupation)) {
        $response['errors']['occupation'] = 'Occupation field is required!';
        $response['status'] = 'error';
    } 
    // Check if address is empty
    if (empty($address)) {
        $response['errors']['address'] = 'Address field is required!';
        $response['status'] = 'error';
    } 
    // Check if is_deceased is empty
    if (empty($is_deceased)) {
        $response['errors']['is_deceased'] = 'Deceased field is required!';
        $response['status'] = 'error';
    } 
    // Check if purok_id is empty
    if (empty($purok_id)) {
        $response['errors']['purok_id'] = 'Purok field is required!';
        $response['status'] = 'error';
    } 
    // Check if is_indigenous is empty
    if (empty($is_indigenous)) {
        $response['errors']['is_indigenous'] = 'Indigenous field is required!';
        $response['status'] = 'error';
    }
    // Check if salary is empty
    if (empty($salary)) {
        $response['errors']['salary'] = 'Salary field is required!';
        $response['status'] = 'error';
    }

    if(!isset($response['status'])) { 
        // Get image uploaded
        $img = $_FILES['img']['name'];

        if(!empty($img)) {
            $img_extension = pathinfo($img, PATHINFO_EXTENSION); 
            $resident_img =  uniqid("IMG-", true) . '.' . $img_extension;
            $target = "../../storage/resident_img/". $resident_img;


             // Insert query to database
            $query = "INSERT INTO `residents`(`img`,`national_id`, `citizenship`, `firstname`, `middlename`, `lastname`, `birthdate`, `age`, `civilstatus`, `sex`, `is_voter`, `email`, `occupation`, `address`, `is_deceased`, `purok_id`, `is_indigenous`, `salary`) VALUES ('$resident_img', '$national_id', '$citizenship', '$firstname', '$middlename', '$lastname', '$birthday', '$age', '$civilstatus', '$sex', '$is_voter', '$email', '$occupation', '$address', '$is_deceased', '$purok_id', '$is_indigenous', '$salary')";
            // Store the img
            move_uploaded_file($_FILES['img']['tmp_name'], $target);
        } else {
            // Insert query to database
            $query = "INSERT INTO `residents`(`national_id`, `citizenship`, `firstname`, `middlename`, `lastname`, `birthdate`, `age`, `civilstatus`, `sex`, `is_voter`, `email`, `occupation`, `address`, `is_deceased`, `purok_id`, `is_indigenous`, `salary`) VALUES ('$national_id', '$citizenship', '$firstname', '$middlename', '$lastname', '$birthday', '$age', '$civilstatus', '$sex', '$is_voter', '$email', '$occupation', '$address', '$is_deceased', '$purok_id', '$is_indigenous', '$salary')";
        }

        $result = $conn->query($query);

        // Check the result
        if ($result) {
            $response['message'] = 'Resident has been added!';
            $response['status'] = 'success';
        } else {
            $response['message'] = 'Something went wrong!';
            $response['status'] = 'error';
        }
    }
}
echo json_encode($response);
?>
