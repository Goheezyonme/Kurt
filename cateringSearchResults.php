<?php
include 'connection-php.php';

$catering="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r($_POST);
    //die();


    $catering_city = htmlspecialchars($_POST['catering-city']);
    if (empty($catering_city)) {
    echo "catering_city is empty";
    } /*else {
    echo $catering_city."\n";
    }*/

    $catering_food1 = htmlspecialchars($_POST['catering-food1']);
    if (empty($catering_food1)) {
    echo "catering_food1 is empty";
    } /*else {
    echo $catering_food1."\n";
    }*/

    $catering_food2 = htmlspecialchars($_POST['catering-food2']);
    if (empty($catering_food2)) {
    echo "catering_food2 is empty";
    } /*else {
    echo $catering_food2."\n";
    }*/

    $catering_food3 = htmlspecialchars($_POST['catering-food3']);
    if (empty($catering_food3)) {
    echo "catering_food3 is empty";
    } /*else {
    echo $catering_food3."\n";
    }*/

	
	$sql = "SELECT DISTINCT c.* " .
    "FROM catering c " .
    "JOIN catering_area ca ON ca.id_catering = c.id " .
    "JOIN service_areas sa ON sa.ID = ca.id_area " .
    "JOIN catering_foods cf ON cf.ID IN (food1, food2, food3) " .
    "WHERE sa.area_name = '". $catering_city . "' AND " .
    "cf.type IN ('". $catering_food1 . "', '". $catering_food2 . "', '". $catering_food3 . "') AND
	c.is_valid = 1;";

    $sql=" select c.*,c2.ind3x, ca.id_area \n" .
    " FROM \n" .
    " catering c JOIN \n" .
    " ( \n" .
    " select c1.ID,c1.name,c1.food1,c1.food2,c1.food3,sum(ind3x) as ind3x \n" .
    " FROM( \n" .
    " select c.ID, c.name,c.food1,c.food2,c.food3,cf.id as foodId, 4 as ind3x \n" .
    " from catering c join (select c.ID from catering_foods c where (c.ID in (".$catering_food1.",".$catering_food2.",".$catering_food3.") or -1 in (".$catering_food1.",".$catering_food2.",".$catering_food3.")) and is_valid=1) as cf on c.food1 = cf.id \n" .
    " UNION \n" .
    " select c.ID, c.name,c.food1,c.food2,c.food3,cf.id as foodId, 2 as ind3x \n" .
    " from catering c join (select c.ID from catering_foods c where (c.ID in (".$catering_food1.",".$catering_food2.",".$catering_food3.") or -1 in (".$catering_food1.",".$catering_food2.",".$catering_food3.")) and is_valid=1) as cf on c.food2 = cf.id \n" .
    " UNION \n" .
    " select c.ID, c.name,c.food1,c.food2,c.food3,cf.id as foodId, 1 as ind3x \n" .
    " from catering c join (select c.ID from catering_foods c where (c.ID in (".$catering_food1.",".$catering_food2.",".$catering_food3.") or -1 in (".$catering_food1.",".$catering_food2.",".$catering_food3.")) and is_valid=1) as cf on c.food3 = cf.id) as c1 \n" .
    " group by c1.ID,c1.name,c1.food1,c1.food2,c1.food3 \n" .
    " ) as c2 on c.ID = c2.ID JOIN \n" .
    " catering_area ca on c.ID= ca.id_catering \n" .
    " where (ca.id_area=". $catering_city . " or -1=". $catering_city . ") and c.is_valid=1  \n" .
    " order by c2.ind3x desc, c.name ASC; \n" .
    "  \n";


    
    //echo "<br>".str_replace("\n","<br>",$sql)."<br>";
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
        <a href="catering-search.php" class="cta-button" style="font-family: Monsterrat"><< Search Again</a>
    </div>
    <h1 style="text-align: center; font-family:Monterrat;">Results</h1>
            <?php
            // Check if results exist
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
					$conn_foods = new mysqli($servername, $username, $password, $dbname);
					if ($conn_foods->connect_error) {
						die("Connection failed: " . $conn_foods->connect_error);
					}
					
                    echo "<div class='result'>";
                    echo "<h1>" . $row["name"] . "</h1>";
					echo "<h3>Phone: ". $row["phone"]. "</h3>";
					echo "<h3>Email: ". $row["email"]. "</h3>";
					echo "<h3>Website: <a href='". $row["web"]. "'>". $row["web"]. "</a></h3>";
					echo"<h3>Foods</h3>";
					$food1_query = "SELECT type FROM catering_foods WHERE ID = " . $row["food1"];
					$food1_result = $conn_foods->query($food1_query);
					if ($food1_result->num_rows > 0) {
						$food1_row = $food1_result->fetch_assoc();
						echo htmlspecialchars($food1_row["type"]) . "</p>";
					}
					$food2_query = "SELECT type FROM catering_foods WHERE ID = " . $row["food2"];
					$food2_result = $conn_foods->query($food2_query);
					if ($food2_result->num_rows > 0) {
						$food2_row = $food2_result->fetch_assoc();
						echo htmlspecialchars($food2_row["type"]) . "</p>";
					}
					$food3_query = "SELECT type FROM catering_foods WHERE ID = " . $row["food3"];
					$food3_result = $conn_foods->query($food3_query);
					if ($food3_result->num_rows > 0) {
						$food3_row = $food3_result->fetch_assoc();
						echo htmlspecialchars($food3_row["type"]) . "</p>";
					}
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