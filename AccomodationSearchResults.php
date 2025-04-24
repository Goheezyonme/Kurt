<?php
include 'connection-php.php';


$accomodation="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	
	$accomodation_city = htmlspecialchars($_POST['accomodation-city']);
    if (empty($accomodation_city)) {
    echo "accomodation_city is empty";
    } /*else {
    echo $accomodation_city."\n";
    }*/

    
    $accomodation_rooms = htmlspecialchars($_POST['accomodation-rooms']);
   

    $sql="SELECT * FROM `accommodations` WHERE ".
	"city = '". $accomodation_city . "' AND ".
	"num_rooms >= '". $accomodation_rooms. "' AND ".
	"is_valid = 1;";

    
    //echo $sql;
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
        <a href="AccomodationsSearch.php" class="cta-button" style="font-family: Monsterrat"><< Search Again</a>
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
					echo "<h3>Number of Rooms: ". $row["num_rooms"]. "</h3>";
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