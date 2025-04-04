<?php
session_start();
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

    <header class="hero-foodTruck">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Find great eats!</h1>
            <p style="font-family:Montserrat">Search food trucks serving up cuisine from every corner of the world!</p>
        </div>
    </header>

    <div class="nav-links">
        <a href="category-select-PHP.php" class="cta-button"><< Categories</a>
    </div>

    <div class="tags">
        <h2 style="color: #15BDA1; font-family:Montserrat">Cuisines</h2>
        <button class="tag">Breakfast</button>
        <button class="tag">Caribbean</button>
        <button class="tag">Chinese</button>
        <button class="tag">Desserts</button>
        <button class="tag">Fusion</button>
        <button class="tag">Greek</button>
        <br><br>
        <button class="tag">Halal</button>
        <button class="tag">Indian</button>
        <button class="tag">Italian</button>
        <button class="tag">Japanese</button>
        <button class="tag">Juice & Smoothies</button>
        <br><br>
        <button class="tag">Korean</button>
        <button class="tag">Mexican</button>
        <button class="tag">Middle Eastern</button>
        <button class="tag">Seafood</button>
        <button class="tag">Soul Food</button>
        <button class="tag">Southern BBQ</button>
        <br><br>
        <button class="tag">Street Food</button>
        <button class="tag">Tex-Mex</button>
        <button class="tag">Thai</button>
        <button class="tag">Vegan-friendly</button>
        <button class="tag">Vegetarian-friendly</button>
        <br><br>
        <button class="tag">Western</button>
        <br><br>
        <button class="button" id="search">Search</button>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
