<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "isota200_isotalent";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullName, $email, $password);

    if ($stmt->execute()) {
        // Start a session for the user
        $_SESSION["user_fullname"] = $fullName;
        $_SESSION["user_email"] = $email;

        // Redirect to the protected page
        header("category-select-php.php");
        exit();
    } else {
        echo "Error: Could not insert user.";
    }
}

$conn->close();
?>
