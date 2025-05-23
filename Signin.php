<?php
session_start();

$host = "localhost";
$user = "root";  
$pass = "mysql"; 
$dbname = "user_signups"; 

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION["user_id"])) {
    header("Location: category-select-PHP.php");
    exit();
}

function getUserByEmail($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result();
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $result = getUserByEmail($conn, $email);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["full_name"] = $user["full_name"];

            header("Location: category-select-HTML.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with this email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style_sign.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-links">
                <a href="Landing page.html" class="logo">Home</a>
            </div>
        </div>
    </nav>

    <div class="form-container">
        <h1 class="form-title">Sign In</h1>
        <p class="form-description">Welcome back! Please log in.</p>

        <?php if (!empty($error)): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form class="registration-form" method="POST">
			<label>Email</label>
			<input type="email" name="email" required>

			<label>Password</label>
			<input type="password" name="password" required>

			<button type="submit" name="signin" class="btn full-width">Sign In</button>
		</form>

        <p class="center-text">Don't have an account? <a href="signup.html">Sign up</a></p>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>
</body>
</html>
