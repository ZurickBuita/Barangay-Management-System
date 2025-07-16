<?php
    include "../../server/Database.php";

   // Get all residents
    $query = "SELECT `national_id`, `citizenship`, `firstname`, `middlename`, `lastname`, `birthdate`, `age`, `civilstatus`, `sex`, `is_voter`, `email`, `occupation`, `address`, `is_deceased`, purok.name AS purok_id, `is_indigenous`, `salary` FROM `residents` 
INNER JOIN purok ON residents.purok_id = purok.id";

    if (!$result = $conn->query($query)) {
        exit($conn->error);
    }

    $resident = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          array_push($resident, $row);
        }
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=Residents.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('National Id', 'Citizenship', 'Firstname', 'Middlename', 'Lastname', 'Birthdate', 'Age', 'Civil Status', 'Sex', 'Voter', 'Email', 'Occupation', 'Address', 'Deceased', 'Purok', 'Indigenous', 'Salary'));

    if (count($resident) > 0) {
        foreach ($resident as $row) {
            fputcsv($output, $row);
        }
    }
    $conn->close();
?>