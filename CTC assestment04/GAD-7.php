<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Assessment Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php

    /*
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    */

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

        <form method="post" action="GAD-7_process.php" id="myForm">

            <input type="hidden" class="form-control" id="clinicianEmail" name="clinicianEmail"
                value="<?= $clinicianEmail ?>" required><br>
            <input type="hidden" class="form-control" id="patientEmail" name="patientEmail" value="<?= $patientEmail ?>"
                required><br>
            <input type="hidden" class="form-control" id="assessmentslink" name="assessmentslink"
                value="<?= $assessmentslink ?>" required><br>

            <h3>General Anxiety Disorder (GAD-7)</h3><br>

            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-start" colspan="5">Over the last 2 weeks, how often have you been
                            bothered by the following problems?<br><br>
                            0: Not at all sure<br>
                            1: Several days<br>
                            2: Over half the days<br>
                            3: Nearly every day</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- LINE 1 -->
                    <tr>
                        <td class="text-start">1. Feeling nervous, anxious, or on edge</td>
                        <td><input type="radio" name="one" id="one_0" value="0"><label class="form-check-label ms-1"
                                for="one_0">0</label></td>
                        <td><input type="radio" name="one" id="one_1" value="1"><label class="form-check-label ms-1"
                                for="one_1">1</label></td>
                        <td><input type="radio" name="one" id="one_2" value="2"><label class="form-check-label ms-1"
                                for="one_2">2</label></td>
                        <td><input type="radio" name="one" id="one_3" value="3"><label class="form-check-label ms-1"
                                for="one_3">3</label></td>
                    </tr>

                    <!-- LINE 2 -->
                    <tr>
                        <td class="text-start">2. Not being able to stop or control worrying</td>
                        <td><input type="radio" name="two" id="two_0" value="0"><label class="form-check-label ms-1"
                                for="two_0">0</label></td>
                        <td><input type="radio" name="two" id="two_1" value="1"><label class="form-check-label ms-1"
                                for="two_1">1</label></td>
                        <td><input type="radio" name="two" id="two_2" value="2"><label class="form-check-label ms-1"
                                for="two_2">2</label></td>
                        <td><input type="radio" name="two" id="two_3" value="3"><label class="form-check-label ms-1"
                                for="two_3">3</label></td>
                    </tr>

                    <!-- LINE 3 -->
                    <tr>
                        <td class="text-start">3. Worrying too much about different things</td>
                        <td><input type="radio" name="three" id="three_0" value="0"><label class="form-check-label ms-1"
                                for="three_0">0</label></td>
                        <td><input type="radio" name="three" id="three_1" value="1"><label class="form-check-label ms-1"
                                for="three_1">1</label></td>
                        <td><input type="radio" name="three" id="three_2" value="2"><label class="form-check-label ms-1"
                                for="three_2">2</label></td>
                        <td><input type="radio" name="three" id="three_3" value="3"><label class="form-check-label ms-1"
                                for="three_3">3</label></td>
                    </tr>

                    <!-- LINE 4 -->
                    <tr>
                        <td class="text-start">4. Trouble relaxing</td>
                        <td><input type="radio" name="four" id="four_0" value="0"><label class="form-check-label ms-1"
                                for="four_0">0</label></td>
                        <td><input type="radio" name="four" id="four_1" value="1"><label class="form-check-label ms-1"
                                for="four_1">1</label></td>
                        <td><input type="radio" name="four" id="four_2" value="2"><label class="form-check-label ms-1"
                                for="four_2">2</label></td>
                        <td><input type="radio" name="four" id="four_3" value="3"><label class="form-check-label ms-1"
                                for="four_3">3</label></td>
                    </tr>

                    <!-- LINE 5 -->
                    <tr>
                        <td class="text-start">5. Being so restless that it's hard to sit still</td>
                        <td><input type="radio" name="five" id="five_0" value="0"><label class="form-check-label ms-1"
                                for="five_0">0</label></td>
                        <td><input type="radio" name="five" id="five_1" value="1"><label class="form-check-label ms-1"
                                for="five_1">1</label></td>
                        <td><input type="radio" name="five" id="five_2" value="2"><label class="form-check-label ms-1"
                                for="five_2">2</label></td>
                        <td><input type="radio" name="five" id="five_3" value="3"><label class="form-check-label ms-1"
                                for="five_3">3</label></td>
                    </tr>

                    <!-- LINE 6 -->
                    <tr>
                        <td class="text-start">6. Becoming easily annoyed or irritable</td>
                        <td><input type="radio" name="six" id="six_0" value="0"><label class="form-check-label ms-1"
                                for="six_0">0</label></td>
                        <td><input type="radio" name="six" id="six_1" value="1"><label class="form-check-label ms-1"
                                for="six_1">1</label></td>
                        <td><input type="radio" name="six" id="six_2" value="2"><label class="form-check-label ms-1"
                                for="six_2">2</label></td>
                        <td><input type="radio" name="six" id="six_3" value="3"><label class="form-check-label ms-1"
                                for="six_3">3</label></td>
                    </tr>

                    <!-- LINE 7 -->
                    <tr>
                        <td class="text-start">7. Feeling afraid as if something awful might
                            happen</td>
                        <td><input type="radio" name="seven" id="seven_0" value="0">
                            <label class="form-check-label ms-1" for="seven_0">0</label>
                        </td>
                        <td><input type="radio" name="seven" id="seven_1" value="1">
                            <label class="form-check-label ms-1" for="seven_1">1</label>
                        </td>
                        <td><input type="radio" name="seven" id="seve_2" value="2">
                            <label class="form-check-label ms-1" for="seven_2">2</label>
                        </td>
                        <td><input type="radio" name="seven" id="seve_3" value="3">
                            <label class="form-check-label ms-1" for="seven_3">3</label>
                        </td>
                    </tr>
                    <!--

                    <tr>
                        <td class="text-start">Add the score for </td>
                        <td>0</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                    </tr>-->

                </tbody>
            </table><br><br>
            <div>
                If you checked off any problems, how difficult have these made it for you to do your work, take
                care of things at home, or get along with other people?<br><br>
            </div>
            <div>
                <div>
                    <input type="checkbox" id="lvl_difficult0" name="lvl_difficult0" value="0">
                    <label for="lvl_difficult0">Not difficult at all</label>
                </div>
                <div>
                    <input type="checkbox" id="lvl_difficult1" name="lvl_difficult1" value="1">
                    <label for="lvl_difficult1">Somewhat difficult</label>
                </div>
                <div>
                    <input type="checkbox" id="lvl_difficult2" name="lvl_difficult2" value="2">
                    <label for="lvl_difficult2">Very difficult</label>
                </div>
                <div>
                    <input type="checkbox" id="lvl_difficult4" name="lvl_difficult4" value="4">
                    <label for="lvl_difficult4">Extremely difficult</label>
                </div>

            </div>
            <div class="mt-4 d-flex gap-3">
                <button type="submit" class="btn btn-primary">Submit</button>

                <!-- Cancel: vuelve atrás o a una URL -->
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('myForm').reset()">
                    Cancel
                </button>
            </div>

        </form>

    </div>

</body>

</html>