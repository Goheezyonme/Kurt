<?php
use PHPUnit\Framework\TestCase;
require 'musician_operations.php'; // Include the procedural script

class MusicianOperationsTest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = new mysqli("localhost", "root", "mysql", "isotalent");

        // Create a temporary musicians table for testing
        $this->mysqli->query("
            CREATE TEMPORARY TABLE musicians_test (
			  `ID` int NOT NULL,
			  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `city` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `postal_code` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
			  `photo1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `photo2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `photo3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `genre1` int DEFAULT NULL,
			  `genre2` int DEFAULT NULL,
			  `genre3` int DEFAULT NULL,
			  `review_stars` tinyint NOT NULL,
			  `review_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `is_valid` tinyint NOT NULL DEFAULT '1' COMMENT '1-yes/0-no'
            )
        ");
    }

    protected function tearDown(): void {
        // Drop the temporary table after testing
        $this->mysqli->query("DROP TABLE IF EXISTS musicians_test");
        $this->mysqli->close();
    }

    public function testInsertMusician(): void {
        // Insert test data into the temporary table
        $this->mysqli->query("
            INSERT INTO `musicians_test`( 
				`ID`, `name`, `logo`, `address`, 
				`city`, `postal_code`, `email`, 
				`photo1`, `photo2`, `photo3`, 
				`description`, `genre1`, `genre2`,
				`genre3`, `review_stars`, `review_desc`) 
			 VALUES (
				 '1', 'Test Musician','http://example.com/logo.png','123 Test St',
				 'Kelowna, B.C.','V1Y 7C7','test@example.com',
				 'http://example.com/pic1.png','http://example.com/pic2.png','http://example.com/pic3.png',
				 'A test Musician description.','1','2',
				 '3','0','review desc')
        ");

        // Call the function to get the count of musicians
        $count = getMusicianCount($this->mysqli);

        // Assert the count is 1 (indicating successful insert)
        $this->assertEquals(1, $count);
    }
}
?>
