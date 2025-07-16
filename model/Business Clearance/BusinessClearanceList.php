<?php
	$query = "SELECT * FROM permit";
	$result = $conn->query($query);

	$rows = [];
	while($row = $result->fetch_assoc()) {
		array_push($rows, $row);
	}
?>