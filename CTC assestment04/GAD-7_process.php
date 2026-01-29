<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";



$clinicianEmail = $_POST["clinicianEmail"];
$patientEmail = $_POST["patientEmail"];
$assessmentslink = $_POST["assessmentslink"];


$oneSum = 0;
$twoSum = 0;
$threeSum = 0;

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
function evalFilas($var)
{
    global $oneSum;
    global $twoSum;
    global $threeSum;

    switch ($var) {
        case 0:
        case "0":
            break;
        case 1:
        case "1":
            $oneSum++;
            break;
        case 2:
        case "2":
            $twoSum++;
            break;
        case 3:
        case "3":
            $threeSum++;
            break;
        default:
        //echo "no vale nada!!!<br>\n";
    }

}

$one = validPost("one");// checks validity and deals with the data in the post
$two = validPost("two");
$three = validPost("three");
$four = validPost("four");
$five = validPost("five");
$six = validPost("six");
$seven = validPost("seven");


evalFilas($one);
evalFilas($two);
evalFilas($three);
evalFilas($four);
evalFilas($five);
evalFilas($six);
evalFilas($seven);

$total = $oneSum + ($twoSum * 2) + ($threeSum * 3);
echo "\$total:" . $total . "</br>";


$lvl_difficult0 = validPost("lvl_difficult0");
$lvl_difficult1 = validPost("lvl_difficult1");
$lvl_difficult2 = validPost("lvl_difficult2");
$lvl_difficult3 = validPost("lvl_difficult3");
$lvl_difficult4 = validPost("lvl_difficult4");

echo "\$lvl_difficult0:" . $lvl_difficult0 . "</br>";
echo "\$lvl_difficult1:" . $lvl_difficult1 . "</br>";
echo "\$lvl_difficult2:" . $lvl_difficult2 . "</br>";
echo "\$lvl_difficult3:" . $lvl_difficult3 . "</br>";
echo "\$lvl_difficult4:" . $lvl_difficult4 . "</br>";

$html_rtrn = " <!DOCTYPE html>" .
    "<html>" .
    "<head></head> " .
    "<body>" .
    "    <meta charset=\"UTF-8\">" .
    "    <title>Assessment Form</title>" .
    "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">" .
    "<!-- Bootstrap 5 -->" .
    "    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">" .
    "    <div class=\"container mt-4\">" .
    "        <form method=\"post\" action=\"GAD-7_process.php\" id=\"myForm\"> " .
    "           <input type=\"hidden\" class=\"form-control\" id=\"clinicianEmail\" name=\"clinicianEmail\" value=\"brunoaco@gmail.com\" required=\"\"><br> " .
    "           <input type=\"hidden\" class=\"form-control\" id=\"patientEmail\" name=\"patientEmail\" value=\"bruno.acosta.baraona@gmail.com\" required=\"\"><br>" .
    "           <input type=\"hidden\" class=\"form-control\" id=\"assessmentslink\" name=\"assessmentslink\" value=\"http://localhost/CTC%20assestment04/linkProcess.php?token=9e390c5bbaee63a55768c194b599e1bb8a0c615e766f6f961551f240cdd52b4d\" required=\"\"><br>" .
    "            <h3>General Anxiety Disorder (GAD-7)</h3><br>" .
    "            <table class=\"table table-bordered text-center align-middle\">" .
    "                <thead class=\"table-light\">" .
    "                    <tr>" .
    "                        <th class=\"text-start\" colspan=\"2\">Over the last 2 weeks, how often have you been bothered by the following problems?<br><br> " .
    "                           0: Not at all sure<br>" .
    "                           1: Several days<br>" .
    "                           2: Over half the days<br>" .
    "                           3: Nearly every day" .
    "                       </th>" .
    "                    </tr>" .
    "                </thead>" .
    "                <tbody>" .
    "               <!-- LINE 1 -->" .
    "               <tr>" .
    "                   <td class=\"text-start\">1. Feeling nervous, anxious, or on edge</td>" .
    "                   <td><label class=\"form-check-label ms-1\" for=\"one_0\">" . $one . "</label></td>" .
    "               </tr>" .
    "               <!-- LINE 2 -->" .
    "               <tr>" .
    "                   <td class=\"text-start\">2. Not being able to stop or control worrying</td>" .
    "                   <td><label class=\"form-check-label ms-1\" for=\"two_0\">" . $two . "</label></td>" .
    "               </tr>" .
    "               <!-- LINE 3 -->" .
    "               <tr>" .
    "                   <td class=\"text-start\">3. Worrying too much about different things</td>" .
    "                   <td><label class=\"form-check-label ms-1\" for=\"three_0\">" . $three . "</label></td>" .
    "               </tr>" .
    "               <!-- LINE 4 -->" .
    "               <tr>" .
    "                   <td class=\"text-start\">4. Trouble relaxing</td>" .
    "                   <td><label class=\"form-check-label ms-1\" for=\"four_0\">" . $four . "</label></td>" .
    "               </tr>" .
    "               <!-- LINE 5 -->" .
    "               <tr>" .
    "                   <td class=\"text-start\">5. Being so restless that it's hard to sit still</td>" .
    "                   <td><label class=\"form-check-label ms-1\" for=\"five_0\">" . $five . "</label></td>" .
    "               </tr>" .
    "               <!-- LINE 6 -->" .
    "               <tr>" .
    "                   <td class=\"text-start\">6. Becoming easily annoyed or irritable</td>" .
    "                   <td><label class=\"form-check-label ms-1\" for=\"six_0\">" . $six . "</label></td>" .
    "               </tr>" .
    "               <!-- LINE 7 -->" .
    "               <tr>" .
    "                   <td class=\"text-start\">7. Feeling afraid as if something awful might happen</td>" .
    "                   <td> <label class=\"form-check-label ms-1\" for=\"seven_0\">" . $seven . "</label> </td>" .
    "               </tr>" .
    "               <tr>" .
    "                   <td>Total Score</td>" .
    "                   <td>" . $total . "</td>" .
    "               </tr>" .
    "           </tbody>" .
    "       </table>" .
    "       <br><br>" .
    "       <div> If you checked off any problems, how difficult have these made it for you to do your work, take care of things at home, or get along with other people?" .
    "           <br><br>" .
    "       </div>" .
    "       <div>" .
    "           <div>";

switch ($lvl_difficult0) {
    case 0:
        $html_rtrn .=
            "               <input type=\"checkbox\" checked=\"true\">Not difficult at all<br>" .
            "               <input type=\"checkbox\" disabled>Somewhat difficult<br>" .
            "               <input type=\"checkbox\" disabled>Very difficult<br>" .
            "               <input type=\"checkbox\" disabled>Extremely difficult<br>";
        break;
    case 1:
        $html_rtrn .=
            "               <input type=\"checkbox\" disabled>Not difficult at all<br>" .
            "               <input type=\"checkbox\" checked=\"true\">Somewhat difficult<br>" .
            "               <input type=\"checkbox\" disabled>Very difficult<br>" .
            "               <input type=\"checkbox\" disabled>Extremely difficult<br>";
        break;
    case 2:

        $html_rtrn .=
            "               <input type=\"checkbox\" disabled>Not difficult at all<br>" .
            "               <input type=\"checkbox\" disabled>Somewhat difficult<br>" .
            "               <input type=\"checkbox\" checked=\"true\">Very difficult<br>" .
            "               <input type=\"checkbox\" disabled>Extremely difficult<br>";
        break;
    case 3:
        $html_rtrn .=
            "               <input type=\"checkbox\" disabled>Not difficult at all<br>" .
            "               <input type=\"checkbox\" disabled>Somewhat difficult<br>" .
            "               <input type=\"checkbox\" disabled>Very difficult<br>" .
            "               <input type=\"checkbox\" checked=\"true\"d>Extremely difficult<br>";
        break;

    default:
        $html_rtrn .=
            "               <input type=\"checkbox\" disabled>Not difficult at all<br>" .
            "               <input type=\"checkbox\" disabled>Somewhat difficult<br>" .
            "               <input type=\"checkbox\" disabled>Very difficult<br>" .
            "               <input type=\"checkbox\" disabled>Extremely difficult<br>";
}

$html_rtrn .=
    "           </div>" .
    "       </div>" .
    "   </form>" .
    "</div>" .
    "</body>" .
    "</html>" .
    " ";

echo $html_rtrn;

?>