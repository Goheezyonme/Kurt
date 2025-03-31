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

    <header class="hero-transport">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Find a way to get around!</h1>
            <p>Search for your preferred means of transportation around the beautiful Okanagan!</p>
        </div>
    </header>

    <div class="nav-links">
        <a href="category-select-PHP.php" class="cta-button"><< Categories</a>
    </div>

	<h2>Search Transportation</h2>
	<div class="search-form">
	<form class="registration-form" action="TransportationSearchResults.php" method="post">
            
            <label>City</label>
            <?php citiesSelect("transport-city"); ?><!--                                                            -->

            <label >Area of Operation</label>
            <?php serviceAreas("transport-service_area",$servername,$username,$password,$dbname);?>

            <label>Vehicle Capacity</label>
            <input id="transport-capacity" name="transport-capacity" type="number" min=0 required>
			
			<label>Wheelchair Accessible?</label>
			<div class="radio-group">
				<div class="radio-item">
					<input type="radio" id="wheelchair-yes" name="wheelchair-access" value="yes" required>
					<label for="wheelchair-yes" style="margin: 0;">Yes</label>
				</div>
			<div class="radio-item">
				<input type="radio" id="wheelchair-no" name="wheelchair-access" value="no" required>
				<label for="wheelchair-no" style="margin: 0;">No</label>
			</div>
		</div>
		
            <button id="transport-submit" type="submit" class="btn full-width">Submit</button>
        </form>
		</div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
<?php
function  citiesSelect($name){
    ?>
                <select name="<?php echo $name; ?>" id="<?php echo $name; ?>"  class="form-select" >
                    <option value="Kelowna, B.C.">Kelowna, B.C.</option>
                    <option value="Oliver, B.C.">Oliver, B.C.</option>
                    <option value="Osoyoos, B.C.">Osoyoos, B.C.</option>
                    <option value="Penticton, B.C.">Penticton, B.C.</option>
                    <option value="Vernon, B.C.">Vernon, B.C.</option>
                    <option value="West Kelowna, B.C.">West Kelowna, B.C.</option>
                    <option value="Summerland, B.C.">Summerland, B.C.</option>
                </select>
    <?php
    }

function serviceAreas ($name,$servername,$username,$password,$dbname){
?>

            <select name="<?php echo $name; ?>[]" id="<?php echo $name; ?>"  class="form-select" multiple="multiple">
                <?php
                $sql="SELECT ID, area_name FROM `service_areas` where is_valid=1 order by ID asc";
                $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["ID"]."'>".$row["area_name"]."</option>\n";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </select>
            <?php
}?>
