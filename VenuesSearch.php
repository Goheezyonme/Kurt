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
                <a href="about-HTML.html">About Us</a>
                <?php if ($is_logged_in): ?>
                    <a href="registration-HTML.html" class="cta-button">Promote Yourself</a>
                <?php endif; ?>
                <a href="category-select-HTML.php">Search</a>

                <?php if ($is_logged_in): ?>
                    <span class="user-welcome">Welcome, <?php echo htmlspecialchars($_SESSION["email"]); ?>!</span>
                    <a href="logout.php" class="cta-button">Log Out</a>
                <?php else: ?>
                    <span class="user-welcome">You are browsing as a guest. <a href="signin.html">Sign in</a> for more features!</span>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <header class="hero-venues">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Find somewhere that's fun for all!</h1>
            <p style="font-family:Montserrat">Find the perfect venue to host your dream events!</p>
        </div>
    </header>

    <div class="nav-links">
        <a href="category-select-HTML.php" class="cta-button"><< Categories</a>
    </div>

    <div class="tags">
        <h2 style="color: #15BDA1; font-family:Montserrat">Venues</h2>
        <button class="tag">Hotels</button>
        <button class="tag">Conference Centers</button>
        <button class="tag">Banquet Halls</button>
        <button class="tag">Bars and Breweries</button>
        <button class="tag">Wineries</button>
        <button class="tag">Sports Clubs</button>
        <br><br>
        <button class="tag">Restaurants</button>
        <button class="tag">Theatres</button>
        <br><br>
        <button class="button" id="search">Search</button>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
