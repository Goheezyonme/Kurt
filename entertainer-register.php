<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$entertainer="";

    $entertainer_name = htmlspecialchars($_POST['entertainer-name']);
    if (empty($entertainer_name)) {
    echo "entertainer-name is empty";
    } /*else {
    echo $entertainer_name."\n";
    }*/

    $entertainer_email = htmlspecialchars($_POST['entertainer-email']);
    if (empty($entertainer_email)) {
    echo "entertainer-email is empty";
    } /*else {
    echo $entertainer_email."\n";
    }*/

    $entertainer_phone = htmlspecialchars($_POST['entertainer-phone']);
    if (empty($entertainer_phone)) {
    echo "entertainer_phone is empty";
    } /*else {
    echo $entertainer_phone."\n";
    }*/

    $entertainer_website = htmlspecialchars($_POST['entertainer-website']);
    if (empty($entertainer_phone)) {
    echo "entertainer_website is empty";
    } /*else {
    echo $entertainer_website."\n";
    }*/

    $entertainer_address = htmlspecialchars($_POST['entertainer-address']);
    if (empty($entertainer_address)) {
    echo "entertainer_address is empty";
    } /*else {
    echo $entertainer_address."\n";
    }*/

    $entertainer_city = htmlspecialchars($_POST['entertainer-city']);
    if (empty($entertainer_address)) {
    echo "entertainer_address is empty";
    } /*else {
    echo $entertainer_address."\n";
    }*/

    $entertainer_postal_code = htmlspecialchars($_POST['entertainer-postal_code']);
    if (empty($entertainer_postal_code)) {
    echo "entertainer_postal_code is empty";
    } /*else {
    echo $entertainer_postal_code."\n";
    }*/

    $entertainer_genre1 = htmlspecialchars($_POST['entertainer-genre1']);
    if (empty($entertainer_genre1)) {
    echo "entertainer_genre1 is empty";
    } /*else {
    echo $entertainer_genre1."\n";
    }*/

    $entertainer_genre2 = htmlspecialchars($_POST['entertainer-genre2']);
    if (empty($entertainer_genre2)) {
    echo "entertainer_genre2 is empty";
    } /*else {
    echo $entertainer_genre2."\n";
    }*/

    $entertainer_genre3 = htmlspecialchars($_POST['entertainer-genre3']);
    if (empty($entertainer_genre3)) {
    echo "entertainer_genre3 is empty";
    } /*else {
    echo $entertainer_genre3."\n";
    }*/
    
    $entertainer_service_area = $_POST['entertainer-service_area'];
    if (empty($entertainer_service_area)) {
    echo "entertainer_service_area is empty";
    } /*else {
    print_r( $entertainer_service_area);
    }*/

    $entertainer_logo = htmlspecialchars($_POST['entertainer-logo']);
    if (empty($entertainer_logo)) {
    echo "entertainer_logo is empty";
    } /*else {
    echo $entertainer_logo."\n";
    }*/

    $entertainer_video = htmlspecialchars($_POST['entertainer-video']);
    if (empty($entertainer_video)) {
    echo "entertainer_video is empty";
    } /*else {
    echo $entertainer_video."\n";
    }*/

    $entertainer_pic1 = htmlspecialchars($_POST['entertainer-pic1']);
    if (empty($entertainer_pic1)) {
    echo "entertainer_pic1 is empty";
    } /*else {
    echo $entertainer_pic1."\n";
    }*/

    $entertainer_pic2 = htmlspecialchars($_POST['entertainer-pic2']);
    if (empty($entertainer_pic2)) {
    echo "entertainer_pic2 is empty";
    } /*else {
    echo $entertainer_pic2."\n";
    }*/

    $entertainer_pic3 = htmlspecialchars($_POST['entertainer-pic3']);
    if (empty($entertainer_pic3)) {
    echo "entertainer_pic3 is empty";
    } /*else {
    echo $entertainer_pic3."\n";
    }*/

    $entertainer_description = htmlspecialchars($_POST['entertainer-description']);
    if (empty($entertainer_description)) {
    echo "entertainer_description is empty";
    } /*else {
    echo $entertainer_description."\n";
    }*/
	
	$entertainer_phone = htmlspecialchars($_POST['entertainer-phone']);
    if (empty($entertainer_phone)) {
    echo "entertainer_phone is empty";
    } /*else {
    echo $entertainer_phone."\n";
    }*/
	
	$entertainer_website = htmlspecialchars($_POST['entertainer-website']);
    if (empty($entertainer_website)) {
    echo "entertainer_website is empty";
    } /*else {
    echo $entertainer_website."\n";
    }*/
	
	$entertainer_rate = htmlspecialchars($_POST['entertainer-rate']);
    if (empty($entertainer_rate)) {
    echo "entertainer_rate is empty";
    } /*else {
    echo $entertainer_rate."\n";
    }*/


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
    $mail->Subject = 'New musician registration';
    $mail->Body = 'A new musician has requested a registration.
	Name: ' . $entertainer_name . '
	Email: ' . $entertainer_email. '
	Phone Number: ' . $entertainer_phone. '
	Website: ' . $entertainer_website. '
	Address: ' . $entertainer_address. '
	City: ' . $entertainer_city. '
	Postal Code: ' . $entertainer_postal_code. ' 
	Genres: ' . $entertainer_genre1 . ', ' . $entertainer_genre2 . ', ' . $entertainer_genre3 . '
	Hourly Rate: ' . $entertainer_rate . '
	Service Areas: ' . implode(', ', $entertainer_service_area) . '
	Logo: ' . $entertainer_logo . '
	Pic1: ' . $entertainer_pic1 . '
	Pic2: ' . $entertainer_pic2 . '
	Pic3: ' . $entertainer_pic3 . '
	Audio sample: ' . $entertainer_video . '
	Description: ' . $entertainer_description;

   $mail->send();
} catch (Exception $e) {
    echo "<p style='color:red;'>❌ Error sending email: " . $mail->ErrorInfo . "</p>";


} catch (Exception $e) {
    echo "<p style='color:red;'>❌ Error sending email: " . $mail->ErrorInfo . "</p>";
}

?>
<script type="text/javascript">
alert("Registration submitted. Redirecting to registration page.");
window.location.href = "registration-PHP.php";
</script>