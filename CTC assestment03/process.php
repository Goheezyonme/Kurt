<?php



function createToken(PDO $pdo, array $data, int $ttlSeconds = 3600)
{
    $token = bin2hex(random_bytes(32)); // 64 hex chars => 256 bits
    $now = time();
    $expires = $now + $ttlSeconds;
    $payload = json_encode($data, JSON_UNESCAPED_UNICODE);

    $stmt = $pdo->prepare("INSERT INTO tokens (token, payload, created_at, expires_at) VALUES (?, ?, ?, ?)");
    $stmt->execute([$token, $payload, $now, $expires]);

    return $token;
}
$pdo = new PDO("sqlite:mydatabase.db");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Mostrar errores (opcional)
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: text/plain; charset=utf-8');

//echo "=== POST PARAMETERS RECEIVED ===\n\n";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "No POST data received. Use a form to submit data.\n";
    exit;
}

if (empty($_POST)) {
    echo "POST is empty.\n";
    exit;
}

$clinicianEmail = $_POST["clinicianEmail"];
if (empty($clinicianEmail)) {
    echo "clinicianEmail is empty\n";
} /*else {
 echo "clinicianEmail has data " . $clinicianEmail . "\n";
}*/

$patientEmail = $_POST["patientEmail"];
if (empty($patientEmail)) {
    echo "patientEmail is empty\n";
}/*else {
 echo "patientEmail has data " . $patientEmail . "\n";
}*/

$assessmentslink1 = $_POST["assessmentslink1"];
if (empty($assessmentslink1)) {
    echo "assessmentslink1 is empty\n";
} /*else {
 echo "assessmentslink1 has data " . $assessmentslink1 . "\n";
}*/

$assessmentslink2 = $_POST["assessmentslink2"];
if (empty($assessmentslink2)) {
    echo "assessmentslink2 is empty\n";
} /*else {
 echo "assessmentslink2 has data " . $assessmentslink2 . "\n";
}*/

function formExtract($assessmentslink)
{
    //echo $assessmentslink . "\n";
    //echo strpos($assessmentslink, "&formname") . "\n";
    $piece = substr($assessmentslink, strpos($assessmentslink, "&formname"));
    //echo $piece . "\n";
    $pos = strpos($piece, "=");
    //echo $pos . "\n";
    $formname = substr($piece, $pos + 1);
    //echo $formname;
    return $formname;

}


$formname1 = formExtract($assessmentslink1);//$_POST["formname"];
//echo $formname1;
//die();
if (empty($formname1)) {
    echo "formname1 is empty\n";
} /*else {
  echo "formname1 has data " . $formname1 . "\n";
}*/


$formname2 = formExtract($assessmentslink2);//$_POST["formname"];
//echo $formname1;
//die();
if (empty($formname2)) {
    echo "formname2 is empty\n";
} /*else {
  echo "formname2 has data " . $formname2 . "\n";
}*/

//die();



$links = "";

$data = [// soon tobe converted into a token
    'clinicianEmail' => $clinicianEmail,
    'patientEmail' => $patientEmail,
    'assessmentslink' => $assessmentslink1,
    'formname' => $formname1,
];

//echo $data;

//$token1 = createToken($pdo, $data, 3600); // 1 hora
$token1 = createToken($pdo, $data, 3600); // 1 hora


$data = [// soon tobe converted into a token
    'clinicianEmail' => $clinicianEmail,
    'patientEmail' => $patientEmail,
    'assessmentslink' => $assessmentslink2,
    'formname' => $formname2,
];

$token2 = createToken($pdo, $data, 3600); // 1 hora
//$link = "https://tu-dominio.com/process.php?token=$token";
//echo "->" . $link;


function linkWithTokenOnly($assessmentslink, $token)
{
    if (empty($assessmentslink)) {
        echo "assessmentslink1 is empty\n";
        return "";
    } else {

        if (str_contains($assessmentslink, "&formname")) {
            $assessmentslink1 = substr($assessmentslink, 0, strpos($assessmentslink, "&formname"));
        }

        $newLink = str_replace("xyz", $token, $assessmentslink1);
        //echo "new link ::" . $newLink . "\n";
        return "<a href=\"" . $newLink . "\">  assessment link </a><br>\n";
    }

}

$links .= linkWithTokenOnly($assessmentslink1, $token1);
$links .= linkWithTokenOnly($assessmentslink2, $token2);

//echo $links;


/*
if (empty($assessmentslink2)) {
    echo "assessmentslink2 is empty\n";
} else {
    echo "assessmentslink2 has data ,a href=\"" . $assessmentslink2 . $token2 . "\">link 2</a>\n";
    $links = $links . "<a href=\"" . $assessmentslink2 . $token2 . "\"> second assessment</a><br>\n";
}
*/




$emailBody = "<!doctype html>";
$emailBody = $emailBody . "<html lang=\"en\">";
$emailBody = $emailBody . "<head>";
$emailBody = $emailBody . "  <meta charset=\"utf-8\">";
$emailBody = $emailBody . "  <meta name=\"viewport\" content=\"width=device-width\">";
$emailBody = $emailBody . "  <title>Your Assessment Documents</title>";
$emailBody = $emailBody . "  <style>";
$emailBody = $emailBody . "    body { margin:0; padding:0; background-color:#f4f4f6; font-family: Arial, sans-serif; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }";
$emailBody = $emailBody . "    table { border-collapse: collapse; }";
$emailBody = $emailBody . "    .container { width:100%; max-width:600px; margin:0 auto; background:#ffffff; }";
$emailBody = $emailBody . "    .pad { padding:20px; }";
$emailBody = $emailBody . "    h1 { font-size:20px; margin:0 0 12px 0; color:#111827; }";
$emailBody = $emailBody . "    p { margin:0 0 12px 0; color:#374151; line-height:1.4; }";
$emailBody = $emailBody . "    .btn { display:inline-block; padding:10px 18px; background:#0d6efd; color:#ffffff; text-decoration:none; border-radius:6px; font-weight:600; }";
$emailBody = $emailBody . "    .muted { color:#6b7280; font-size:13px; }";
$emailBody = $emailBody . "    .list { margin:12px 0; padding-left:18px; color:#374151; }";
$emailBody = $emailBody . "    .footer { font-size:12px; color:#9ca3af; padding:16px 20px; text-align:center; }";
$emailBody = $emailBody . "    @media only screen and (max-width:420px) {";
$emailBody = $emailBody . "      .pad { padding:14px; }";
$emailBody = $emailBody . "      .btn { padding:10px 14px; display:block; text-align:center; }";
$emailBody = $emailBody . "    }";
$emailBody = $emailBody . "  </style>";
$emailBody = $emailBody . "</head>";
$emailBody = $emailBody . "<body>";
$emailBody = $emailBody . "  <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\">";
$emailBody = $emailBody . "    <tr>";
$emailBody = $emailBody . "      <td align=\"center\" style=\"padding:24px 12px;\">";
$emailBody = $emailBody . "        <table class=\"container\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\">";
$emailBody = $emailBody . "          ";
$emailBody = $emailBody . "          <!-- Header -->";
$emailBody = $emailBody . "          <tr>";
$emailBody = $emailBody . "            <td class=\"pad\" style=\"border-bottom:1px solid #eef2f7;\">";
$emailBody = $emailBody . "              <h1>Your Assessment Documents</h1>";
$emailBody = $emailBody . "              <p class=\"muted\">Sent by: <strong>{{clinicianName}}</strong></p>";
$emailBody = $emailBody . "            </td>";
$emailBody = $emailBody . "          </tr>";
$emailBody = $emailBody . "          <!-- Body -->";
$emailBody = $emailBody . "          <tr>";
$emailBody = $emailBody . "            <td class=\"pad\">";
$emailBody = $emailBody . "              <p>Hello <strong>{{patientName}}</strong>,</p>";
$emailBody = $emailBody . "              <p>The following assessments/forms have been prepared for you:</p>";
$emailBody = $emailBody . "              <!-- Dynamically generated list -->";
$emailBody = $emailBody . "              <ul class=\"list\">";
$emailBody = $emailBody . "                {{assessmentsList}}";
$emailBody = $emailBody . "                <!-- Example:";
$emailBody = $emailBody . "                <li>PHQ-9 — <span class=\"muted\">Depression Assessment</span></li>";
$emailBody = $emailBody . "                -->";
$emailBody = $emailBody . "              </ul>";
//$emailBody = $emailBody . "              <p>You can access them through the link below:</p>";
//$emailBody = $emailBody . "              <p style=\"text-align:center; margin:18px 0;\">";
//$emailBody = $emailBody . "                <a class=\"btn\" href=\"{{ctaUrl}}\" target=\"_blank\" rel=\"noopener\">View My Assessments</a>";
//$emailBody = $emailBody . "              </p>";
$emailBody = $emailBody . "              <p class=\"muted\">";
$emailBody = $emailBody . "                If you did not request this or believe it was sent in error, please reply to this email or contact ";
$emailBody = $emailBody . "                <a href=\"mailto:{{clinicEmail}}\">{{clinicEmail}}</a>.";
$emailBody = $emailBody . "              </p>";
$emailBody = $emailBody . "            </td>";
$emailBody = $emailBody . "          </tr>";
$emailBody = $emailBody . "          <!-- Footer -->";
$emailBody = $emailBody . "          <tr>";
$emailBody = $emailBody . "            <td style=\"background:#fafafa; border-top:1px solid #eef2f7;\">";
$emailBody = $emailBody . "              <div class=\"footer\">";
$emailBody = $emailBody . "                <div>Example Clinic • Phone: +1 (555) 123-4567</div>";
$emailBody = $emailBody . "                <div style=\"margin-top:6px;\">© <span id=\"year\">2025</span> All rights reserved</div>";
$emailBody = $emailBody . "              </div>";
$emailBody = $emailBody . "            </td>";
$emailBody = $emailBody . "          </tr>";
$emailBody = $emailBody . "        </table>";
$emailBody = $emailBody . "      </td>";
$emailBody = $emailBody . "    </tr>";
$emailBody = $emailBody . "  </table>";
$emailBody = $emailBody . "</body>";
$emailBody = $emailBody . "</html>";
$emailBody = $emailBody . "";
$emailBody = $emailBody . "";
$emailBody = $emailBody . "";

$emailBody = str_replace("{{assessmentsList}}", $links, $emailBody);

echo 'send email from google email' . '<br>';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'brunoaco@gmail.com';
    $mail->Password = 'qomu csty rxve vfsi'; // OJO: NO es tu contraseña normal
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Datos del email
    $mail->setFrom($clinicianEmail, 'Patient');//origin
    $mail->addAddress($patientEmail);//destination
    $mail->Subject = 'test with Gmail y PHP';
    //$mail->Body = '<html><body><h3>test</h3></body></html>';
    $mail->Body = $emailBody;
    $mail->IsHTML(true);       // <=== call IsHTML() after $mail->Body has been set.

    $mail->send();//this is where the magic happens
    echo "Correo enviado correctamente";
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}

