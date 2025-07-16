<?php
	if (isset($_SESSION['role'])) {

		$query = [];
		$result = [];
		$query['officials'] = "SELECT 
			O.id AS id,
			O.resident_id AS resident_id,
			O.position_id AS position_id,
			O.chairmanship_id AS chairmanship_id,
			O.status AS status,
			C.title AS chairmanship,
			O.term_id AS term,
			OT.start_term AS start_term,
			OT.end_term AS end_term,
			P.position AS position,
			O.created_at AS created_at,
			O.updated_at AS updated_at
			FROM `officials` AS O
			INNER JOIN chairmanship AS C ON O.chairmanship_id = C.id
			INNER JOIN position AS P ON O.position_id = P.id
			INNER JOIN official_term AS OT ON O.term_id = OT.id";

		$result['officials'] = $conn->query($query['officials']);

		$official = [];
		while ($row = $result['officials']->fetch_assoc()) {
			array_push($official, $row);
		}

		$query['official_term'] = "SELECT * FROM `official_term`";
		$result['official_term'] = $conn->query($query['official_term']);
		$term = [];
		while ($row = $result['official_term']->fetch_assoc()) {
			array_push($term, $row);
		}

		$query['chairmanship'] = "SELECT * FROM `chairmanship`";
		$result['chairmanship'] = $conn->query($query['chairmanship']);
		$chairmanship = [];
		while ($row = $result['chairmanship']->fetch_assoc()) {
			array_push($chairmanship, $row);
		}

		$query['position'] = "SELECT * FROM `position`";
		$result['position'] = $conn->query($query['position']);
		$position = [];
		while ($row = $result['position']->fetch_assoc()) {
			array_push($position, $row);
		}

		$query['residents'] = "SELECT * FROM `residents` ORDER BY `lastname`";
		$result['residents'] = $conn->query($query['residents']);
		$residents = [];
		
		while ($row = $result['residents']->fetch_assoc()) {
			array_push($residents, $row);
		}
	}
?>