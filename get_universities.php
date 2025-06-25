<?php
include "connection.php";
$country_id = $_GET['country_id'] ?? '';
$data = [];

if (!empty($country_id)) {
    $res = mysqli_query($conn, "SELECT id, university_name FROM university WHERE country_id = '$country_id' ORDER BY university_name ASC");
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
