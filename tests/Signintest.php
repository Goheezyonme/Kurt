<?php
use PHPUnit\Framework\TestCase;
require 'signin.php';

class SigninOperationsTest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = new mysqli("localhost", "root", "", "test_database");
        $this->mysqli->query("
            CREATE TEMPORARY TABLE users (
                id INT PRIMARY KEY AUTO_INCREMENT,
                full_name VARCHAR(100),
                email VARCHAR(100) UNIQUE,
                password VARCHAR(255)
            )
        ");
    }

    protected function tearDown(): void {
        $this->mysqli->query("DROP TABLE IF EXISTS users");
        $this->mysqli->close();
    }

    public function testSignInValidUser(): void {
        $email = "test@example.com";
        $password = password_hash("securepassword123", PASSWORD_BCRYPT);
        $this->mysqli->query("
            INSERT INTO users (full_name, email, password) 
            VALUES ('Test User', '$email', '$password')
        ");

        $result = signInUser($this->mysqli, $email, "securepassword123");
        $this->assertTrue($result);
    }

    public function testSignInInvalidPassword(): void {
        $email = "test@example.com";
        $password = password_hash("securepassword123", PASSWORD_BCRYPT);
        $this->mysqli->query("
            INSERT INTO users (full_name, email, password) 
            VALUES ('Test User', '$email', '$password')
        ");

        $result = signInUser($this->mysqli, $email, "wrongpassword");
        $this->assertFalse($result);
    }

    public function testSignInNonExistentUser(): void {
        $result = signInUser($this->mysqli, "nonexistent@example.com", "password123");
        $this->assertFalse($result);
    }
}
?>
