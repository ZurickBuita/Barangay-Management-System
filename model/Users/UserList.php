<?php
	$query = "SELECT * FROM users";
	$result = $conn->query($query);

	$users = [];
	while($row = $result->fetch_assoc()) {
		array_push($users, $row);
	}
?>