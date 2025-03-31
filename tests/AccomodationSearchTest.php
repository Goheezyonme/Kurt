<?php

use PHPUnit\Framework\TestCase;

class AccomodationSearchTest extends TestCase
{
    private $mysqli;

    protected function setUp(): void
    {
        // Establish a mock database connection
        $this->mysqli = new mysqli("localhost", "root", "mysql", "isotalent");

        // Create a mock "accommodations" table
        $this->mysqli->query("CREATE TABLE accommodations_test (
            id INT AUTO_INCREMENT PRIMARY KEY,
            city VARCHAR(255),
            num_rooms INT,
            name VARCHAR(255)
        )");

        // Insert test data into the table
        $this->mysqli->query("INSERT INTO accommodations_test (city, num_rooms, name) VALUES
            ('Kelowna, B.C.', 5, 'Cozy Inn'),
            ('Kelowna, B.C.', 3, 'Budget Stay'),
            ('Vancouver, B.C.', 2, 'City Hotel')");
    }

    protected function tearDown(): void
    {
        // Drop the mock "accommodations" table and close the connection
        $this->mysqli->query("DROP TABLE accommodations_test");
        $this->mysqli->close();
    }

    public function testCorrectDataIsSelected()
    {
        // Define input
        $accommodation_city = 'Kelowna, B.C.';
        $accommodation_rooms = 3;

        // Query to test
        $sql = "SELECT * FROM accommodations_test WHERE city = '$accommodation_city' AND num_rooms >= $accommodation_rooms";
        $result = $this->mysqli->query($sql);

        // Assert that two results are returned
        $this->assertEquals(2, $result->num_rows);

        // Fetch results and verify the data
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $this->assertEquals('Cozy Inn', $data[0]['name']);
        $this->assertEquals('Budget Stay', $data[1]['name']);
    }

    public function testNoResultsWhenCriteriaNotMet()
    {
        // Define input
        $accommodation_city = 'Kelowna, B.C.';
        $accommodation_rooms = 10;

        // Query to test
        $sql = "SELECT * FROM accommodations_test WHERE city = '$accommodation_city' AND num_rooms >= $accommodation_rooms";
        $result = $this->mysqli->query($sql);

        // Assert that no results are returned
        $this->assertEquals(0, $result->num_rows);
    }
}
?>