<?php

use PHPUnit\Framework\TestCase;

class VenueSearchTest extends TestCase
{
    private $connection;

    protected function setUp(): void
    {
        // Set up a mock database connection
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $dbname = "isotalent"; // Use a test database
        $this->connection = new mysqli($servername, $username, $password, $dbname);

        if ($this->connection->connect_error) {
            $this->fail("Connection failed: " . $this->connection->connect_error);
        }

        // Create test data
        $this->connection->query("
            CREATE TABLE IF NOT EXISTS venues_test (
                id INT AUTO_INCREMENT PRIMARY KEY,
                city VARCHAR(255),
                bathrooms_available INT,
                maximum_capacity INT,
                parking_available INT,
                liquor_license BOOLEAN,
                kitchen_available BOOLEAN
            )
        ");

        $this->connection->query("
            INSERT INTO venues_test (city, bathrooms_available, maximum_capacity, parking_available, liquor_license, kitchen_available)
            VALUES
            ('Vancouver', 2, 50, 1, 1, 1),
            ('Toronto', 3, 100, 1, 0, 1),
            ('Victoria', 1, 20, 0, 1, 0)
        ");
    }

    protected function tearDown(): void
    {
        // Clean up test data
        $this->connection->query("DROP TABLE venues_test");
        $this->connection->close();
    }

    public function testVenueSearch()
    {
        // Mock POST data
        $_POST = [
            'venue-city' => 'Vancouver',
            'venue-bathrooms' => '2',
            'venue-capacity' => '40',
            'venue-parking' => '1',
            'liquor-license' => 'yes',
            'kitchen' => 'yes',
        ];

        // Test the query logic
        $venue_city = htmlspecialchars($_POST['venue-city']);
        $venue_bathrooms = htmlspecialchars($_POST['venue-bathrooms']) ?: 0;
        $venue_capacity = htmlspecialchars($_POST['venue-capacity']) ?: 0;
        $venue_parking = htmlspecialchars($_POST['venue-parking']) ?: 0;
        $liquor_license = htmlspecialchars($_POST['liquor-license']) === 'yes' ? 1 : 0;
        $kitchen = htmlspecialchars($_POST['kitchen']) === 'yes' ? 1 : 0;

        $sql = "SELECT * FROM venues_test WHERE " .
            "city = '$venue_city' AND " .
            "bathrooms_available >= $venue_bathrooms AND " .
            "maximum_capacity >= $venue_capacity AND " .
            "parking_available >= $venue_parking AND " .
            "liquor_license = $liquor_license AND " .
            "kitchen_available = $kitchen";

        $result = $this->connection->query($sql);

        $this->assertNotFalse($result);
        $this->assertGreaterThan(0, $result->num_rows);

        // Fetch the matching venue
        $venue = $result->fetch_assoc();
        $this->assertEquals('Vancouver', $venue['city']);
    }
	
	public function testVenueSearchEmpty()
{
    // Mock POST data with criteria unlikely to match any records
    $_POST = [
        'venue-city' => 'NonExistentCity',
        'venue-bathrooms' => '999',
        'venue-capacity' => '9999',
        'venue-parking' => '999',
        'liquor-license' => 'no',
        'kitchen' => 'no',
    ];

    // Sanitize and process POST data
    $venue_city = htmlspecialchars($_POST['venue-city']);
    $venue_bathrooms = htmlspecialchars($_POST['venue-bathrooms']) ?: 0;
    $venue_capacity = htmlspecialchars($_POST['venue-capacity']) ?: 0;
    $venue_parking = htmlspecialchars($_POST['venue-parking']) ?: 0;
    $liquor_license = htmlspecialchars($_POST['liquor-license']) === 'yes' ? 1 : 0;
    $kitchen = htmlspecialchars($_POST['kitchen']) === 'yes' ? 1 : 0;

    // Adjust the query logic to use the sanitized inputs
    $sql = "SELECT * FROM venues_test WHERE " .
        "city = '$venue_city' AND " .
        "bathrooms_available >= $venue_bathrooms AND " .
        "maximum_capacity >= $venue_capacity AND " .
        "parking_available >= $venue_parking AND " .
        "liquor_license = $liquor_license AND " .
        "kitchen_available = $kitchen";

    $result = $this->connection->query($sql);

    // Verify no matching records
    $this->assertNotFalse($result); // Ensure query execution succeeded
    $this->assertEquals(0, $result->num_rows); // Assert no rows are returned

    // Verify fetching results does not return any data
    $venue = $result->fetch_assoc();
    $this->assertNull($venue); // Fetching should return false (no results)
}

}
