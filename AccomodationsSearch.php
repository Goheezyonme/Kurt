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
                    <span class="user-welcome">You are browsing as a guest. <a href="testSignin.html">Sign in</a> for more features!</span>
                <?php endif; ?>
            </div>
        </div>
    </nav>
	
	<header class="hero-accomodations">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Find a place to stay!</h1>
            <p style="font-family:Montserrat">Search for a temporary home!</p>
        </div>
    </header>
	
	<div class="nav-links">
        <a href="category-select-PHP.php" class="cta-button"><< Categories</a>
    </div>
	<h2>Search Accommodations</h2>

	<div class="search-form">
	<form class="registration-form" action="AccomodationSearchResults.php" method="post">

            <label>City</label>
            <?php citiesSelect("accomodation-city"); ?>                                        

            <label>Minimum Number of Rooms</label>
            <?php
            $sql="SELECT round(max(num_rooms)*1.5,-2) as amount FROM `accommodations` where is_valid=1;";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);
            $temp_rooms = 0;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $temp_rooms= $row["amount"];
                }
            } 

            ?>
            <!--<input id="accomodation-rooms"  name="accomodation-rooms" type="number" min=0 required>-->
            <input type="range" id="accomodation-rooms" name="accomodation-rooms" min="0" max="<?php echo $temp_rooms ?>" value="0" oninput="this.nextElementSibling.value=this.value" style="width:70%">
            <output>0</output>
            <br>
            <br>
            <button id="accomodation-submit" type="submit" class="btn full-width">Submit</button>
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
                    <option value="-1">All</option>
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