<?php
	$query = [];
	$result = [];
	$query['*'] = "SELECT * FROM blotter";
	$result['*'] = $conn->query($query['*']);

	$results = [];
	$blotter = [];
	while ($row = $result['*']->fetch_assoc()) {
		array_push($blotter, $row);
	}


	$query['active'] = "SELECT * FROM blotter WHERE `status`='Active'";
	$result['active'] = $conn->query($query['active']);
	$results['active_case'] = $result['active']->num_rows;

	$query['scheduled'] = "SELECT * FROM blotter WHERE `status`='Scheduled'";
	$result['scheduled'] = $conn->query($query['scheduled']);
	$results['scheduled_case'] = $result['scheduled']->num_rows;

	$query['settled'] = "SELECT * FROM blotter WHERE `status`='Settled'";
	$result['settled'] = $conn->query($query['settled']);
	$results['settled_case'] = $result['settled']->num_rows;
?>