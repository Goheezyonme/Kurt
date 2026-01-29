<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PGAP Assessment Measures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.5;
        }

        h1,
        h2,
        h3 {
            margin-top: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        .range-value {
            font-weight: bold;
            margin-left: 10px;
        }

        .section {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 30px;
            border-radius: 6px;
        }

        .rotate {
            transform: rotate(-90deg);
            margin-top: 50px;
        }

        label {
            display: block;
            margin: 6px 0;
        }
    </style>
    <script>
        function updateValue(id, value) {
            document.getElementById(id).textContent = value;
        }
    </script>
</head>

<body>

    <h1>PGAP – Assessment Measures</h1>

    <div class="section">
        <h2>Short-Form McGill Pain Questionnaire</h2>
        <p>Indicate the severity of the pain you experience at this moment.</p>

        <table>
            <tr>
                <th>Pain Descriptor</th>
                <th>
                    <p>
                        0 = No Pain<br>
                        1 = Mild<br>
                        2 = Discomforting<br>
                        3 = Distressing<br>
                        4 = Horrible<br>
                        5 = Excruciating
                    </p>
                </th>
            </tr>
            <tr>
                <td>Throbbing</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity1', this.value)"
                        list="tickmarks1" id="throbbing">
                    <datalist id="tickmarks1">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity1">0</span></span>

                </td>
            </tr>
            <tr>
                <td>Shooting</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity2', this.value)"
                        list="tickmarks2" id="shooting">
                    <datalist id="tickmarks2">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity2">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Stabbing</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity3', this.value)"
                        list="tickmarks3" id="stabbing">
                    <datalist id="tickmarks3">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity3">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Sharp</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity4', this.value)"
                        list="tickmarks4" id="sharp">
                    <datalist id="tickmarks4">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity4">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Cramping</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity5', this.value)"
                        list="tickmarks5" id="cramping">
                    <datalist id="tickmarks5">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity5">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Gnawing</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity6', this.value)"
                        list="tickmarks6" id="gnawing">
                    <datalist id="tickmarks6">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity6">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Hot-Burning</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity7', this.value)"
                        list="tickmarks7" id="hotburning">
                    <datalist id="tickmarks7">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity7">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Aching</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity8', this.value)"
                        list="tickmarks8" id="hotburning">
                    <datalist id="tickmarks8">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity8">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Heavy</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity9', this.value)"
                        list="tickmarks9" id="hotburning">
                    <datalist id="tickmarks9">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity9">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Tender</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity10', this.value)"
                        list="tickmarks10" id="hotburning">
                    <datalist id="tickmarks10">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity10">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Splitting</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity11', this.value)"
                        list="tickmarks11" id="hotburning">
                    <datalist id="tickmarks11">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity11">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Tiring-Exhausting</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity12', this.value)"
                        list="tickmarks12" id="hotburning">
                    <datalist id="tickmarks12">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity12">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Sickening</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity13', this.value)"
                        list="tickmarks13" id="hotburning">
                    <datalist id="tickmarks13">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity13">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Fearful</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity14', this.value)"
                        list="tickmarks14" id="hotburning">
                    <datalist id="tickmarks14">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity14">0</span></span>
                </td>
            </tr>
            <tr>
                <td>Punishing-Cruel</td>
                <td>
                    <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity15', this.value)"
                        list="tickmarks15" id="hotburning">
                    <datalist id="tickmarks15">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </datalist>
                    <span class="range-value">Value: <span id="painIntensity15">0</span></span>
                </td>
            </tr>
            <tr>
                <td rowspan="6">
                    <h3>Overall Pain Intensity</h3>
                </td>
                <td><input type='radio' name='overall' value='0'>0 = No Pain</td>

            </tr>
            <tr>
                <td><input type='radio' name='overall' value='1'>1 = Mild</td>
            </tr>
            <tr>
                <td><input type='radio' name='overall' value='2'>2 = Discomforting</td>
            </tr>
            <tr>
                <td><input type='radio' name='overall' value='3'>3 = Distressing</td>
            </tr>
            <tr>
                <td><input type='radio' name='overall' value='4'>4 = Horrible</td>
            </tr>
            <tr>
                <td><input type='radio' name='overall' value='5'>5 = Excruciating
        </table>
        <!--
        <h3>Overall Pain Intensity</h3>
        <p>
            0 = No Pain<br>
            1 = Mild<br>
            2 = Discomforting<br>
            3 = Distressing<br>
            4 = Horrible<br>
            5 = Excruciating
        </p>
        <input type="range" min="0" max="5" value="0" oninput="updateValue('painIntensity', this.value)"
            list="tickmarks">
        <datalist id="tickmarks">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </datalist>
        <span class="range-value">Value: <span id="painIntensity">0</span></span>
    -->

    </div>

    <div class="section">
        <h2>PHQ-9 – Patient Health Questionnaire</h2>
        <p>Over the last 2 weeks, how often have you been bothered by the following problems?</p>

        <table>
            <tr>
                <th>Question</th>
                <th>0 = Not at all
                    <br>1 = Several days

                    <br>2 = More than half the days
                    <br>3 = Nearly every day
                </th>
            </tr>
            <tr>
                <td>1. Little interest or pleasure in doing things</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity1', this.value)"
                        list="phqmarks1" id="phq1">
                    <datalist id="phqmarks1">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity1">0</span></span>
                </td>
            </tr>
            <tr>
                <td>2. Feeling down, depressed, or hopeless</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity2', this.value)"
                        list="phqmarks2" id="phq2">
                    <datalist id="phqmarks2">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity2">0</span></span>
                </td>
            </tr>
            <tr>
                <td>3. Trouble falling or staying asleep, or sleeping too much</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity3', this.value)"
                        list="phqmarks3" id="phq3">
                    <datalist id="phqmarks3">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity3">0</span></span>
                </td>
            </tr>
            <tr>
                <td>4. Feeling tired or having little energy</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity4', this.value)"
                        list="phqmarks4" id="phq4">
                    <datalist id="phqmarks4">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity4">0</span></span>
                </td>
            </tr>
            <tr>
                <td>5. Poor appetite or overeating</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity5', this.value)"
                        list="phqmarks5" id="phq5">
                    <datalist id="phqmarks5">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity5">0</span></span>
                </td>
            </tr>
            <tr>
                <td>6. Feeling bad about yourself, or that you are a failure</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity6', this.value)"
                        list="phqmarks6" id="phq6">
                    <datalist id="phqmarks6">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity6">0</span></span>
                </td>
            </tr>
            <tr>
                <td>7. Trouble concentrating on things</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity7', this.value)"
                        list="phqmarks7" id="phq7">
                    <datalist id="phqmarks7">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity7">0</span></span>
                </td>
            </tr>
            <tr>
                <td>8. Moving or speaking slowly or being restless</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity8', this.value)"
                        list="phqmarks8" id="phq8">
                    <datalist id="phqmarks8">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity8">0</span></span>
                </td>
            </tr>
            <tr>
                <td>9. Thoughts that you would be better off dead or of hurting yourself</td>
                <td>
                    <input type="range" min="0" max="3" value="0" oninput="updateValue('phqIntensity9', this.value)"
                        list="phqmarks9" id="phq9">
                    <datalist id="phqmarks9">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </datalist>
                    <span class="range-value">Value: <span id="phqIntensity9">0</span></span>
                </td>
            </tr>
            <tr>
                <td rowspan="4">
                    <h3>Difficulty Level</h3>
                </td>
                <td>
                    <label><input type="radio" name="difficulty" value="0"> Not difficult at all</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><input type="radio" name="difficulty" value="1"> Somewhat difficult</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><input type="radio" name="difficulty" value="2"> Very difficult</label>
                </td>

            </tr>
            <tr>
                <td>
                    <label><input type="radio" name="difficulty" value="3"> Extremely difficult</label>
                </td>
            </tr>
        </table>


    </div>

    <div class="section">
        <table>
            <tr>
                <th>
                    <h2>Disability Index</h2>
                </th>
            </tr>
            <tr>
                <td>
                    <p>Rate how disabled you are due to your health condition (0 = no disability, 10 = total
                        disability).</p>
                </td>
            </tr>
            <tr>
                <td> <label>Family / Home responsibilities</label>
                    <input type="range" min="0" max="10" value="0" oninput="updateValue('family1', this.value)" id="di1"
                        list="diList1">
                    <datalist id="diList1">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </datalist>
                    <span class="range-value">Value: <span id="family1">0</span></span>
                </td>
            </tr>
            <tr>
                <td> <label>Recreation</label>
                    <input type="range" min="0" max="10" value="0" oninput="updateValue('family2', this.value)" id="di2"
                        list="diList2">
                    <datalist id="diList2">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </datalist>
                    <span class="range-value">Value: <span id="family2">0</span></span>
                </td>
            </tr>
            <tr>
                <td> <label>Social Activity</label>
                    <input type="range" min="0" max="10" value="0" oninput="updateValue('family3', this.value)" id="di3"
                        list="diList3">
                    <datalist id="diList3">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </datalist>
                    <span class="range-value">Value: <span id="family3">0</span></span>
                </td>
            </tr>
            <tr>
                <td> <label>Occupation</label>
                    <input type="range" min="0" max="10" value="0" oninput="updateValue('family4', this.value)" id="di4"
                        list="diList4">
                    <datalist id="diList4">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </datalist>
                    <span class="range-value">Value: <span id="family4">0</span></span>
                </td>
            </tr>
            <tr>
                <td> <label>Self-care</label>
                    <input type="range" min="0" max="10" value="0" oninput="updateValue('family5', this.value)" id="di4"
                        list="diList5">
                    <datalist id="diList5">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </datalist>
                    <span class="range-value">Value: <span id="family5">0</span></span>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>



    </div>

    <div class="section">
        <table>
            <tr>
                <th>
                    <h2>FFQ-Chr</h2>
                    <p>0 = do not agree | 1 = somewhat agree | 2 = completely agree</p>
                </th>
            </tr>
            <tr>
                <td><label>1. I&apos;m afraid that I might injure myself if I exercise.</label>
                    <input type='radio' name='ffq1' value='0'> 0 </input>
                    <input type='radio' name='ffq1' value='1'> 1 </input>
                    <input type='radio' name='ffq1' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>2. My body is telling me I have something dangerously wrong.</label>
                    <input type='radio' name='ffq2' value='0'> 0 </input>
                    <input type='radio' name='ffq2' value='1'> 1 </input>
                    <input type='radio' name='ffq2' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>3. My health condition has put my body at risk for the rest of my life.</label>
                    <input type='radio' name='ffq3' value='0'> 0 </input>
                    <input type='radio' name='ffq3' value='1'> 1 </input>
                    <input type='radio' name='ffq3' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>4. It&apos;s really not safe for a person with my condition to be physically active.</label>
                    <input type='radio' name='ffq4' value='0'> 0 </input>
                    <input type='radio' name='ffq4' value='1'> 1 </input>
                    <input type='radio' name='ffq4' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>5. No one should have to exercise when he/she is not feeling well.</label>
                    <input type='radio' name='ffq5' value='0'> 0 </input>
                    <input type='radio' name='ffq5' value='1'> 1 </input>
                    <input type='radio' name='ffq5' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>6. I feel tired all the time.</label>
                    <input type='radio' name='ffq6' value='0'> 0 </input>
                    <input type='radio' name='ffq6' value='1'> 1 </input>
                    <input type='radio' name='ffq6' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>7. I never seem to have the energy I need to do things.</label>
                    <input type='radio' name='ffq7' value='0'> 0 </input>
                    <input type='radio' name='ffq7' value='1'> 1 </input>
                    <input type='radio' name='ffq7' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>8. As soon as I start something, I feel weak all over.</label>
                    <input type='radio' name='ffq8' value='0'> 0 </input>
                    <input type='radio' name='ffq8' value='1'> 1 </input>
                    <input type='radio' name='ffq8' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>9. I don&apos;t seem to have any strength in my muscles.</label>
                    <input type='radio' name='ffq9' value='0'> 0 </input>
                    <input type='radio' name='ffq9' value='1'> 1 </input>
                    <input type='radio' name='ffq9' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>10. Just getting through the day leaves me feeling completely worn out.</label>
                    <input type='radio' name='ffq10' value='0'> 0 </input>
                    <input type='radio' name='ffq10' value='1'> 1 </input>
                    <input type='radio' name='ffq10' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>

    </div>

    <div class="section">

        <table>
            <tr>
                <th>
                    <h2>CIEQ-Chr</h2>
                    <p>0 = never | 1 = sometimes | 2 = often</p>
                </th>
            </tr>
            <tr>
                <td><label>1. Most people don’t understand how severe my condition is.</label>
                    <input type='radio' name='cieq1' value='0'> 0 </input>
                    <input type='radio' name='cieq1' value='1'> 1 </input>
                    <input type='radio' name='cieq1' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>2. My life will never be the same.</label>
                    <input type='radio' name='cieq2' value='0'> 0 </input>
                    <input type='radio' name='cieq2' value='1'> 1 </input>
                    <input type='radio' name='cieq2' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>3. No one should have to live this way.</label>
                    <input type='radio' name='cieq3' value='0'> 0 </input>
                    <input type='radio' name='cieq3' value='1'> 1 </input>
                    <input type='radio' name='cieq3' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>4. I can’t believe this has happened to me.</label>
                    <input type='radio' name='cieq4' value='0'> 0 </input>
                    <input type='radio' name='cieq4' value='1'> 1 </input>
                    <input type='radio' name='cieq4' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>5. Nothing will ever make up for all that I have gone through.</label>
                    <input type='radio' name='cieq5' value='0'> 0 </input>
                    <input type='radio' name='cieq5' value='1'> 1 </input>
                    <input type='radio' name='cieq5' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>6. I become afraid that my condition will get worse.</label>
                    <input type='radio' name='cieq6' value='0'> 0 </input>
                    <input type='radio' name='cieq6' value='1'> 1 </input>
                    <input type='radio' name='cieq6' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>7. I feel I can’t stand it anymore.</label>
                    <input type='radio' name='cieq7' value='0'> 0 </input>
                    <input type='radio' name='cieq7' value='1'> 1 </input>
                    <input type='radio' name='cieq7' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td><label>8. I can’t seem to keep my condition out of my mind.</label>
                    <input type='radio' name='cieq8' value='0'> 0 </input>
                    <input type='radio' name='cieq8' value='1'> 1 </input>
                    <input type='radio' name='cieq8' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>9. There’s nothing I can do to reduce the intensity of my symptoms.</label>
                    <input type='radio' name='cieq9' value='0'> 0 </input>
                    <input type='radio' name='cieq9' value='1'> 1 </input>
                    <input type='radio' name='cieq9' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>10. I wonder whether something serious may happen.</label>
                    <input type='radio' name='cieq10' value='0'> 0 </input>
                    <input type='radio' name='cieq10' value='1'> 1 </input>
                    <input type='radio' name='cieq10' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>11. My symptoms are awful and overwhelm me.</label>
                    <input type='radio' name='cieq11' value='0'> 0 </input>
                    <input type='radio' name='cieq11' value='1'> 1 </input>
                    <input type='radio' name='cieq11' value='2'> 2 </input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>12. I worry all the time about whether my symptoms will end.</label>
                    <input type='radio' name='cieq12' value='0'> 0 </input>
                    <input type='radio' name='cieq12' value='1'> 1 </input>
                    <input type='radio' name='cieq12' value='2'> 2 </input>
                </td>
            </tr>
        </table>


    </div>

</body>

</html>