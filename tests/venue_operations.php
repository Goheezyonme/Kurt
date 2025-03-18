<?php
$mysqli = new mysqli("localhost", "root", "mysql", "isotalent");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function getVenueCount($mysqli) {
    $result = $mysqli->query("SELECT COUNT(*) AS count FROM venues");
    $row = $result->fetch_assoc();
    return $row['count'];
}
?>
