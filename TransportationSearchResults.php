<?php
include 'connection-php.php';

$transport="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$transport_pickup = htmlspecialchars($_POST['transport-pickup']);
    if (empty($transport_pickup)) {
    echo "transport_pickup is empty";
    } /*else {
    echo $transport_city."\n";
    }*/
	
	$transport_dropoff = htmlspecialchars($_POST['transport-dropoff']);
    if (empty($transport_dropoff)) {
    echo "transport_dropoff is empty";
    } /*else {
    echo $transport_city."\n";
    }*/


    $transport_capacity = htmlspecialchars($_POST['transport-capacity']);
    if (empty($transport_capacity)) {
    echo "transport_capacity is empty";
    } /*else {
    echo $transport_capacity."\n";
    }*/

    $wheelchair_access = htmlspecialchars($_POST['wheelchair-access']);
    if (empty($wheelchair_access)) {
    echo "wheelchair_access is empty";
    } /*else {
    echo $wheelchair_access."\n";
    }*/


   $sql = "SELECT * " .
    "FROM transportations tr " .
    "JOIN transportation_area ta_pickup ON ta_pickup.id_transport = tr.ID " .
    "JOIN service_areas sa_pickup ON sa_pickup.ID = ta_pickup.id_area " .
    "JOIN transportation_area ta_dropoff ON ta_dropoff.id_transport = tr.ID " .
    "JOIN service_areas sa_dropoff ON sa_dropoff.ID = ta_dropoff.id_area " .
    "WHERE tr.vehicle_capacities >= '". $transport_capacity . "' AND " .
    "(tr.wheel_chair_accessible_vehicles = '". $wheelchair_access . "' OR " .
    "tr.wheel_chair_accessible_vehicles = 1) AND " .
    "tr.is_valid = 1 AND " .
    "sa_pickup.area_name = '". $transport_pickup . "' AND " .
    "sa_dropoff.area_name = '". $transport_dropoff . "';";




    //echo "<br>".$sql."<br>";
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
        <a href="TransportSearch.php" class="cta-button" style="font-family: Monsterrat"><< Search Again</a>
    </div>
    <h1 style="text-align: center; font-family:Monterrat;">Results</h1>
            <?php
            // Check if results exist
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='result'>";
                    echo "<h1>" . $row["name"] . "</h1>";
					echo "<h3>Maximum capacity: ". $row["vehicle_capacities"]. "</h3>";
					echo "<h3>Wheelchair Acess? ". (($row["wheel_chair_accessible_vehicles"] == 1) ? "Yes" : "No");
					echo "<h3>Phone: ". $row["phone"]. "</h3>";
					echo "<h3>Email: ". $row["email"]. "</h3>";
					echo "<h3>Website: <a href='". $row["web"]. "'>". $row["web"]. "</a></h3>";
					echo "<p> ". $row["description"]. "</p>";
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