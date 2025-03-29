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

    <header class="hero-venues">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Find somewhere that's fun for all!</h1>
            <p>Find the perfect venue to host your dream events!</p>
        </div>
    </header>

    <div class="nav-links">
        <a href="category-select-PHP.php" class="cta-button"><< Categories</a>
    </div>
	<h2>Search Venues</h2>
	<div class="search-form">
    <form action="VenuesSearchResults.php" method="post">
			<label style="margin:0">City</label>
            <?php citiesSelect("venue-city"); ?>
            
            <label>Number of Bathrooms</label>
            <input id="venue-bathrooms" name="venue-bathrooms"  type="number" min=0 required>
			
			<label>Maximum capacity</label>
            <input id="venue-capacity" name="venue-capacity"  type="number" min=0 required>
			
			<label>Parking spots</label>
            <input id="venue-parking" name="venue-parking"  type="number" min=0 required>
			
			<label>Liquor License?</label>
			<div class="radio-group">
				<div class="radio-item">
					<input type="radio" id="liquor-yes" name="liquor-license" value="yes" required>
					<label for="liquor-yes" style="margin: 0;">Yes</label>
				</div>
			<div class="radio-item">
				<input type="radio" id="liquor-no" name="liquor-license" value="no" required>
				<label for="liquor-no" style="margin: 0;">No</label>
			</div>
		</div>
		
			<label>Kitchen?</label>
			<div class="radio-group">
				<div class="radio-item">
					<input type="radio" id="kitchen-yes" name="kitchen" value="yes" required>
					<label for="kitchen-yes" style="margin: 0;">Yes</label>
				</div>
			<div class="radio-item">
				<input type="radio" id="kitchen-no" name="kitchen" value="no" required>
				<label for="kitchen-no" style="margin: 0;">No</label>
			</div>
		</div>

            <button id="venue-submit" type="submit" class="btn full-width">Submit</button>
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
?>
