<?php
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
    <link rel="stylesheet" href="category-select-CSS.css">
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
                    <span class="user-welcome">Welcome, <?php echo htmlspecialchars($_SESSION["email"]); ?>!</span>
                    <a href="logout.php" class="cta-button">Log Out</a>
                <?php else: ?>
					<br>
                    <span class="user-welcome">You are browsing as a guest. <a href="signin.html">Sign in</a> for more features!</span>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Search our databases</h1>
            <p style="font-family:Montserrat; font-size:20px">Browse our wide array of services, from food to entertainment, all sourced locally in the Okanagan.</p>
        </div>
    </header>

    <!-- Featured Categories -->
    <section class="featured">
        <h2 style="color: #15BDA1; font-family:Montserrat">Featured Categories</h2>
        <div class="category-grid">
            <div class="category-card">
                <img src="foodtruck-photo.jpg" alt="Food Truck">
                <h3>Food Trucks</h3>
                <button id="foodTruckSearch">Search Food Trucks</button>
            </div>
            <div class="category-card">
                <img src="musicians-photo.jpg" alt="Musicians">
                <h3>Musicians</h3>
                <button id="musicianSearch">Search Musicians</button>
            </div>
            <div class="category-card">
                <img src="catering-photo.jpeg" alt="Catering">
                <h3>Catering</h3>
                <button id="cateringSearch">Search Catering</button>
            </div>
            <div class="category-card">
                <img src="accomodations-photo.jpg" alt="Accommodations">
                <h3>Accommodations</h3>
                <button id="accommodationSearch">Search Accommodations</button>
            </div>
            <div class="category-card">
                <img src="transportation-photo.jpg" alt="Transportation">
                <h3>Transportation</h3>
                <button id="transportationSearch">Search Transportation</button>
            </div>
            <div class="category-card">
                <img src="venues-photo.jpg" alt="Venues">
                <h3>Venues</h3>
                <button id="venueSearch">Search Venues</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
