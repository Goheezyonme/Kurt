<?
use PHPUnit\Framework\TestCase;
require 'signin.php';

class SigninTest extends TestCase {
    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = new mysqli("localhost", "root", "mysql", "user_signups");
        $this->mysqli->query("
            CREATE TEMPORARY TABLE users (
                id INT PRIMARY KEY AUTO_INCREMENT,
                full_name VARCHAR(100),
                email VARCHAR(100) UNIQUE,
                password VARCHAR(255)
            )
        ");
    }

    // Make signInUser a method of the class
    private function signInUser($mysqli, $email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            return password_verify($password, $user['password']);
        }

        return false;
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

        // Call the method using $this
        $result = $this->signInUser($this->mysqli, $email, "securepassword123");
        $this->assertTrue($result);
    }

    public function testSignInInvalidPassword(): void {
        $email = "test@example.com";
        $password = password_hash("securepassword123", PASSWORD_BCRYPT);
        $this->mysqli->query("
            INSERT INTO users (full_name, email, password) 
            VALUES ('Test User', '$email', '$password')
        ");

        // Call the method using $this
        $result = $this->signInUser($this->mysqli, $email, "wrongpassword");
        $this->assertFalse($result);
    }

    public function testSignInNonExistentUser(): void {
        // Call the method using $this
        $result = $this->signInUser($this->mysqli, "nonexistent@example.com", "password123");
        $this->assertFalse($result);
    }
}
?>
