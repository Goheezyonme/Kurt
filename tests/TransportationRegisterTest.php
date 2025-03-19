<?php
use PHPUnit\Framework\TestCase;
require 'transport_operations.php'; // Include the procedural script

class TransportationRegisterTest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = new mysqli("localhost", "root", "mysql", "isotalent");

        // Create a temporary venues table for testing
        $this->mysqli->query("
            CREATE TEMPORARY TABLE transportation (
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
                vehicle_capacity INT,
                wheel_chair_accessible TINYINT,
                review_stars FLOAT,
                review_desc TEXT
            )
        ");
    }

    protected function tearDown(): void {
        // Drop the temporary table after testing
        $this->mysqli->query("DROP TABLE IF EXISTS transportation");
        $this->mysqli->close();
    }

    public function testInsertTransport(): void {
        // Insert test data into the temporary table
        $this->mysqli->query("
            INSERT INTO transportation (name, logo, address, phone, email, description, vehicle_capacity, wheel_chair_accessible)
            VALUES ('Test Venue', 'http://example.com/logo.png', '123 Test St', '123-456-7890', 'test@example.com', 'A test transport description.', 5, 1)
        ");

        // Call the function to get the count of venues
        $count = getTransportCount($this->mysqli);

        // Assert the count is 1 (indicating successful insert)
        $this->assertEquals(1, $count);
    }
}
?>
