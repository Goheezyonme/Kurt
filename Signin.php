<?php
session_start();

$host = "localhost";
$user = "root";  
$pass = "mysql"; 
$dbname = "user_signups"; 

function signInUser($conn, $email, $password) {
    $result = getUserByEmail($conn, $email);
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (verifyUserPassword($user, $password)) {
            return true; 
        }
    }
    return false; 
}


function getDatabaseConnection($host, $user, $pass, $dbname) {
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getUserByEmail($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result();
}

function verifyUserPassword($user, $password) {
    return password_verify($password, $user["password"]);
}

$conn = getDatabaseConnection($host, $user, $pass, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = getUserByEmail($conn, $email);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (verifyUserPassword($user, $password)) {
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
    $conn->close();
}
?>
