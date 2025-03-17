<?php
session_start();

$host = "localhost";
$user = "root";  
$pass = ""; 
$dbname = "user_signups"; 

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            header("Location: category-select-HTML.html"); 
            exit();
        } else {
            echo "<p style='color:red; text-align:center;'>Invalid password.</p>";
        }
    } else {
        echo "<p style='color:red; text-align:center;'>No user found with this email.</p>";
    }
    $stmt->close();
}
$conn->close();
?>
