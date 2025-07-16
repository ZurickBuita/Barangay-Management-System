<?php
	$query = "SELECT * FROM purok";
	$result = $conn->query($query);

	$purok = [];
	while($row = $result->fetch_assoc()) {
		array_push($purok, $row);
	}
?>