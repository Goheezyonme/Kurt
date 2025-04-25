<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$name = htmlspecialchars($_POST['full_name']);
$qualifications = htmlspecialchars($_POST['qualifications']);

$mail = new PHPMailer(true);
try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Or use your SMTP provider
    $mail->SMTPAuth = true;
    $mail->Username = 'crispedhades@gmail.com'; //senders address
    $mail->Password = 'uveq fnfi biug crud'; //app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('crispedhades@gmail.com', 'Donovan Thomas'); //senders address and name
    $mail->addAddress('donovan.thomas0205@gmail.com'); //receiving address
    $mail->Subject = 'New signup';
    $mail->Body = 'A new member has submitted a signup request.
	Fullname: ' . $name . '
	Qualification: ' . $qualifications;

   $mail->send();
} catch (Exception $e) {
    echo "<p style='color:red;'>❌ Error sending email: " . $mail->ErrorInfo . "</p>";


} catch (Exception $e) {
    echo "<p style='color:red;'>❌ Error sending email: " . $mail->ErrorInfo . "</p>";
}
?>
<script type="text/javascript">
alert("Application submitted. Redirecting to home page.");
window.location.href = "Landing page.html";
</script>
