<?php
include 'connection-php.php';

$musician="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);
    //die();

    $musician_city = htmlspecialchars($_POST['musician_city']);
    if (empty($musician_city)) {
    echo "musician_city is empty";
    } /*else {
    echo $musician_city."\n";
    }*/
	
	$musician_rate = htmlspecialchars($_POST['musician_rate']);
    if (empty($musician_rate)) {
    echo "musician_rate is empty";
    } /*else {
    echo $musician_rate."\n";
    }*/

    $musician_genre1 = htmlspecialchars($_POST['musician_genre1']);
    if (empty($musician_genre1)) {
    echo "musician_genre1 is empty";
    } /*else {
    echo $musician_genre1."\n";
    }*/

    $musician_genre2 = htmlspecialchars($_POST['musician_genre2']);
    if (empty($musician_genre2)) {
    echo "musician_genre2 is empty";
    } /*else {
    echo $musician_genre2."\n";
    }*/

    $musician_genre3 = htmlspecialchars($_POST['musician_genre3']);
    if (empty($musician_genre3)) {
    echo "musician_genre3 is empty";
    } /*else {
    echo $musician_sgenre3."\n";
    }*/
	
	$sql = "SELECT DISTINCT m.* " .
    "FROM musicians m " .
    "JOIN musician_areas ma ON ma.id_musician = m.id " .
    "JOIN service_areas sa ON sa.ID = ma.id_area " .
    "JOIN musician_genre mg ON mg.id IN (m.genre1, m.genre2, m.genre3) " .  // Matching IDs
    "WHERE sa.area_name = '". $musician_city . "' AND " .
    "mg.id IN ('". $musician_genre1 . "', '". $musician_genre2 . "', '". $musician_genre3 . "') AND " .
    "m.is_valid = 1 AND m.rate <=" . $musician_rate . ";";





    
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
                    <span class="user-welcome">You are browsing as a guest. <a href="testSignin.html">Sign in</a> for more features!</span>
                <?php endif; ?>
            </div>
        </div>
    </nav>
	<div class="nav-links">
        <a href="musicians-search.php" class="cta-button" style="font-family: Monsterrat"><< Search Again</a>
    </div>
    <h1 style="text-align: center; font-family:Monterrat;">Results</h1>
            <?php
            // Check if results exist
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
					$conn_genres = new mysqli($servername, $username, $password, $dbname);
					if ($conn_genres->connect_error) {
						die("Connection failed: " . $conn_genres->connect_error);
					}
					
                    echo "<div class='result'>";
					if($is_logged_in){
						echo "<h1>" . $row["name"] . "</h1>";
						echo "<h3>Phone: ". $row["phone"]. "</h3>";
						echo "<h3>Email: ". $row["email"]. "</h3>";
						echo "<h3>Website: <a href='". $row["web"]. "'>". $row["web"]. "</a></h3>";
					}else{
						echo "<h1>Result</h1>";
					}
					echo"<h3>Genres</h3>";
					$genre1_query = "SELECT genre FROM musician_genre WHERE ID = " . $row["genre1"];
					$genre1_result = $conn_genres->query($genre1_query);
					if ($genre1_result->num_rows > 0) {
						$genre1_row = $genre1_result->fetch_assoc();
						echo htmlspecialchars($genre1_row["genre"]) . "</p>";
					}
					$genre2_query = "SELECT genre FROM musician_genre WHERE ID = " . $row["genre2"];
					$genre2_result = $conn_genres->query($genre2_query);
					if ($genre2_result->num_rows > 0) {
						$genre2_row = $genre2_result->fetch_assoc();
						echo htmlspecialchars($genre2_row["genre"]) . "</p>";
					}
					$genre3_query = "SELECT genre FROM musician_genre WHERE ID = " . $row["genre3"];
					$genre3_result = $conn_genres->query($genre3_query);
					if ($genre3_result->num_rows > 0) {
						$genre3_row = $genre3_result->fetch_assoc();
						echo htmlspecialchars($genre3_row["genre"]) . "</p>";
					}
					echo "<p> ". $row["description"]. "</p>";
					echo "<h3>Hourly Rate: $". $row["rate"]. "</h3>";
					echo "<img src='". $row["photo1"]. "' alt='Photo 1'>";
					echo "<img src='". $row["photo2"]. "' alt='Photo 1'>";
					echo "<img src='". $row["photo3"]. "' alt='Photo 1'>";
                    echo "</div>";
                }
            } else {
                echo "<h3 style='text-align: center'>No Results found</h3>";
				echo "</div>";
            }
            ?>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>
	
</body>
</html>