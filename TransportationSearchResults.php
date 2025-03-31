<?php
include 'connection-php.php';

$transport="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$transport_city = htmlspecialchars($_POST['transport-city']);
    if (empty($transport_city)) {
    echo "transport_city is empty";
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
    
    $transport_service_area = $_POST['transport-service_area'];
    if (empty($transport_service_area)) {
    echo "transport_service_area is empty";
    } /*else {
    print_r( $transport_service_area);
    }*/

    $sql="INSERT INTO `transportations`".
    " ( `name`, `logo`, `address`, ".
    " `city`, `postal_code`, `phone`, ".
    " `email`, `web`, `photo1`, `photo2`, ".
    " `photo3`, `description`, `review_stars`, ".
    " `review_desc`, `vehicle_capacities`, `wheel_chair_accessible_vehicles`) ".
    " VALUES ".
    " ('".$transport_name."','".$transport_logo."','".$transport_address."',".
    " '".$transport_city."','".$transport_postalCode."', '".$transport_phone."',".
    " '".$transport_email."','".$transport_website."',  '".$transport_pic1."','".$transport_pic2."',".
    " '".$transport_pic3."','".$transport_desc."','0',".
    " '','".$transport_capacity."','".(($wheelchair_access == 'yes') ? 1 : 0)."')";

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
    //we obtain the last id
    $last_id = $conn->insert_id;
    //echo "<br>".$last_id."<br>\n";

    $insert_sql="INSERT INTO `transportation_area`(`id_transport`, `id_area`) VALUES ";


    //iterate with array of areas to write the sql
    foreach($transport_service_area as $x => $y){
      $insert_sql.="('".$last_id."','".$y."'),";
    }

    $insert_sql=ltrim($insert_sql );
    $insert_sql=substr($insert_sql,0,strlen($insert_sql)-1);
    $insert_sql.=";";
    //echo $insert_sql."<br>";
    //die();
    $conn->query($insert_sql);

    //insertamos en tabla intermedia
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
    <h1 style="text-align: center; font-family:Monterrat;">Results</h1>
            <?php
            // Check if results exist
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='result'>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "</div>";
                }
            } else {
                echo "<tr><td colspan='4'>No results found</td></tr>";
            }
            ?>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>
	
</body>
</html>