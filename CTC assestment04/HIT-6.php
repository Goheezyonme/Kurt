<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HIT-6 Headache Impact Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .question {
            margin-bottom: 25px;
        }

        .options label {
            display: block;
            margin: 6px 0;
            cursor: pointer;
        }

        footer {
            margin-top: 40px;
            font-size: 0.9em;
            color: #555;
        }

        .note {
            margin-top: 20px;
            padding: 15px;
            background: #eef2f5;
            border-left: 4px solid #007bff;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>HIT-6™ Headache Impact Test</h1>

        <p>
            HIT is a tool used to measure the impact headaches have on your ability to function
            on the job, at school, at home, and in social situations. Your score shows the effect
            that headaches have on normal daily life and your ability to function.
        </p>

        <p>
            This questionnaire was designed to help you describe and communicate the way you feel
            and what you cannot do because of headaches.
        </p>

        <p><strong>Instructions:</strong> Please select one answer for each question.</p>

        <form>

            <div class="question">
                <p><strong>1. When you have headaches, how often is the pain severe?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q1"> Never</label>
                    <label><input type="radio" name="q1"> Rarely</label>
                    <label><input type="radio" name="q1"> Sometimes</label>
                    <label><input type="radio" name="q1"> Very Often</label>
                    <label><input type="radio" name="q1"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>2. How often do headaches limit your ability to do usual daily activities including household
                        work, work, school, or social activities?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q2"> Never</label>
                    <label><input type="radio" name="q2"> Rarely</label>
                    <label><input type="radio" name="q2"> Sometimes</label>
                    <label><input type="radio" name="q2"> Very Often</label>
                    <label><input type="radio" name="q2"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>3. When you have a headache, how often do you wish you could lie down?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q3"> Never</label>
                    <label><input type="radio" name="q3"> Rarely</label>
                    <label><input type="radio" name="q3"> Sometimes</label>
                    <label><input type="radio" name="q3"> Very Often</label>
                    <label><input type="radio" name="q3"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>4. In the past 4 weeks, how often have you felt too tired to do work or daily activities
                        because of your headaches?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q4"> Never</label>
                    <label><input type="radio" name="q4"> Rarely</label>
                    <label><input type="radio" name="q4"> Sometimes</label>
                    <label><input type="radio" name="q4"> Very Often</label>
                    <label><input type="radio" name="q4"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>5. In the past 4 weeks, how often have you felt fed up or irritated because of your
                        headaches?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q5"> Never</label>
                    <label><input type="radio" name="q5"> Rarely</label>
                    <label><input type="radio" name="q5"> Sometimes</label>
                    <label><input type="radio" name="q5"> Very Often</label>
                    <label><input type="radio" name="q5"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>6. In the past 4 weeks, how often did headaches limit your ability to concentrate on work or
                        daily activities?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q6"> Never</label>
                    <label><input type="radio" name="q6"> Rarely</label>
                    <label><input type="radio" name="q6"> Sometimes</label>
                    <label><input type="radio" name="q6"> Very Often</label>
                    <label><input type="radio" name="q6"> Always</label>
                </div>
            </div>

        </form>

        <div class="note">
            <strong>Scoring:</strong><br>
            Never = 6 points<br>
            Rarely = 8 points<br>
            Sometimes = 10 points<br>
            Very Often = 11 points<br>
            Always = 13 points
        </div>

        <div class="note">
            <strong>Interpretation:</strong><br>
            If your HIT-6 score is 50 or higher, you should share your results with your doctor.
            Headaches that interfere with family, work, school, or social activities could be migraine.
        </div>

        <footer>
            ©2001 QualityMetric, Inc. and GlaxoSmithKline Group of Companies. All rights reserved.
        </footer>

    </div>

</body>

</html>