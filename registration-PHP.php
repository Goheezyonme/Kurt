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
    <title>Promote yourself</title>
    <link rel="stylesheet" href="registration-css.css">
	<script src="registration-script.js"></script>
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
	
<!-- venue -->
<div class="dropdown">
    <div class="dropdown-bar" onclick="toggleDropdownVenue()">
		Register as a Venue
		<span id="arrowVenue" class="arrow arrow-down">▼</span>
	</div>
    <div id="dropdownContentVenue" class="dropdown-content">
		<h1 class="form-title">Venue Registration</h1>
        <p class="form-description">Please input your information below to register your venue.</p>
        <form class="registration-form" action="venue-register.php" method="post">
            <label>Venue's Name</label>
            <input id="venue-name" name="venue-name" type="text" required>

            <label>Email</label>
            <input id="venue-email" name="venue-email" type="email" required>

            <label>Phone Number</label>
            <input id="venue-phone" name="venue-phone"  type="tel" required>

            <label>Web</label>
            <input id="venue-website" name="venue-website" type="url" required>

            <label>Address</label>
            <input id="venue-address" name="venue-address"  type="text" required>
            
            <label>City</label>
            <?php citiesSelect("venue-city"); ?><!--                                                            -->

            <label>Postal Code</label>
            <input id="venue-postal_code" name="venue-postal_code"  type="text" required>

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
		
		<label class="full-width">Description</label>
        <textarea id="venue-desc" name="venue-desc"  class="full-width" required></textarea>

		<label class="full-width">Logo</label>
        <input id="venue-logo" name="venue-logo"  type="url" placeholder="Paste img URL here" class="full-width" accept="image/*">

            <label class="full-width">Gallery</label>
            <input id="venue-pic1" name="venue-pic1"   placeholder="Paste img URL here"  type="url" class="full-width" accept="image/*">
            <input id="venue-pic2" name="venue-pic2"   placeholder="Paste img URL here" type="url" class="full-width" accept="image/*">
            <input id="venue-pic3" name="venue-pic3"   placeholder="Paste img URL here" type="url" class="full-width" accept="image/*">


            <button id="venue-submit" type="submit" class="btn full-width">Submit</button>
        </form>
    </div>
</div>
  
<!-- Entertainer -->
<div class="dropdown">
	<div class="dropdown-bar" onclick="toggleDropdownEntertainer()">
		Register as an Entertainer
		<span id="arrowEntertainer" class="arrow arrow-down">▼</span>
	</div>
    <div id="dropdownContentEntertainer" class="dropdown-content">
		<h1 class="form-title">Entertainer Registration</h1>
		<p class="form-description">Please input your information below to register.</p>
        <form class="registration-form" action="entertainer-register.php" method="post">
            <label>Name</label>
            <input type="text" id="entertainer-name" name="entertainer-name" required>

            <label>Email</label>
            <input id="entertainer-email" name="entertainer-email" type="email" required>

            <label>Phone Number</label>
            <input id="entertainer-phone" name="entertainer-phone"  type="tel" required>

            <label>Web</label>
            <input id="entertainer-website" name="entertainer-website" type="url" required>

            <label>Address</label>
            <input id="entertainer-address" name="entertainer-address"  type="text" required>
            
            <label>City</label>
            <?php citiesSelect("entertainer-city"); ?><!--                                                            -->

            <label>Postal Code</label>
            <input id="entertainer-postal_code" name="entertainer-postal_code"  type="text" required>


            <!--
            <label class="full-width">Entertainer Type</label>
            <div class="checkbox-group full-width">
                <input type="checkbox" id="musicBand">
                <label for="musicBand">Music Band</label>
                <input type="checkbox" id="performer">
                <label for="performer">Performer</label>
            </div>-->


            <label>Music tag 1</label>
            <select name="entertainer-genre1" id="entertainer-genre1"  class="form-select" >
            <?php
            $sql="SELECT ID , genre as type FROM `musician_genre` where is_valid=1 order by genre asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
            <label>Music tag 2</label>
            <select name="entertainer-genre2" id="entertainer-genre2"  class="form-select" >
            <?php
            $sql="SELECT ID , genre as type FROM `musician_genre` where is_valid=1 order by genre asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
            <label>Music tag 3</label>
            <select name="entertainer-genre3" id="entertainer-genre3"  class="form-select" >
            <?php
            $sql="SELECT ID , genre as type FROM `musician_genre` where is_valid=1 order by genre asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>


            <label >Area of Operation</label>
            <?php serviceAreas("entertainer-service_area",$servername,$username,$password,$dbname);?>
			
			<label>Hourly Rate</label>
            <input id="entertainer-rate" name="entertainer-rate"  type="number" min=0 required>

            <label class="full-width">Logo</label>
            <input id="entertainer-logo" name="entertainer-logo"  type="url" placeholder="Paste img URL here" class="full-width" accept="image/*">

            <label class="full-width">Gallery</label>
            <input type="url" placeholder="Paste img URL here" class="full-width"  id="entertainer-pic1" name="entertainer-pic1">
            <input type="url" placeholder="Paste img URL here"  class="full-width" id="entertainer-pic2" name="entertainer-pic2">
            <input type="url" placeholder="Paste img URL here"  class="full-width" id="entertainer-pic3" name="entertainer-pic3">

            <label class="full-width">Video Sample</label>
        
            <input type="url" placeholder="Paste video URL here" class="full-width" id="entertainer-video" name="entertainer-video" required>
<!--
            <label class="full-width">Audio Sample</label>
            <input type="file" class="full-width">
            <input type="text" placeholder="Paste audio URL here" class="full-width">
-->
            <label class="full-width">About</label>
            <textarea class="full-width" id="entertainer-description" name="entertainer-description" required></textarea>

            <button type="submit" class="btn full-width">Submit</button>
        </form>
    </div>
</div>

<!-- Food truck -->
<div class="dropdown">
	<div class="dropdown-bar" onclick="toggleDropdownFoodTruck()">
		Register as a Food Truck
		<span id="arrowFoodTruck" class="arrow arrow-down">▼</span>
	</div>
    <div id="dropdownContentFoodTruck" class="dropdown-content">
		<h1 class="form-title">Food Truck registration</h1>
		<p class="form-description">Please input your information below to register.</p>
        <form class="registration-form" action="foodtruck-register.php" method="post">
             <label>Food truck Name</label>
            <input id="foodtruck-name"  name="foodtruck-name" type="text" required>

            <label>Email</label>
            <input id="foodtruck-email"  name="foodtruck-email" type="email" required>

            <label>Web Site</label>
            <input id="foodtruck-web"  name="foodtruck-web" type="url" required>

            <label>Phone Number</label>
            <input id="foodtruck-phone" name="foodtruck-phone"  type="tel" required>

            <label>Address</label>
            <input id="foodtruck-address" name="foodtruck-address"  type="text" required>
            
            <label>City</label>
            <?php citiesSelect("foodtruck-city"); ?><!--                                                            -->

            <label>Postal Code</label>
            <input id="foodtruck-postal_code" name="foodtruck-postal_code"  type="text" required>


            <!--<label>Location</label>
            <input id="foodtruck-location"  name="foodtruck-location" type="text" required>-->
            
            <label>Food tag 1</label>
            <select name="foodtruck-food1" id="foodtruck-food1"  class="form-select" >
            <?php
            $sql="SELECT ID,type FROM `foodtruck_foods` order by type asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
            <label>Food tag 2</label>
            <select name="foodtruck-food2" id="foodtruck-food2"  class="form-select" >
            <?php
            $sql="SELECT ID,type FROM `foodtruck_foods`  order by type asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
            <label>Food tag 3</label>
            <select name="foodtruck-food3" id="foodtruck-food3"  class="form-select" >
            <?php
            $sql="SELECT ID,type FROM `foodtruck_foods`  order by type asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>

            <label >Area of Operation</label>
            <?php serviceAreas("foodtruck-service_area",$servername,$username,$password,$dbname);?>
			
            <label class="full-width">Description</label>
            <textarea id="foodtruck-desc"  name="foodtruck-desc" class="full-width" required></textarea>

            <label class="full-width">Logo</label>
            <input id="foodtruck-logo"  name="foodtruck-logo"  placeholder="Paste img URL here"  type="url" class="full-width" accept="image/*">

            <label class="full-width">Gallery</label>
            <input id="foodtruck-pic1"  name="foodtruck-pic1" type="url" class="full-width"  placeholder="Paste img URL here"  accept="image/*">
            <input id="foodtruck-pic2" name="foodtruck-pic2" type="url" class="full-width"  placeholder="Paste img URL here"  accept="image/*">
            <input id="foodtruck-pic3" name="foodtruck-pic3" type="url" class="full-width"  placeholder="Paste img URL here"  accept="image/*">

            <button id="foodtruck-submit" type="submit" class="btn full-width">Submit</button>
        </form>
    </div>
</div>

<!-- Catering -->
<div class="dropdown">
	<div class="dropdown-bar" onclick="toggleDropdownCatering()">
		Register as a Catering Service
		<span id="arrowCatering" class="arrow arrow-down">▼</span>
	</div>
    <div id="dropdownContentCatering" class="dropdown-content">
		<h1 class="form-title">Catering Service registration</h1>
		<p class="form-description">Please input your information below to register.</p>
        <form class="registration-form" action="catering-register.php" method="post">
            <label>Name</label>
            <input type="text" id="catering-name" name="catering-name" required>
			<!--			<label>Representative's Name</label>
			<input type="text">-->
			
            <label>Phone</label>
            <input type="tel" id="catering-phone" name="catering-phone" required>
            <label>Email</label>
            <input type="email" id="catering-email" name="catering-email" required>
            <label>Address</label>
            <input id="catering-address" name="catering-address"  type="text" required>
            <label>City</label>
            <?php citiesSelect("catering-city"); ?>
            <label>Postal Code</label>
            <input id="catering-postal_code" name="catering-postal_code"  type="text" required>
            <label >Web Site</label>
            <input id="catering-web"  name="catering-web" type="url"  >
            <label >Area of Operation</label>
            <?php serviceAreas("catering-service_area",$servername,$username,$password,$dbname);?>
            <label>Food tag 1</label>
            <select name="catering-food1" id="catering-food1"  class="form-select" >
            <?php
            $sql="SELECT ID,type FROM `catering_foods` where is_valid=1 order by type asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
            <label>Food tag 2</label>
            <select name="catering-food2" id="catering-food2"  class="form-select" >
            <?php



            $sql="SELECT ID,type FROM `catering_foods`  order by type asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
            <label>Food tag 3</label>
            <select name="catering-food3" id="catering-food3"  class="form-select" >
            <?php



            $sql="SELECT ID,type FROM `catering_foods`  order by type asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>

            <label class="full-width">Logo</label>
            <input id="catering-logo"  name="catering-logo" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >
            
            <label class="full-width">Gallery</label>
            <input type="url" class="full-width" id="catering-pic1" name="catering-pic1" placeholder="Paste img URL here" >
            <input type="url" class="full-width" id="catering-pic2" name="catering-pic2" placeholder="Paste img URL here" >
            <input type="url" class="full-width" id="catering-pic3" name="catering-pic3" placeholder="Paste img URL here" >

            <label class="full-width">About</label>
            <textarea class="full-width" id="catering-desc"  name="catering-desc" required></textarea>

            <button type="submit" class="btn full-width">Submit</button>
        </form>
    </div>
</div>

<!-- Transportation -->
<div class="dropdown">
	<div class="dropdown-bar" onclick="toggleDropdownTransportation()">
		Register as a Transportation Service
		<span id="arrowTransportation" class="arrow arrow-down">▼</span>
	</div>
    <div id="dropdownContentTransportation" class="dropdown-content">
		<h1 class="form-title">Transportation Service registration</h1>
		<p class="form-description">Please input your information below to register.</p>
        <form class="registration-form" action="transportation-register.php" method="post">
            <label>Company Name</label>
            <input id="transport-name" name="transport-name" type="text" required>

            <label>Email</label>
            <input id="transport-email"  name="transport-email" type="email" required>

            <label >Web Site</label>
            <input id="transport-web"  name="transport-web" type="url"  >

            <label>Phone Number</label>
            <input id="transport-phone" name="transport-phone" type="tel" required>

            <label>Address</label>
            <input id="transport-address" name="transport-address"  type="text" required>
            
            <label>City</label>
            <?php citiesSelect("transport-city"); ?><!--                                                            -->

            <label>Postal Code</label>
            <input id="transport-postal_code" name="transport-postal_code"  type="text" required>

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
		
            <label class="full-width">Description</label>
            <textarea id="transport-desc" name="transport-desc" class="full-width" required></textarea>

            <label class="full-width">Logo</label>
            <input id="transport-logo" name="transport-logo" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >

            <label class="full-width">Gallery</label>
            <input id="transport-pic1" name="transport-pic1" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >
            <input id="transport-pic2" name="transport-pic2" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >
            <input id="transport-pic3" name="transport-pic3" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >

            <button id="transport-submit" type="submit" class="btn full-width">Submit</button>
        </form>
    </div>
</div>
    
<!-- Accomodations -->
<div class="dropdown">
	<div class="dropdown-bar" onclick="toggleDropdownAccomodations()">
		Register as an Accomodation
		<span id="arrowAccomodations" class="arrow arrow-down">▼</span>
	</div>
    <div id="dropdownContentAccomodations" class="dropdown-content">
		<h1 class="form-title">Accomodation registration</h1>
		<p class="form-description">Please input your information below to register.</p>
        <form class="registration-form" action="accomodation-register.php" method="post">
            <label>Accomodation Name</label>
            <input id="accomodation-name"  name="accomodation-name" type="text" required>

            <label>Email</label>
            <input id="accomodation-email"  name="accomodation-email" type="email" required>

            <label>Phone Number</label>
            <input id="accomodation-phone"  name="accomodation-phone" type="tel" required>

            <label>Web Site</label>
            <input id="accomodation-web"  name="accomodation-web" type="url" required>

            <label>Address</label>
            <input id="accomodation-address"  name="accomodation-address" type="text" required>

            <label>City</label>
            <?php citiesSelect("accomodation-city"); ?><!--                                                            -->
            <label>Postal Code</label>
            <input id="accomodation-postal_code"  name="accomodation-postal_code" type="text" required>

            <label>Number of Rooms</label>
            <input id="accomodation-rooms"  name="accomodation-rooms" type="number" min=0 required>

            <label class="full-width">Description</label>
            <textarea id="accomodation-desc" name="accomodation-desc" class="full-width" required></textarea>

            <label class="full-width">Logo</label>
            <input id="accomodation-logo"  name="accomodation-logo" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >

            <label class="full-width">Gallery</label>
            <input id="accomodation-pic1"  name="accomodation-pic1" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >
            <input id="accomodation-pic2" name="accomodation-pic2" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >
            <input id="accomodation-pic3"  name="accomodation-pic3" type="url" class="full-width" accept="image/*" placeholder="Paste img URL here" >

            <button id="accomodation-submit" type="submit" class="btn full-width">Submit</button>
        </form>
    </div>
</div>	
	
	<footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
<?php
function  citiesSelect($name){
    ?>
                <select name="<?php echo $name; ?>" id="<?php echo $name; ?>"  class="form-select" required>
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

            <select name="<?php echo $name; ?>[]" id="<?php echo $name; ?>" class="form-select" multiple="multiple" required>
			<option value="" disabled selected>Select an area</option>
			<?php
			$sql = "SELECT ID, area_name FROM `service_areas` WHERE is_valid=1 ORDER BY ID ASC";
			$result = generateSelectFromSql($sql, $servername, $username, $password, $dbname);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row["ID"] . "'>" . $row["area_name"] . "</option>\n";
			}
			} else {
				echo "<option value='' disabled>No results available</option>";
			}
			?>
		</select>

            <?php
}?>