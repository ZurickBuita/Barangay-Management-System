<?php
	$query = [];
	$result = [];

	$query['residents'] = "SELECT R.*, purok.name AS purok FROM `residents` AS R
			INNER JOIN purok ON R.purok_id = purok.id";
	$result['residents'] = $conn->query($query['residents']);

	$resident = [];
	while ($row = $result['residents']->fetch_assoc()) {
		array_push($resident, $row);
	}

	$query['purok'] = "SELECT * FROM `purok`";
	$result['purok'] = $conn->query($query['purok']);

	$purok = [];
	while ($row = $result['purok']->fetch_assoc()) {
		array_push($purok, $row);
	}
?>