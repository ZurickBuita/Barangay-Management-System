<?php
	$query = "SELECT * FROM official_term";
	$result = $conn->query($query);

	$official_term = [];
	while ($row = $result->fetch_assoc()) {
		array_push($official_term, $row);
	}
?>