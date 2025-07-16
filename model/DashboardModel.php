<?php

$query = [];
$result = [];
$results = [];

// Query to get total residents
$query['total_resident'] = "SELECT * FROM residents WHERE is_deceased = 'no'";
$result['total_resident'] = $conn->query($query['total_resident']);
$results['total_resident'] = $result['total_resident']->num_rows;

// Query to get total male residents
$query['male'] = "SELECT * FROM residents WHERE sex = 'male' AND is_deceased = 'no'";
$result['male'] = $conn->query($query['male']);
$results['male'] = $result['male']->num_rows;

// Query to get total female residents
$query['female'] = "SELECT * FROM residents WHERE sex = 'female' AND is_deceased = 'no'";
$result['female'] = $conn->query($query['female']);
$results['female'] = $result['female']->num_rows;

// Query to get total voters
$query['total_voters'] = "SELECT * FROM residents WHERE is_voter = 'yes' AND is_deceased = 'no'";
$result['total_voters'] = $conn->query($query['total_voters']);
$results['total_voters'] = $result['total_voters']->num_rows;
?>
