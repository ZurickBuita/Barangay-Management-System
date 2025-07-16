<?php
	$query = "SELECT * FROM chairmanship";
	$result = $conn->query($query);

	$chair = [];
	while ($row = $result->fetch_assoc()) {
		array_push($chair, $row);
	}
?>