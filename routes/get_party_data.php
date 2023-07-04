<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "evms";
$connect = mysqli_connect($servername, $username, $password, $database);

$partyData = array();
$partyQuery = "SELECT 'party', COUNT(*) AS votes FROM party GROUP BY 'party'";

$partyResult = mysqli_query($connect, $partyQuery);

if (!$partyResult) {
    die("Query failed: " . mysqli_error($connect));
}

while ($row = mysqli_fetch_assoc($partyResult)) {
    $partyData[$row['party']] = $row['votes'];
}

header('Content-Type: application/json');
echo json_encode($partyData);
?>
