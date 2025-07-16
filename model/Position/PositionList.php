<?php
	$query = "SELECT * FROM position ORDER BY `order`";
	$result = $conn->query($query);

	$positions = [];
	while ($row = $result->fetch_assoc()) {
	    array_push($positions, $row);
	}
?>