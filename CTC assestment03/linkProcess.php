<?php

function clean($data)
{
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
/*

echo "<h2>GET</h2>";
echo "<pre>";
foreach ($_GET as $key => $value) {
    echo clean($key) . " => " . clean($value) . "\n";
}
echo "</pre>";*/



$pdo = new PDO("sqlite:mydatabase.db");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$token = $_GET['token'] ?? '';

//echo "token=" . $token;

if (empty($token)) {
    http_response_code(400);
    exit("Missing token.");
}

$stmt = $pdo->prepare("SELECT payload, expires_at, used FROM tokens WHERE token = ?");
$stmt->execute([$token]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    http_response_code(404);
    exit("Invalid token.");
}

if ($row['used']) {
    http_response_code(403);
    exit("Token already used.");
}

if ($row['expires_at'] && time() > (int) $row['expires_at']) {
    http_response_code(410);
    exit("Token expired.");
}

// marcar como usado (si quieres que sea uso único)
/*$mark = $pdo->prepare("UPDATE tokens SET used = 1 WHERE token = ?");//--------------------------------------------------------------
$mark->execute([$token]);
*/
$payload = json_decode($row['payload'], true);


// ahora $payload contiene los datos; puedes tratarlos como si vinieran por POST
// p.ej. popular $_POST para compatibilidad con código existente:
$_POST = $payload;

// o procesar directamente:
$clinicianEmail = $payload['clinicianEmail'] ?? [];
$patientEmail = $payload['patientEmail'] ?? '';
$assessmentslink = $payload['assessmentslink'] ?? '';
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

function linkWithTokenOnly($assessmentslink, $token, $isHref = true)
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
        if ($isHref)
            return "<a href=\"" . $newLink . "\">  assessment link </a><br>\n";
        else
            return $newLink;
    }

}
//$assessmentslink = formExtract($assessmentslink);
//echo "\nassessmentslink::" . $assessmentslink . "\n";

/*
echo "<pre>";
foreach ($payload as $key => $value) {
    echo clean($key) . " => " . clean($value) . "\n";
}
echo "</pre>";
*/

$formname = $payload["formname"];

// continúa con lógica: mostrar página, generar PDF, iniciar descarga, etc.
///echo "Token valid. assessments: " . implode(', ', $payload) . "\n";

switch ($formname) {
    case "PHQ-9.php":
        //code block
        //echo "case::PHQ-9.php";
        //header("Location: http://localhost/CTC%20assestment03/PHQ-9.php", true, 301);
        ?>
        <html>

        <body>
            <img src="Assets/Loading.gif" alt="Loading"><br>
            <form method="post" action="<?= $formname ?>" name="assessments" id="assessments">
                <!--<label for="clinicianEmail" class="form-label">Clinician Email</label>-->
                <input type="hidden" class="form-control" id="clinicianEmail" name="clinicianEmail"
                    value="<?= $clinicianEmail ?>" required><br>
                <!--<label for="patientEmail" class="form-label">Patient Email</label>-->
                <input type="hidden" class="form-control" id="patientEmail" name="patientEmail" value="<?= $patientEmail ?>"
                    required><br>
                <!--<label for="assessmentslink" class="form-label">assessmentslink</label>-->
                <?//= $assessmentslink ?>
                <?//= "<pre>" . linkWithTokenOnly($assessmentslink, $token, false) . "</pre>" ?>
                <input type="hidden" class="form-control" id="assessmentslink" name="assessmentslink"
                    value="<?= linkWithTokenOnly($assessmentslink, $token, false) ?>" required><br>
                <!--<label for="formname" class="form-label">formname</label>-->
                <input type="hidden" class="form-control" id="formname" name="formname" value="<?= $formname ?>" required><br>
                <!--<button type="submit" class="btn btn-primary">Submit</button>-->
            </form>
        </body>
        <script>
            // wait for a couple of seconds and redirect as post
            setTimeout(function () {
                document.getElementById("assessments").submit();
            }, 1000); // 5000 ms = 5 seconds
        </script>

        </html>
        <?php
        exit();
        break;
    //case label2:
    //code block;
    //break;
    //case label3:
    //code block
    //break;
    default:
        //code block
        echo "nope!";
}