<?php
use PHPUnit\Framework\TestCase;
require 'signup.php';

class Signuptest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = new mysqli("localhost", "root", "mysql", "user_signups");

        // Create a temporary users table for testing
        $this->mysqli->query("
            CREATE TEMPORARY TABLE users (
                id INT PRIMARY KEY AUTO_INCREMENT,
                full_name VARCHAR(100),
                email VARCHAR(100),
                password VARCHAR(255)
            )
        ");
    }

    protected function tearDown(): void {
        // Drop the temporary table after testing
        $this->mysqli->query("DROP TABLE IF EXISTS users");
        $this->mysqli->close();
    }

    public function testInsertUser(): void {
        $fullName = "Test User";
        $email = "test@example.com";
        $password = password_hash("securepassword123", PASSWORD_BCRYPT);

        $result = insertUser($this->mysqli, $fullName, $email, $password);

        // Assert the insertion was successful
        $this->assertTrue($result);

        // Verify that one record exists in the database
        $count = getUserCount($this->mysqli);
        $this->assertEquals(1, $count);
    }

    public function testSanitizeInput(): void {
        $input = "<script>alert('XSS');</script>";
        $sanitized = sanitizeInput($input);

        // Assert the input was sanitized
        $this->assertEquals("&lt;script&gt;alert('XSS');&lt;/script&gt;", $sanitized);
    }

    public function testInsertDuplicateUser(): void {
        $fullName = "Test User";
        $email = "test@example.com";
        $password = password_hash("securepassword123", PASSWORD_BCRYPT);

        // First insertion
        $firstInsert = insertUser($this->mysqli, $fullName, $email, $password);
        $this->assertTrue($firstInsert);

        // Second insertion with the same email
        $secondInsert = insertUser($this->mysqli, $fullName, $email, $password);

        // Assert the second insertion fails due to a duplicate
        $this->assertNotTrue($secondInsert);
    }
}
?>
