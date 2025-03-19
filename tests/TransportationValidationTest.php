<?php
use PHPUnit\Framework\TestCase;
require 'transport_operations.php'; // Include the procedural script

class TransportationValidationTest extends TestCase {
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
                wheel_chair_accessible TINYINT
            )
        ");
    }

    protected function tearDown(): void {
        // Drop the temporary table after testing
        $this->mysqli->query("DROP TABLE IF EXISTS transportation");
        $this->mysqli->close();
		$_POST = [];
    }

    public function testMissingNameField(): void {
        // Simulate POST data with missing 'name' field
        $_POST = [
            'transport-name' => '', // Missing name
            'transport-email' => 'test@example.com',
            'venue-phone' => '123-456-7890',
            'venue-address' => '123 Test St',
            'wheel_chair_accessible' => "No",
            'vehicle-capacity' => 5,
            'transport-desc' => 'Test venue description',
            'transport-logo' => 'http://example.com/logo.png',
            'transport-pic1' => 'http://example.com/pic1.png',
            'transport-pic2' => 'http://example.com/pic2.png',
            'transport-pic3' => 'http://example.com/pic3.png',
        ];

        // Capture any output and include the script
        ob_start();
        include 'transportation-register.php';
        ob_end_clean();

        // Verify no rows were inserted
        $result = $this->mysqli->query("SELECT COUNT(*) AS count FROM transportation");
        $row = $result->fetch_assoc();
        $this->assertEquals(0, $row['count'], "No rows should be inserted when a required field is missing.");
    }
}
?>
