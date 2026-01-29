<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHQ-9</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
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
echo "clinicianEmail has data " . $clinicianEmail . "<br>\n";
}*/

    $patientEmail = $_POST["patientEmail"];
    if (empty($patientEmail)) {
        echo "patientEmail is empty\n";
    } /*else {
echo "patientEmail has data " . $patientEmail . "<br>\n";
}*/

    $assessmentslink = $_POST["assessmentslink"];
    if (empty($assessmentslink)) {
        echo "assessmentslink is empty\n";
    } /*else {
 echo "assessmentslink has data " . $assessmentslink . "<br>\n";
}*/
    ?>
    <div class="container mt-4">
        <form action="PHQ-9_process.php" method="post">
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
                value="<?= $assessmentslink ?>" required><br>

            <h3>Patient Health Questionnaire (PHQ-9)</h3><br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center table-sm w-auto">

                    <!-- Header -->
                    <thead class="table-dark">
                        <tr>
                            <th>Over the last 2 weeks, how often have you been bothered by any of the following
                                problems?</th>
                            <th>Not at all</th>
                            <th>Several days</th>
                            <th>More than half the days</th>
                            <th>Nearly every day</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody>
                        <tr>
                            <td class="text-start">1. Little interest or pleasure in doing things</td>
                            <td><input type="radio" name="fila1" value="0"></td>
                            <td><input type="radio" name="fila1" value="1"></td>
                            <td><input type="radio" name="fila1" value="2"></td>
                            <td><input type="radio" name="fila1" value="3"></td>
                        </tr>
                        <tr>
                            <td class="text-start">2. Feeling down, depressed, or hopeless</td>
                            <td><input type="radio" name="fila2" value="0"></td>
                            <td><input type="radio" name="fila2" value="1"></td>
                            <td><input type="radio" name="fila2" value="2"></td>
                            <td><input type="radio" name="fila2" value="3"></td>
                        </tr>
                        <tr>
                            <td class="text-start">3. Trouble falling or staying asleep, or sleeping too much</td>
                            <td><input type="radio" name="fila3" value="0"></td>
                            <td><input type="radio" name="fila3" value="1"></td>
                            <td><input type="radio" name="fila3" value="2"></td>
                            <td><input type="radio" name="fila3" value="3"></td>
                        </tr>
                        <tr>
                            <td class="text-start">4. Feeling tired or having little energy</td>
                            <td><input type="radio" name="fila4" value="0"></td>
                            <td><input type="radio" name="fila4" value="1"></td>
                            <td><input type="radio" name="fila4" value="2"></td>
                            <td><input type="radio" name="fila4" value="3"></td>
                        </tr>
                        <tr>
                            <td class="text-start">5. Poor appetite or overeating</td>
                            <td><input type="radio" name="fila5" value="0"></td>
                            <td><input type="radio" name="fila5" value="1"></td>
                            <td><input type="radio" name="fila5" value="2"></td>
                            <td><input type="radio" name="fila5" value="3"></td>
                        </tr>
                        <tr>
                            <td class="text-start">6. Feeling bad about yourself - or that you are a failure or have let
                                yourself or your family down</td>
                            <td><input type="radio" name="fila6" value="0"></td>
                            <td><input type="radio" name="fila6" value="1"></td>
                            <td><input type="radio" name="fila6" value="2"></td>
                            <td><input type="radio" name="fila6" value="3"></td>
                        </tr>
                        <tr>
                            <td class="text-start">7. Trouble concentrating on things, such as reading the newspaper or
                                watching television</td>
                            <td><input type="radio" name="fila7" value="0"></td>
                            <td><input type="radio" name="fila7" value="1"></td>
                            <td><input type="radio" name="fila7" value="2"></td>
                            <td><input type="radio" name="fila7" value="3"></td>
                        </tr>
                        <tr>
                            <td class="text-start">8. Moving or speaking so slowly that other people could have noticed?
                                Or the opposite - being so fidgety or restless that you have been moving around a lot
                                more than usual</td>
                            <td><input type="radio" name="fila8" value="0"></td>
                            <td><input type="radio" name="fila8" value="1"></td>
                            <td><input type="radio" name="fila8" value="2"></td>
                            <td><input type="radio" name="fila8" value="3"></td>
                        </tr>
                        <tr>
                            <td class="text-start">9. Thoughts that you would be better off dead or of hurting yourself
                                in some way</td>
                            <td><input type="radio" name="fila9" value="0"></td>
                            <td><input type="radio" name="fila9" value="1"></td>
                            <td><input type="radio" name="fila9" value="2"></td>
                            <td><input type="radio" name="fila9" value="3"></td>
                        </tr>
                    </tbody>

                </table>
                <p>If you checked off any problems, how difficult have these problems made it for you to do your work,
                    take care of things at home, or get along with other people?</p>

                <div class="d-flex gap-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="chk1" name="chk1">
                        <label class="form-check-label" for="chk1">Not difficult at all</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="chk2" name="chk2">
                        <label class="form-check-label" for="chk2">Somewhat difficult </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="chk3" name="chk3">
                        <label class="form-check-label" for="chk3">Very difficult </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="chk4" name="chk4">
                        <label class="form-check-label" for="chk4">Extremely difficult</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex gap-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <!--<button onclick="alert('Hello, World!' + '!!!!!!!!')" class="btn btn-primary">Click Me</button>-->

                <!-- Cancel: vuelve atrás o a una URL -->
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>