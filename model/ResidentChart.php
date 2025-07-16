<?php
	include '../server/Database.php';
	$query = "SELECT
    DATE_FORMAT(created_at, '%M-%Y') AS month,
    (
        SELECT COUNT(*)
        FROM residents r2
        WHERE r2.created_at <= r1.created_at
    ) AS total_resident
FROM (
    SELECT MIN(created_at) AS created_at
    FROM residents
    GROUP BY DATE_FORMAT(created_at, '%Y-%m')
) r1
ORDER BY r1.created_at ASC";

	$result = $conn->query($query);

	$data = [];
	while ($row = $result->fetch_assoc()) {
		array_push($data, $row);
	}

	echo json_encode($data);
?>