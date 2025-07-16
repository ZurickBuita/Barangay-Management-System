<?php

include '../server/Database.php';

$response = [];
if (isset($_SESSION['username'])) {
    $query = $result = $img_name = $img_extension = $img_path = $img = [];
    $fields = [
        'id' => 'id',
        'province' => 'province',
        'town' => 'town',
        'brgy_name' => 'brgy_name',
        'number' => 'number',
        'mission' => 'mission',
        'vision' => 'vision'
    ];

    foreach ($fields as $key => $value) {
        $$key = isset($_POST[$value]) ? $conn->real_escape_string(trim($_POST[$value])) : '';
    }

    // Check if province is empty
    if(empty($province)) {
        $response['errors']['province'] = "Province field is required!";
        $response['status'] = "error";
    }
    // Check if town is empty
    if(empty($town)) {
        $response['errors']['town'] = "Town field is required!";
        $response['status'] = "error";
    }
    // Check if barangay name is empty
    if(empty($brgy_name)) {
        $response['errors']['brgy_name'] = "Barangay name field is required!";
        $response['status'] = "error";
    }
    // Check if number name is empty
    if(empty($number)) {
        $response['errors']['number'] = "Number name field is required!";
        $response['status'] = "error";
    }
    // Check if Mission name is empty
    if(empty($mission)) {
        $response['errors']['mission'] = "Mission name field is required!";
        $response['status'] = "error";
    }
    // Check if Vision name is empty
    if(empty($vision)) {
        $response['errors']['vision'] = "Vision name field is required!";
        $response['status'] = "error";
    }

    $img_name['city_logo'] = $_FILES['city_logo']['name'];
    $img_name['brgy_logo'] = $_FILES['brgy_logo']['name'];
    $img_extension['city_logo'] = pathinfo($img_name['city_logo'], PATHINFO_EXTENSION);
    $img_extension['brgy_logo'] = pathinfo($img_name['brgy_logo'], PATHINFO_EXTENSION);
    $img['city_logo'] = uniqid("IMG-", true). "." .$img_extension['city_logo'];
    $img['brgy_logo'] = uniqid("IMG-", true). "." .$img_extension['brgy_logo'];
    $img_path['city_logo'] = "../storage/barangay_img/" .$img['city_logo'];
    $img_path['brgy_logo'] = "../storage/barangay_img/" .$img['brgy_logo'];

    if (!empty($id) && !isset($response['status'])) {
        // Delete the previous img if exist
        $query['delete_img'] = "SELECT `city_logo`, `brgy_logo` FROM `brgy_info` WHERE id=$id";
        $result['delete_img'] = $conn->query($query['delete_img']);

        if ($row =  $result['delete_img']->fetch_assoc()) {
            $path = "../storage/barangay_img/";

            if(($row['city_logo'] != null) && file_exists($path . $row['city_logo'])) {
                if(!empty($img_name['city_logo'])) {
                    unlink($path.$row['city_logo']); 
                } 
            }
            if(($row['brgy_logo'] != null) && file_exists($path . $row['brgy_logo'])) {
                if(!empty($img_name['brgy_logo'])) {
                    unlink($path.$row['brgy_logo']);
                } 
            }
        }
        // update the barangay info
        $query['update'] = "UPDATE `brgy_info` SET `province`='$province',`town`='$town',`brgy_name`='$brgy_name',`number`='$number',`mission`='$mission',`vision`='$vision'";

        if(!empty($img_name['city_logo'])) {
            $query['update'] .= ",`city_logo`='".$img['city_logo']."'";
            move_uploaded_file($_FILES['city_logo']['tmp_name'], $img_path['city_logo']);
        }

        if(!empty($img_name['brgy_logo'])) {
            $query['update'] .= ",`brgy_logo`='".$img['brgy_logo']."'";
            move_uploaded_file($_FILES['brgy_logo']['tmp_name'], $img_path['brgy_logo']);
            $_SESSION['brgy_logo'] = $img['brgy_logo'];
        }

        $query['update'] .= "WHERE id = $id";
        $result['update'] = $conn->query($query['update']);

        if ($result['update'] == true) {
            
            $response['message'] = 'Barangay Information has been updated!';
            $response['status'] = 'success';
        } else {
            $response['message'] = 'Something went wrong!';
            $response['status'] = 'error';
        }
    } else {
        $response['message'] = 'No Barangay Information ID found!';
        $response['status'] = 'error';
    }
}
echo json_encode($response);
?>
