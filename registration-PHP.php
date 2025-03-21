<?php
include 'connection-PHP.php';

// Your database query logic here
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Successfully connected to the database!";
$conn->close();
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
                <a href="about-HTML.html">About Us</a>
                <a href="registration-HTML.html" class="cta-button">Promote Yourself</a>
				<a href="category-select-HTML.html">Search</a>
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
        <form class="registration-form">
            <label>Venue's Name</label>
            <input id="venu-name" type="text" required>

            <label>Email</label>
            <input id="venue-email" type="email" required>

            <label>Phone Number</label>
            <input id="venue-phone" type="tel" required>

            <label>Address</label>
            <input id="venue-address" type="text" required>

            <label>Number of Bathrooms</label>
            <input id="venue-bathrooms" type="number" min=0 required>
			
			<label>Maximum capacity</label>
            <input id="venue-capacity" type="number" min=0 required>
			
			<label>Parking spots</label>
            <input id="venue-parking" type="number" min=0 required>
			
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
        <textarea id="venue-desc" class="full-width" required></textarea>

		<label class="full-width">Logo</label>
        <input id="venue-logo" type="file" class="full-width" accept="image/*">

            <label class="full-width">Gallery</label>
            <input id="venue-pic1" type="file" class="full-width" accept="image/*">
            <input id="venue-pic2"type="file" class="full-width" accept="image/*">
            <input id="venue-pic3" type="file" class="full-width" accept="image/*">


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
        <form class="registration-form">
            <label>Name</label>
            <input type="text">


            <label class="full-width">Entertainer Type</label>
            <div class="checkbox-group full-width">
                <input type="checkbox" id="musicBand">
                <label for="musicBand">Music Band</label>
                <input type="checkbox" id="performer">
                <label for="performer">Performer</label>
            </div>
            <label>Phone</label>
            <input type="text">

            <label class="full-width">Gallery</label>
            <input type="file" class="full-width">
            <input type="file" class="full-width">
            <input type="file" class="full-width">

            <label class="full-width">Video Sample</label>
            <input type="file" class="full-width">
            <input type="text" placeholder="Paste video URL here" class="full-width">

            <label class="full-width">Audio Sample</label>
            <input type="file" class="full-width">
            <input type="text" placeholder="Paste audio URL here" class="full-width">

            <label class="full-width">About</label>
            <textarea class="full-width"></textarea>

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
        <form class="registration-form">
             <label>Food truck Name</label>
            <input id="foodtruck-name" type="text" required>

            <label>Email</label>
            <input id="foodtruck-email" type="email" required>

            <label>Phone Number</label>
            <input id="foodtruck-phone" type="tel" required>

            <label>Location</label>
            <input id="foodtruck-location" type="text" required>
			
		<label class="full-width">Description</label>
        <textarea id="foodtruck-desc" class="full-width" required></textarea>

		<label class="full-width">Logo</label>
        <input id="foodtruck-logo" type="file" class="full-width" accept="image/*">

            <label class="full-width">Gallery</label>
            <input id="foodtruck-pic1" type="file" class="full-width" accept="image/*">
            <input id="foodtruck-pic2"type="file" class="full-width" accept="image/*">
            <input id="foodtruck-pic3" type="file" class="full-width" accept="image/*">

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
        <form class="registration-form">
            <label>Name</label>
            <input type="text">
			
			<label>Representative's Name</label>
			<input type="text">
			
            <label>Phone</label>
            <input type="text">

            <label class="full-width">Gallery</label>
            <input type="file" class="full-width">
            <input type="file" class="full-width">
            <input type="file" class="full-width">

            <label class="full-width">About</label>
            <textarea class="full-width"></textarea>

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
        <form class="registration-form">
            <label>Company Name</label>
            <input id="transport-name" type="text" required>

            <label>Email</label>
            <input id="transport-email" type="email" required>

            <label>Phone Number</label>
            <input id="transport-phone" type="tel" required>

            <label>Location</label>
            <input id="transport-location" type="text" required>

            <label>Vehicle Capacity</label>
            <input id="transport-capacity" type="number" min=0 required>
			
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
        <textarea id="transport-desc" class="full-width" required></textarea>

		<label class="full-width">Logo</label>
        <input id="transport-logo" type="file" class="full-width" accept="image/*">

            <label class="full-width">Gallery</label>
            <input id="transport-pic1" type="file" class="full-width" accept="image/*">
            <input id="transport-pic2"type="file" class="full-width" accept="image/*">
            <input id="transport-pic3" type="file" class="full-width" accept="image/*">

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
        <form class="registration-form">
                        <label>Accomodation Name</label>
            <input id="accomodation-name" type="text" required>

            <label>Email</label>
            <input id="accomodation-email" type="email" required>

            <label>Phone Number</label>
            <input id="accomodation-phone" type="tel" required>

            <label>Address</label>
            <input id="accomodation-address" type="text" required>

            <label>Number of Rooms</label>
            <input id="accomodation-rooms" type="number" min=0 required>
			
			<label>Maximum capacity</label>
            <input id="venue-capacity" type="number" min=0 required>
		
		<label class="full-width">Description</label>
        <textarea id="accomodation-desc" class="full-width" required></textarea>

		<label class="full-width">Logo</label>
        <input id="accomodation-logo" type="file" class="full-width" accept="image/*">

            <label class="full-width">Gallery</label>
            <input id="accomodation-pic1" type="file" class="full-width" accept="image/*">
            <input id="accomodation-pic2"type="file" class="full-width" accept="image/*">
            <input id="accomodation-pic3" type="file" class="full-width" accept="image/*">

            <button id="accomodation-submit" type="submit" class="btn full-width">Submit</button>
        </form>
    </div>
</div>	
	
	<footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
