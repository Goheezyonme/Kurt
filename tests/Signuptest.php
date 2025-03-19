<?php
use PHPUnit\Framework\TestCase;
require 'signup.php';

class SignupOperationsTest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = new mysqli("localhost", "root", "mysql", "user_signups");
        $this->mysqli->query("CREATE TEMPORARY TABLE users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            full_name VARCHAR(100),
            email VARCHAR(100) UNIQUE, 
            password VARCHAR(255)
        )");
    }

    protected function tearDown(): void {
        $this->mysqli->query("DROP TABLE IF EXISTS users");
        $this->mysqli->close();
    }

    public function testInsertUser(): void {
        $fullName = "Test User";
        $email = "test@example.com";
        $password = password_hash("securepassword123", PASSWORD_BCRYPT);

        $result = insertUser($this->mysqli, $fullName, $email, $password);
        $this->assertTrue($result);

        $count = getUserCount($this->mysqli);
        $this->assertEquals(1, $count);
    }

    public function testInsertDuplicateUser(): void {
        $fullName = "Test User";
        $email = "test@example.com";
        $password = password_hash("securepassword123", PASSWORD_BCRYPT);

        $firstInsert = insertUser($this->mysqli, $fullName, $email, $password);
        $this->assertTrue($firstInsert);

        $secondInsert = insertUser($this->mysqli, $fullName, $email, $password);
        $this->assertFalse($secondInsert);
    }
}
?>
