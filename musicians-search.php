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

    <header class="hero-musician">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Browse musicians</h1>
            <p style="font-family:Montserrat">Search from a variety of genres, from rock to country and everything in between!</p>
        </div>
    </header>

    <div class="nav-links">
        <a href="category-select-PHP.php" class="cta-button"><< Categories</a>
    </div>

    <h2>Search Musicians</h2>
	<div class="search-form">
	<form class="registration-form" action="musicianSearchResults.php" method="post">
            
            <label>City</label>
            <?php citiesSelect("musician_city", $servername, $username, $password, $dbname); ?>

            <label>Music tag 1</label>
            <select name="musician_genre1" id="musician_genre1"  class="form-select" >
            <?php
            $sql="SELECT ID , genre as type FROM `musician_genre` where is_valid=1 order by genre asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<option value='-1'>All</option>\n";
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
            <label>Music tag 2</label>
            <select name="musician_genre2" id="musician_genre2"  class="form-select" >
            <?php
            $sql="SELECT ID , genre as type FROM `musician_genre` where is_valid=1 order by genre asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<option value='-1'>All</option>\n";
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
            <label>Music tag 3</label>
            <select name="musician_genre3" id="musician_genre3"  class="form-select" >
            <?php
            $sql="SELECT ID , genre as type FROM `musician_genre` where is_valid=1 order by genre asc";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<option value='-1'>All</option>\n";
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["ID"]."'>".$row["type"]."</option>\n";
                }
            } else {
                echo "0 results";
            }

            ?>
            </select>
			
            <?php
            $sql="SELECT round(max(rate)*1.5,-2) as amount FROM `musicians` where is_valid=1;";

            $result= generateSelectFromSql($sql,$servername,$username,$password,$dbname);
            $temp_rate = 0;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $temp_rate= $row["amount"];
                }
            } 

            ?>
			<label>Maximum Hourly Rate ($/hr) between 0 and <?php echo $temp_rate ?></label>
            <input type="range" id="musician_rate" name="musician_rate" min="0" max="<?php echo $temp_rate ?>" name="musician_rate" value="0" oninput="this.nextElementSibling.value=this.value" style="width:80%">
            <output>0</output>
			<!--<input type=number min=0 name="musician_rate" >-->
			<br>
            <br>
            <button type="submit" class="btn full-width">Submit</button>
        </form>
	</div>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Interior South Okanagan Talent. All rights reserved.</p>
    </footer>

</body>
</html>
<?php
function citiesSelect($name, $servername, $username, $password, $dbname) {
    ?>
    <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-select">
        <?php
        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch all entries from the service_areas table
        $sql = "SELECT ID, area_name FROM `service_areas` WHERE is_valid = 1 ORDER BY ID ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each row as an option in the dropdown
            echo "<option value='-1'>All</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($row["ID"]) . "'>" . htmlspecialchars($row["area_name"]) . "</option>";
            }
        } else {
            echo "<option disabled>No service areas available</option>";
        }

        // Close the database connection
        $conn->close();
        ?>
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
 
