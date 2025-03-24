<?php
use PHPUnit\Framework\TestCase;
require 'venue_operations.php'; // Include the procedural script

class VenueRegisterValidationTest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = new mysqli("localhost", "root", "mysql", "isotalent");

        // Create a temporary venues table for testing
        $this->mysqli->query("
            CREATE TEMPORARY TABLE venues (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(100),
                logo VARCHAR(255),
                address VARCHAR(255),
                city VARCHAR(100),
                postal_code VARCHAR(20),
                phone VARCHAR(20),
                email VARCHAR(100),
                photo1 VARCHAR(255),
                photo2 VARCHAR(255),
                photo3 VARCHAR(255),
                description TEXT,
                maximum_capacity INT,
                liquor_license TINYINT,
                kitchen_available TINYINT,
                bathrooms_available INT,
                parking_available INT,
                review_stars FLOAT,
                review_desc TEXT
            )
        ");
    }

    protected function tearDown(): void {
        // Drop the temporary table after testing
        $this->mysqli->query("DROP TABLE IF EXISTS venues");
        $this->mysqli->close();
		$_POST = [];
    }

    public function testMissingNameField(): void {
        // Simulate POST data with missing 'name' field
        $_POST = [
            'venue-name' => '', // Missing name
            'venue-email' => 'test@example.com',
            'venue-phone' => '123-456-7890',
            'venue-address' => '123 Test St',
            'venue-bathrooms' => 2,
            'venue-capacity' => 100,
            'venue-parking' => 50,
            'liquor-license' => 'yes',
            'kitchen' => 'yes',
            'venue-desc' => 'Test venue description',
            'venue-logo' => 'http://example.com/logo.png',
            'venue-pic1' => 'http://example.com/pic1.png',
            'venue-pic2' => 'http://example.com/pic2.png',
            'venue-pic3' => 'http://example.com/pic3.png',
        ];

        // Capture any output and include the script
        ob_start();
        include 'venue-register.php';
        ob_end_clean();

        // Verify no rows were inserted
        $result = $this->mysqli->query("SELECT COUNT(*) AS count FROM venues");
        $row = $result->fetch_assoc();
        $this->assertEquals(0, $row['count'], "No rows should be inserted when a required field is missing.");
    }
}
?>
