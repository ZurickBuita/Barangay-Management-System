<?php
include '../server/Database.php';

$username = $conn->real_escape_string($_POST['username']);
$password = sha1($conn->real_escape_string($_POST['password']));


if ($username != '' and $password != '') {
    $query = $result = [];
    $query['select_user'] = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result['select_user'] = $conn->query($query['select_user']);

    if ($result['select_user']->num_rows) {
        while ($row = $result['select_user']->fetch_assoc()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['user_type'];
            if(!empty($row['avatar'])) {
                $_SESSION['avatar'] = "storage/user_img/".$row['avatar'];
            } else {
                $_SESSION['avatar'] = "img/undraw_profile.svg";
            }
            
        }
        // display barangay logo
        $query['brgy_logo'] = "SELECT `brgy_logo` FROM `brgy_info` LIMIT 1";
        $result['brgy_logo'] = $conn->query($query['brgy_logo']);
        $row =  $result['brgy_logo']->fetch_assoc();
        $_SESSION['brgy_logo'] = $row['brgy_logo'];

        $_SESSION['message'] = 'You have successfully logged in to the barangay management system!';
        $_SESSION['success'] = 'success';

        header('location: ../dashboard.php');

    } else {
        $_SESSION['message'] = 'The username or password is incorrect!';
        $_SESSION['success'] = 'danger';
        header('location: ../login.php');
    }
} else {
    $_SESSION['message'] = 'The username or password is empty!';
    $_SESSION['success'] = 'danger';
    header('location: ../login.php');
}



$conn->close();