<?php
	$query = "SELECT * FROM payments ORDER BY `created_at` DESC";
	$result = $conn->query($query);
	
	$revenue = [];
	while ($row = $result->fetch_assoc()) {
		array_push($revenue, $row);
	}
?>