<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


$name = htmlspecialchars($_POST['full_name']);
$qualification = htmlspecialchars($_POST['qualification']);
$email = htmlspecialchars($_POST['email']);

$mail = new PHPMailer(true);
try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Or use your SMTP provider
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL_USERNAME'];
	$mail->Password = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($_ENV['MAIL_USERNAME'], 'ISO Talent'); //senders address and name
    $mail->addAddress($_ENV['MAIL_RECEIVER']);
    $mail->Subject = 'New signup';
    $mail->Body = 'A new member has submitted a signup request.
	Fullname: ' . $name . '
	Qualification: ' . $qualification . '
	Email: ' . $email;

   $mail->send();
} catch (Exception $e) {
    echo "<p style='color:red;'>❌ Error sending email: " . $mail->ErrorInfo . "</p>";


} catch (Exception $e) {
    echo "<p style='color:red;'>❌ Error sending email: " . $mail->ErrorInfo . "</p>";
}
?>
<script type="text/javascript">
alert("Application submitted");
window.location.href = "Landing page.html";
</script>
