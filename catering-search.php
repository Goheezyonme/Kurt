<?php
include 'connection-php.php';

function generateSelectFromSql($sql,$servername,$username,$password,$db){
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //echo $sql."<br>";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
session_start();

// Check if the user is logged in
$is_logged_in = isset($_SESSION["user_id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISO Talent | Discover Premium Event Venues</title>
    <link rel="stylesheet" href="searchPage-CSS.css">
    <script src="search-script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-links">
                <a href="Landing page.html" class="logo">Home</a>
                <a href="about.php">About Us</a>
                <?php if ($is_logged_in): ?>
                    <a href="registration-PHP.php" class="cta-button">Promote Yourself</a>
                <?php endif; ?>
                <a href="category-select-PHP.php">Search</a>

                <?php if ($is_logged_in): ?>
					<br>
                    <span class="user-welcome">Welcome, <?php echo htmlspecialchars($_SESSION["email"]); ?>!</span>
                    <a href="logout.php" class="cta-button">Log Out</a>
                <?php else: ?>
					<br>
                    <span class="user-welcome">You are browsing as a guest. <a href="signin.html">Sign in</a> for more features!</span>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <header class="hero-catering">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Explore caterers</h1>
            <p style="font-family:Montserrat">Find the perfect catering service for your special moments!</p>
        </div>
    </header>

    <div class="nav-links">
        <a href="category-select-PHP.php" class="cta-button"><< Categories</a>
    </div>

    <h2>Search Catering Services</h2>
	<div class="search-form">
	<form class="registration-form" action="cateringSearchResults.php" method="post">
			
            <label>City</label>
            <?php citiesSelect("catering-city", $servername, $username, $password, $dbname); ?>
			
            <label>Food tag 1</label>
            <?php CateringFoodsSelect("catering-food1", $servername, $username, $password, $dbname)?>
            
            <label>Food tag 2</label>
            <?php CateringFoodsSelect("catering-food2", $servername, $username, $password, $dbname)?>
			
            <label>Food tag 3</label>
            <?php CateringFoodsSelect("catering-food3", $servername, $username, $password, $dbname)?>
			<br><br>

            <button type="submit" class="btn full-width">Submit</button>
        </form>
	</div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
<?php
function CateringFoodsSelect($name, $servername, $username, $password, $dbname) {
    ?>
    <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-select">
        <?php
        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch all entries from the foodtruck_foods table
        $sql = "SELECT type FROM `catering_foods` ORDER BY type ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each row as an option in the dropdown
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($row["type"]) . "'>" . htmlspecialchars($row["type"]) . "</option>";
            }
        } else {
            echo "<option disabled>No food options available</option>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </select>
    <?php
}

function citiesSelect($name, $servername, $username, $password, $dbname) {
    ?>
    <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-select">
        <?php
        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch all entries from the service_areas table
        $sql = "SELECT area_name FROM `service_areas` WHERE is_valid = 1 ORDER BY ID ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each row as an option in the dropdown
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($row["area_name"]) . "'>" . htmlspecialchars($row["area_name"]) . "</option>";
            }
        } else {
            echo "<option disabled>No service areas available</option>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </select>
    <?php
}
?>
