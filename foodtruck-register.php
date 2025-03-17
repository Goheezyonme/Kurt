<?php


$local_servername = "localhost";
$local_username = "root";
$local_password = "mysql";

$foodtruck="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);

    $foodtruck_name = htmlspecialchars($_POST['foodtruck-name']);
    if (empty($foodtruck_name)) {
    echo "foodtruck_name is empty";
    } /*else {
    echo $foodtruck_name."\n";
    }*/

    $foodtruck_email = htmlspecialchars($_POST['foodtruck-email']);
    if (empty($foodtruck_email)) {
    echo "foodtruck_email is empty";
    } /*else {
    echo $foodtruck_email."\n";
    }*/

    $foodtruck_phone = htmlspecialchars($_POST['foodtruck-phone']);
    if (empty($foodtruck_phone)) {
    echo "foodtruck_phone is empty";
    } /*else {
    echo $foodtruck_phone."\n";
    }*/

    $foodtruck_location = htmlspecialchars($_POST['foodtruck-location']);
    if (empty($foodtruck_location)) {
    echo "foodtruck_location is empty";
    } /*else {
    echo $foodtruck_location."\n";
    }*/

    $foodtruck_location = htmlspecialchars($_POST['foodtruck-location']);
    if (empty($foodtruck_location)) {
    echo "foodtruck_location is empty";
    } /*else {
    echo $foodtruck_location."\n";
    }*/

    $foodtruck_desc = htmlspecialchars($_POST['foodtruck-desc']);
    if (empty($foodtruck_desc)) {
    echo "foodtruck_desc is empty";
    } /*else {
    echo $foodtruck_desc."\n";
    }*/

    $foodtruck_logo = htmlspecialchars($_POST['foodtruck-logo']);
    if (empty($foodtruck_logo)) {
    echo "foodtruck_logo is empty";
    } /*else {
    echo $foodtruck_logo."\n";
    }*/

    $foodtruck_pic1 = htmlspecialchars($_POST['foodtruck-pic1']);
    if (empty($foodtruck_pic1)) {
    echo "foodtruck_pic1 is empty";
    } /*else {
    echo $foodtruck_pic1."\n";
    }*/

    $foodtruck_pic2 = htmlspecialchars($_POST['foodtruck-pic2']);
    if (empty($foodtruck_pic2)) {
    echo "foodtruck_pic2 is empty";
    } /*else {
    echo $foodtruck_pic2."\n";
    }*/

    $foodtruck_pic3 = htmlspecialchars($_POST['foodtruck-pic3']);
    if (empty($foodtruck_pic3)) {
    echo "foodtruck_pic3 is empty";
    } /*else {
    echo $foodtruck_pic3."\n";
    }*/



    $foodtruck=$foodtruck_name;

    $sql="INSERT INTO `foodtrucks`".
    " (`name`, `logo`, `address`, ".
    " `city`, `postal_code`, `phone`,".
    "  `email`, `photo1`, `photo2`, ".
    " `photo3`, `description`, `review_stars`,".
    "  `review_desc`, `food1`, `food2`, ".
    " `food3`) ".
    " VALUES ".
    " ('".$foodtruck_name."','".$foodtruck_logo."','',".
    " '','','".$foodtruck_phone."',".
    " '".$foodtruck_email."','".$foodtruck_pic1."','".$foodtruck_pic2."',".
    " '".$foodtruck_pic3."','".$foodtruck_desc."','0',".
    " '','1','1',".
    " '1')";
    
    //echo $sql;



 
    $servername = $local_servername;
    $username = $local_username;
    $password = $local_password;
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,'isotalent');
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //echo $sql."<br>";
    $result = $conn->query($sql);
    $conn->close();

    
  }
?>
<script type="text/javascript">
alert("foodtruck '<?php echo $foodtruck; ?>' created.");
window.location.href = "registration-HTML.html";
</script>