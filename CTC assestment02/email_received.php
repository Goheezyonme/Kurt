<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assessment Docs</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <p>Dear Clinician:</p>
    <p>These are the results for PHQ-9 delivered by [patient E-mail]:</p>

    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center table-sm w-auto">

            <!-- Header -->
            <thead class="table-dark">
                <tr>
                    <th>Over the last 2 weeks, how often have you been bothered by any of the following problems?</th>
                    <th>Response</th>
                </tr>
            </thead>

            <!-- Body -->
            <tbody>
                <tr>
                    <td  class="text-start">1. Little interest or pleasure in doing things</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td class="text-start">2. Feeling down, depressed, or hopeless</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td class="text-start">3. Trouble falling or staying asleep, or sleeping too much</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td class="text-start">4. Feeling tired or having little energy</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="text-start">5. Poor appetite or overeating</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="text-start">6. Feeling bad about yourself - or that you are a failure or have let
                    yourself or your family down</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="text-start">7. Trouble concentrating on things, such as reading the newspaper or
                    watching television</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="text-start">8. Moving or speaking so slowly that other people could have noticed? Or the opposite - being so fidgety or restless that you have been moving around a lot more than usual</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="text-start">9. Thoughts that you would be better off dead or of hurting yourself in some way</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td class="text-end">Total Score: </td>
                    <td>6</td>
                </tr>
            </tbody>

        </table> 
        <p>If you checked off any problems, how difficult have these problems made it for you to do your work, take care of things at home, or get along with other people?</p>

        <div class="d-flex gap-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="chk1">
                <label class="form-check-label" for="chk1">Not difficult at all</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="chk2">
                <label class="form-check-label" for="chk2">Somewhat difficult </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="chk3">
                <label class="form-check-label" for="chk3">Very difficult </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="chk4">
                <label class="form-check-label" for="chk4">Extremely difficult</label>
            </div>
        </div>
    </div>

    <br>
    <p>Creative Terapy Consulttants</p>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
