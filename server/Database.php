<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'barangay_management_system';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if(!isset($_SESSION)) {
     session_start();
    }
    if(!isset($_SESSION['username'])) {
     header('Location: login.php');
    }
?>