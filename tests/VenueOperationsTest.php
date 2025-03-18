<?php
use PHPUnit\Framework\TestCase;
require 'venue_operations.php'; // Include the procedural script

class VenueOperationsTest extends TestCase {
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
    }

    public function testInsertVenue(): void {
        // Insert test data into the temporary table
        $this->mysqli->query("
            INSERT INTO venues (name, logo, address, phone, email, description, maximum_capacity, liquor_license, kitchen_available, bathrooms_available, parking_available)
            VALUES ('Test Venue', 'http://example.com/logo.png', '123 Test St', '123-456-7890', 'test@example.com', 'A test venue description.', 100, 1, 1, 2, 10)
        ");

        // Call the function to get the count of venues
        $count = getVenueCount($this->mysqli);

        // Assert the count is 1 (indicating successful insert)
        $this->assertEquals(1, $count);
    }
}
?>
