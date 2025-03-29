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
                    <span class="user-welcome">Welcome, <?php echo htmlspecialchars($_SESSION["email"]); ?>!</span>
                    <a href="logout.php" class="cta-button">Log Out</a>
                <?php else: ?>
					<br>
                    <span class="user-welcome">You are browsing as a guest. <a href="signin.html">Sign in</a> for more features!</span>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <header class="hero-musician">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Browse musicians</h1>
            <p style="font-family:Montserrat">Search from a variety of genres, from rock to country and everything in between!</p>
        </div>
    </header>

    <div class="nav-links">
        <a href="category-select-HTML.php" class="cta-button"><< Categories</a>
    </div>

    <div class="tags">
        <h2 style="color: #15BDA1; font-family:Montserrat">Genres</h2>
        <button class="tag">Aboriginal</button>
        <button class="tag">African</button>
        <button class="tag">Ambient</button>
        <button class="tag">Blues</button>
        <button class="tag">Bohemian Country</button>
        <button class="tag">Classical</button>
        <br><br>
        <button class="tag">Country</button>
        <button class="tag">Dance</button>
        <button class="tag">DJ</button>
        <button class="tag">Electronic</button>
        <button class="tag">Folk</button>
        <br><br>
        <button class="tag">Gospel</button>
        <button class="tag">Heavy Metal</button>
        <button class="tag">Hip-Hop</button>
        <button class="tag">Indie</button>
        <button class="tag">Indigenous</button>
        <button class="tag">Jazz</button>
        <br><br>
        <button class="tag">K-Pop</button>
        <button class="tag">Latin</button>
        <button class="tag">Pop Punk</button>
        <button class="tag">Reggae</button>
        <button class="tag">Rhythm and Blues</button>
        <br><br>
        <button class="tag">Rock</button>
        <button class="tag">Solo Artists</button>
        <button class="tag">Top 40</button>
        <button class="tag">Other</button>
        <br><br>
        <button class="button" id="search">Search</button>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
 
