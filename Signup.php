<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "user_signups";

$conn = getDatabaseConnection($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $result = insertUser($conn, $fullName, $email, $password);

    echo $result ? "Sign-Up Successful!" : "Error: Could not insert user.";
}
function getDatabaseConnection($servername, $username, $password, $dbname) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function insertUser($conn, $fullName, $email, $password) {
    $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        return false;
    }
    $stmt->bind_param("sss", $fullName, $email, $password);
    return $stmt->execute();
}

function getUserCount($conn) {
    $result = $conn->query("SELECT COUNT(*) as count FROM users");
    $row = $result->fetch_assoc();
    return $row['count'];
}

$conn->close();
?>
