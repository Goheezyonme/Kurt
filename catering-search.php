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

    <header class="hero-catering">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Explore caterers</h1>
            <p style="font-family:Montserrat">Find the perfect catering service for your special moments!</p>
        </div>
    </header>

    <div class="nav-links">
        <a href="category-select-PHP.php" class="cta-button"><< Categories</a>
    </div>

    <div class="tags">
        <h2 style="color: #15BDA1; font-family:Montserrat">Catering options</h2>
        <button class="tag">Bar Services</button>
        <button class="tag">BBQs & Picnics</button>
        <button class="tag">Birthdays</button>
        <button class="tag">Buffets</button>
        <button class="tag">Casual Catering</button>
        <br><br>
        <button class="tag">Cocktail Parties</button>
        <button class="tag">Corporate Events</button>
        <button class="tag">Dessert Specialties</button>
        <button class="tag">Dietary Restrictions</button>
        <br><br>
        <button class="tag">Formal Catering</button>
        <button class="tag">Funerals & Memorials</button>
        <button class="tag">Holiday Celebrations</button>
        <button class="tag">Plated Meals</button>
        <button class="tag">Private Parties</button>
        <br><br>
        <button class="tag">Religious Events</button>
        <button class="tag">Street Food</button>
        <button class="tag">Weddings</button>
        <br><br>
        <button class="button" id="search">Search</button>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
