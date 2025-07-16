<?php
	include '../server/Database.php';
	$query = "SELECT details, SUM(amounts) AS total_amount FROM `payments` GROUP BY details";
	$result = $conn->query($query);

	$data = [];
	while ($row = $result->fetch_assoc()) {
		array_push($data, $row);
	}

	echo json_encode($data);
?>