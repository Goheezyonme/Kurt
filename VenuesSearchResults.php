<?php
include 'connection-php.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);
    //echo "<br>";

	$venue_city = htmlspecialchars($_POST['venue-city']);
    if (empty($venue_city)) {
    echo "venue_city is empty";
    } /*else {
    echo $venue_city."\n";
    }*/

    $venue_bathrooms = htmlspecialchars($_POST['venue-bathrooms']);
    if (empty($venue_bathrooms)) {
    $venue_bathrooms = 0;
    } /*else {
    echo $venue_bathrooms."\n";
    }*/

    $venue_capacity = htmlspecialchars($_POST['venue-capacity']);
    if (empty($venue_capacity)) {
    $venue_capacity = 0;
    } /*else {
    echo $venue_capacity."\n";
    }*/

    $venue_parking = htmlspecialchars($_POST['venue-parking']);
    if (empty($venue_parking)) {
    $venue_parking = 0;
    } /*else {
    echo $venue_parking."\n";
    }*/

    $liquor_license = htmlspecialchars($_POST['liquor-license']);
    if (empty($liquor_license)) {
    echo "liquor_license is empty";
    } /*else {
    echo $liquor_license."\n";
    }*/

    $kitchen = htmlspecialchars($_POST['kitchen']);
    if (empty($kitchen)) {
    echo "kitchen is empty";
    } /*else {
    echo $kitchen."\n";
    }*/
    

    $sql="SELECT * FROM`venues`WHERE ".
    "city = '". $venue_city . "' AND ".
	"bathrooms_available >= '". $venue_bathrooms . "' AND ".
	"maximum_capacity >= '". $venue_capacity . "' AND ".
	"parking_available >= '". $venue_parking . "' AND ".
	"(liquor_license = ". (($liquor_license == 'yes') ? 1 : 0). " OR liquor_license = 1) AND ".
	"(kitchen_available = ". (($kitchen == 'yes') ? 1 : 0). " OR kitchen_available = 1) AND ".
	"is_valid = 1;";

    
    //echo "<br>".$sql;
    //die();

    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //echo $sql."<br>";
    $result = $conn->query($sql);
    $conn->close();

    
  }
?>

<?php
session_start();

// Check if the user is logged in
$is_logged_in = isset($_SESSION["user_id"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISO Talent | Discover Premium Event Venues</title>
    <link rel="stylesheet" href="SearchResults-CSS.css">
    <script src="category-select-script.js"></script>
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
	<div class="nav-links">
        <a href="VenuesSearch.php" class="cta-button" style="font-family: Monsterrat"><< Search Again</a>
    </div>
    <h1 style="text-align: center; font-family:Monterrat;">Results</h1>
            <?php
            // Check if results exist
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='result'>";
                    echo "<h1>" . $row["name"] . "</h1>";
					echo "<h3>Address: ". $row["address"]. "</h3>";
					echo "<h3>Bathrooms Available: ". $row["bathrooms_available"]. "</h3>";
					echo "<h3>Parking Available: ". $row["parking_available"]. "</h3>";
					echo "<h3>Available Kitchen? ". (($row["kitchen_available"] == 1) ? "Yes" : "No");
					echo "<h3>Liquor License? ". (($row["liquor_license"] == 1) ? "Yes" : "No");
					echo "<h3>Phone: ". $row["phone"]. "</h3>";
					echo "<h3>Email: ". $row["email"]. "</h3>";
					echo "<h3>Website: <a href='". $row["web"]. "'>". $row["web"]. "</a></h3>";
					echo "<p> ". $row["description"]. "</p>";
					echo "<img src='". $row["photo1"]. "' alt='Photo 1'>";
					echo "<img src='". $row["photo2"]. "' alt='Photo 1'>";
					echo "<img src='". $row["photo3"]. "' alt='Photo 1'>";
                    echo "</div>";
                }
            } else {
                echo "<h3 style='text-align: center'>No Results found</h3>";
            }
            ?>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>
	
</body>
</html>