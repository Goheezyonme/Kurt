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
    <title>ISO Talent | About Us</title>
    <link rel="stylesheet" href="about-CSS.css">
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
    
    <div id="about-company">
        <h2 style="color: #15BDA1; font-family:Montserrat">Our mission</h2>
        <span>
        The wine industry in BC is facing significant challenges in the coming years due to the severe cold snaps experienced during 
        the past two winters. In response, local wineries have come together to develop strategies to tackle these issues. One of the main 
        strategies is to host more events at the wineries, such as long table dinners and weddings. While local wine will be limited at these events, 
        wineries will remain open to the public, continuing to welcome guests. My hope is that this website will simplify the process of organizing 
        these events for everyone involved. Consider it your ultimate resource for planning events in the Okanagan. Here, you'll find everything from musicians
        and caterers to food trucks, accommodations, transportation, and much more. Feel free to explore and reach out if you have any questions.
        </span>
    </div>
    
    <div id="about-kurt">
        <img src="kurt-pic.png" alt="Kurt Joudrey" id="kurt-profile">
        <div>
        <h2 style="color: #15BDA1; font-family:Montserrat">About Kurt</h2>
        <span id="kurt-para">I currently own and operate The Naramata Taxi Co., a business that has evolved over the past decade. 
        Due to the small population here, I primarily focus on offering wine tours for tourists, as well as bike and rider shuttle services.
        My background is quite diverse. In the early 1980s, I moved to Vancouver to pursue my dream of being a frontman in a band. 
        After years of performing in various bands and working as a bartender and restaurant manager, I discovered a passion for the film industry. 
        I got my start in Film and Television production as a background extra on 21 Jump Street in the late 1980s. 
        From there, I transitioned to managing background actors on set, and eventually worked as an Assistant Director for various TV shows and movies. 
        Today, my focus is on continuing to run the taxi service while also developing a new venture, Interior South Okanagan Talent. My extensive knowledge of the wine industry,
        gained through my taxi and wine tours, has inspired me to create this online platform showcasing Okanagan talent.</span>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
