<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/


$clinicianEmail = $_POST["clinicianEmail"];
$patientEmail = $_POST["patientEmail"];
$assessmentslink = $_POST["assessmentslink"];
function validPost($name)
{

    if (isset($_POST[$name]) && ctype_digit($_POST[$name])) {
        //echo $name . " es un entero positivo: " . $_POST[$name] . "<br>\n";
        return $_POST[$name];
    } else {
        if (isset($_POST[$name])) {
            //echo $name . " no es un entero positivo: " . $_POST[$name] . "<br>\n";
            return $_POST[$name];

        } else {
            //echo $name . " no existe.<br>\n";
            return null;

        }
    }


}


//$fila1 = $_POST["fila1"];
$fila1 = validPost("fila1");// checks validity and deals with the data in the post
$fila2 = validPost("fila2");
$fila3 = validPost("fila3");
$fila4 = validPost("fila4");
$fila5 = validPost("fila5");
$fila6 = validPost("fila6");
$fila7 = validPost("fila7");
$fila8 = validPost("fila8");
$fila9 = validPost("fila9");


$oneSum = 0;
$twoSum = 0;
$threeSum = 0;

evalFilas($fila1);
evalFilas($fila2);
evalFilas($fila3);
evalFilas($fila4);
evalFilas($fila5);
evalFilas($fila6);
evalFilas($fila7);
evalFilas($fila8);
evalFilas($fila9);



function evalFilas($var)
{
    global $oneSum;
    global $twoSum;
    global $threeSum;

    switch ($var) {
        case 0:
        case "0":
            //echo "vale 0<br>\n";
            //$oneSum++;
            break;
        case 1:
        case "1":
            //echo "vale 1<br>\n";
            $oneSum++;
            break;
        case 2:
        case "2":
            //echo "vale 2<br>\n";
            $twoSum++;
            break;
        case 3:
        case "3":
            //echo "vale 3<br>\n";
            $threeSum++;
            break;
        default:
        //echo "no vale nada!!!<br>\n";
    }
    //echo ">one:" . $oneSum . "\ttwo:" . $twoSum . "\t>three:" . $threeSum . "<br>\n";

}
//echo "-->one:" . $oneSum . "<br>\n-->two:" . $twoSum . "<br>\n-->three:" . $threeSum . "<br>\n";
//echo "total:" . ($oneSum + ($twoSum * 2) + ($threeSum * 3)) . "<br>\n";
$total = $oneSum + ($twoSum * 2) + ($threeSum * 3);

$chk1 = validPost("chk1");
$chk2 = validPost("chk2");
$chk3 = validPost("chk3");
$chk4 = validPost("chk4");

//echo "clinicianEmail:" . $clinicianEmail . "<br/>\n";
//echo "patientEmail:" . $patientEmail . "<br/>\n";
//echo "assessmentslink:" . $assessmentslink . "<br/>\n";
/*
echo "fila1:" . $fila1 . "<br/>\n";
echo "fila2:" . $fila2 . "<br/>\n";
echo "fila3:" . $fila3 . "<br/>\n";
echo "fila4:" . $fila4 . "<br/>\n";
echo "fila5:" . $fila5 . "<br/>\n";
echo "fila6:" . $fila6 . "<br/>\n";
echo "fila7:" . $fila7 . "<br/>\n";
echo "fila8:" . $fila8 . "<br/>\n";
echo "fila9:" . $fila9 . "<br/>\n";*/


//echo "chk1:" . $chk1 . "<br/>\n";
//echo "chk2:" . $chk2 . "<br/>\n";
//echo "chk3:" . $chk3 . "<br/>\n";
//echo "chk4:" . $chk4 . "<br/>\n";

$emailBody = "<!doctype html>";
$emailBody = $emailBody . "<html lang=\"es\">";
$emailBody = $emailBody . "<head>";
$emailBody = $emailBody . "    <meta charset=\"UTF-8\">";
$emailBody = $emailBody . "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
$emailBody = $emailBody . "    <title>PHQ-9</title>";
$emailBody = $emailBody . "    <!-- Bootstrap 5 -->";
$emailBody = $emailBody . "    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">";
$emailBody = $emailBody . "</head>";
$emailBody = $emailBody . "<body>";
//$emailBody = $emailBody . "    clinicianEmail has data brunoaco@gmail.com<br>";
//$emailBody = $emailBody . "patientEmail has data bruno.acosta.baraona@gmail.com<br>";
//$emailBody = $emailBody . "assessmentslink has data http://localhost/CTC%20assestment03/linkProcess.php?token=f17aacedbaf33c7e1c02b2fc4ef6a1ae98e1efac08fa04144fcb5d4853f72bb9<br>";
$emailBody = $emailBody . "    <div class=\"container mt-4\">";
$emailBody = $emailBody . "        <form action=\"PHQ-9_process.php\" method=\"post\">";
//$emailBody = $emailBody . "            <label for=\"clinicianEmail\" class=\"form-label\">Clinician Email</label>";
//$emailBody = $emailBody . "            <input type=\"email\" class=\"form-control\" id=\"clinicianEmail\" name=\"clinicianEmail\" ";
//$emailBody = $emailBody . "                value=\"brunoaco@gmail.com\" required><br>";
$emailBody = $emailBody . "            <label for=\"patientEmail\" class=\"form-label\">Patient Email: " . $patientEmail . "</label>";
//$emailBody = $emailBody . "            <input type=\"email\" class=\"form-control\" id=\"patientEmail\" name=\"patientEmail\" value=\"bruno.acosta.baraona@gmail.com\" ";
//$emailBody = $emailBody . "                required><br>";
//$emailBody = $emailBody . "            <label  id=\"patientEmail\" name=\"patientEmail\" value=\"bruno.acosta.baraona@gmail.com\" ";
//$emailBody = $emailBody . "                required><br>";
//$emailBody = $emailBody . "            <label for=\"assessmentslink\" class=\"form-label\">assessmentslink</label>";
//$emailBody = $emailBody . "                                    <input type=\"input\" class=\"form-control\" id=\"assessmentslink\" name=\"assessmentslink\" ";
//$emailBody = $emailBody . "                value=\"http://localhost/CTC%20assestment03/linkProcess.php?token=f17aacedbaf33c7e1c02b2fc4ef6a1ae98e1efac08fa04144fcb5d4853f72bb9\" required><br>";
$emailBody = $emailBody . "            <h3>Patient Health Questionnaire (PHQ-9)</h3><br>";
$emailBody = $emailBody . "            <div class=\"table-responsive\">";
$emailBody = $emailBody . "                <table class=\"table table-bordered table-striped text-center table-sm w-auto\" border=1>";
$emailBody = $emailBody . "                    <!-- Header -->";
$emailBody = $emailBody . "                    <thead class=\"table-dark\">";
$emailBody = $emailBody . "                        <tr>";
$emailBody = $emailBody . "                            <th>Over the last 2 weeks, how often have you been bothered by any of the following";
$emailBody = $emailBody . "                                problems?</th>";
$emailBody = $emailBody . "                            <th>Not at all</th>";
$emailBody = $emailBody . "                            <th>Several days</th>";
$emailBody = $emailBody . "                            <th>More than half the days</th>";
$emailBody = $emailBody . "                            <th>Nearly every day</th>";
$emailBody = $emailBody . "                        </tr>";
$emailBody = $emailBody . "                    </thead>";
$emailBody = $emailBody . "                    <!-- Body -->  ";
$emailBody = $emailBody . "    <tbody>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">1. Little interest or pleasure in doing things</td>";
$emailBody = $emailBody . "            <td>" . (($fila1 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila1 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila1 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila1 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">2. Feeling down, depressed, or hopeless</td>";
$emailBody = $emailBody . "            <td>" . (($fila2 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila2 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila2 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila2 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">3. Trouble falling or staying asleep, or sleeping too much</td>";
$emailBody = $emailBody . "            <td>" . (($fila3 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila3 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila3 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila3 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">4. Feeling tired or having little energy</td>";
$emailBody = $emailBody . "            <td>" . (($fila4 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila4 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila4 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila4 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">5. Poor appetite or overeating</td>";
$emailBody = $emailBody . "            <td>" . (($fila5 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila5 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila5 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila5 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">6. Feeling bad about yourself - or that you are a failure or have let";
$emailBody = $emailBody . "                yourself or your family down</td>";
$emailBody = $emailBody . "            <td>" . (($fila6 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila6 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila6 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila6 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">7. Trouble concentrating on things, such as reading the newspaper or";
$emailBody = $emailBody . "                watching television</td>";
$emailBody = $emailBody . "            <td>" . (($fila7 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila7 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila7 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila7 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">8. Moving or speaking so slowly that other people could have noticed?";
$emailBody = $emailBody . "                Or the opposite - being so fidgety or restless that you have been moving around a lot";
$emailBody = $emailBody . "                more than usual</td>";
$emailBody = $emailBody . "            <td>" . (($fila8 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila8 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila8 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila8 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\">9. Thoughts that you would be better off dead or of hurting yourself";
$emailBody = $emailBody . "                in some way</td>";
$emailBody = $emailBody . "            <td>" . (($fila9 == 0) ? "0" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila9 == 1) ? "1" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila9 == 2) ? "2" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "            <td>" . (($fila9 == 3) ? "3" : "&nbsp;") . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\"></td>";
$emailBody = $emailBody . "            <td>&nbsp;</td>";
$emailBody = $emailBody . "            <td>" . $oneSum . " X 1 =" . $oneSum . "</td>";
$emailBody = $emailBody . "            <td>" . $twoSum . " x 2 =" . $twoSum * 2 . "</td>";
$emailBody = $emailBody . "            <td>" . $threeSum . " x3 =" . $threeSum * 3 . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "        <tr>";
$emailBody = $emailBody . "            <td class=\"text-start\"></td>";
$emailBody = $emailBody . "            <td>&nbsp;</td>";
$emailBody = $emailBody . "            <td colspan=\"3\"> Total = " . $total . "</td>";
$emailBody = $emailBody . "        </tr>";
$emailBody = $emailBody . "    </tbody>";
$emailBody = $emailBody . "";
$emailBody = $emailBody . "</table>";
$emailBody = $emailBody . "                <p>If you checked off any problems, how difficult have these problems made it for you to do your work,";
$emailBody = $emailBody . "                    take care of things at home, or get along with other people?</p>";
$emailBody = $emailBody . "                <div class=\"d-flex gap-4\">";
$emailBody = $emailBody . "                    <div class=\"form-check\">";
$emailBody = $emailBody . "                        <input class=\"form-check-input\" type=\"checkbox\" id=\"chk1\" name=\"chk1\" " . (($chk1 == "on") ? "checked " : "") . " disabled>";
$emailBody = $emailBody . "                        <label class=\"form-check-label\" for=\"chk1\">Not difficult at all</label>";
$emailBody = $emailBody . "                    </div>";
$emailBody = $emailBody . "                    <div class=\"form-check\">";
$emailBody = $emailBody . "                        <input class=\"form-check-input\" type=\"checkbox\" id=\"chk2\" name=\"chk2\" " . (($chk2 == "on") ? "checked " : "") . " disabled>";
$emailBody = $emailBody . "                        <label class=\"form-check-label\" for=\"chk2\">Somewhat difficult </label>";
$emailBody = $emailBody . "                    </div>";
$emailBody = $emailBody . "                    <div class=\"form-check\">";
$emailBody = $emailBody . "                        <input class=\"form-check-input\" type=\"checkbox\" id=\"chk3\" name=\"chk3\" " . (($chk3 == "on") ? "checked " : "") . " disabled>";
$emailBody = $emailBody . "                        <label class=\"form-check-label\" for=\"chk3\">Very difficult </label>";
$emailBody = $emailBody . "                    </div>";
$emailBody = $emailBody . "                    <div class=\"form-check\">";
$emailBody = $emailBody . "                        <input class=\"form-check-input\" type=\"checkbox\" id=\"chk4\" name=\"chk4\" " . (($chk4 == "on") ? "checked " : "") . " disabled>";
$emailBody = $emailBody . "                        <label class=\"form-check-label\" for=\"chk4\">Extremely difficult</label>";
$emailBody = $emailBody . "                    </div>";
$emailBody = $emailBody . "                </div>";
$emailBody = $emailBody . "            </div>";
$emailBody = $emailBody . "        </form>";
$emailBody = $emailBody . "    </div>";
$emailBody = $emailBody . "    <!-- Bootstrap JS -->";
$emailBody = $emailBody . "    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>";
$emailBody = $emailBody . "</body>";
$emailBody = $emailBody . "</html>";

//echo $emailBody;

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
    $mail->addAddress($clinicianEmail);//destination//$patientEmail
    $mail->Subject = 'test with Gmail y PHP';
    //$mail->Body = '<html><body><h3>test</h3></body></html>';
    $mail->Body = $emailBody;
    $mail->IsHTML(true);       // <=== call IsHTML() after $mail->Body has been set.

    $mail->send();//this is where the magic happens
    echo "Correo enviado correctamente";
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}
?>