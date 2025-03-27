<?php
include 'connection-php.php';


$accomodation="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);
    //die();
    

    
    $accomodation_name = htmlspecialchars($_POST['accomodation-name']);
    if (empty($accomodation_name)) {
    echo "accomodation-name is empty";
    } /*else {
    echo $accomodation_name."\n";
    }*/
    
    $accomodation_phone = htmlspecialchars($_POST['accomodation-phone']);
    if (empty($accomodation_phone)) {
    echo "accomodation_phone is empty";
    } /*else {
    echo $accomodation_phone."\n";
    }*/
    
    $accomodation_address = htmlspecialchars($_POST['accomodation-address']);
    if (empty($accomodation_address)) {
    echo "accomodation_address is empty";
    } /*else {
    echo $accomodation_address."\n";
    }*/
	
	$accomodation_city = htmlspecialchars($_POST['accomodation-city']);
    if (empty($accomodation_city)) {
    echo "accomodation_city is empty";
    } /*else {
    echo $accomodation_city."\n";
    }*/
	
	$accomodation_website = htmlspecialchars($_POST['accomodation-web']);
    if (empty($accomodation_website)) {
    echo "accomodation_website is empty";
    } /*else {
    echo $accomodation_website."\n";
    }*/
	
	$accomodation_email = htmlspecialchars($_POST['accomodation-email']);
    if (empty($accomodation_email)) {
    echo "accomodation_email is empty";
    } /*else {
    echo $accomodation_email."\n";
    }*/
	
	$accomodation_postalCode = htmlspecialchars($_POST['accomodation-postal_code']);
    if (empty($accomodation_postalCode)) {
    echo "accomodation_postalCode is empty";
    } /*else {
    echo $accomodation_postalCode."\n";
    }*/
    
    $accomodation_rooms = htmlspecialchars($_POST['accomodation-rooms']);
    if (empty($accomodation_rooms)) {
    echo "accomodation_rooms is empty";
    } /*else {
    echo $accomodation_rooms."\n";
    }*/
    
    $accomodation_desc = htmlspecialchars($_POST['accomodation-desc']);
    if (empty($accomodation_desc)) {
    echo "accomodation_desc is empty";
    } /*else {
    echo $accomodation_desc."\n";
    }*/

    $accomodation_logo = htmlspecialchars($_POST['accomodation-logo']);
    if (empty($accomodation_logo)) {
    echo "accomodation_logo is empty";
    } /*else {
    echo $accomodation_logo."\n";
    }*/
    
    $accomodation_pic1 = htmlspecialchars($_POST['accomodation-pic1']);
    if (empty($accomodation_pic1)) {
    echo "accomodation_pic1 is empty";
    } /*else {
    echo $accomodation_pic1."\n";
    }*/
    
    $accomodation_pic2 = htmlspecialchars($_POST['accomodation-pic2']);
    if (empty($accomodation_pic2)) {
    echo "accomodation_pic2 is empty";
    } /*else {
    echo $accomodation_pic2."\n";
    }*/
    
    $accomodation_pic3 = htmlspecialchars($_POST['accomodation-pic3']);
    if (empty($accomodation_pic3)) {
    echo "accomodation_pic3 is empty";
    } /*else {
    echo $accomodation_pic3."\n";
    }*/


    $accomodation=$accomodation_name;

    $sql="INSERT INTO `accommodations`".
    " ( `name`, `logo`, `address`, ".
    " `city`, `postal_code`, `phone`, ".
    " `email`, `web`, `photo1`, `photo2`, ".
    " `photo3`, `description`, `review_stars`, ".
    " `review_desc`, `num_rooms`) ".
    " VALUES ".
    " ('".$accomodation_name."','".$accomodation_logo."','".$accomodation_address."',".
    " '".$accomodation_city."','".$accomodation_postalCode."', '".$accomodation_phone."',".
    " '".$accomodation_email."','".$accomodation_website."', '".$accomodation_pic1."','".$accomodation_pic2."',".
    " '".$accomodation_pic3."','".$accomodation_desc."','0',".
    " '".$accomodation_desc."','".$accomodation_rooms."')";

    
    //echo $sql;
    //die();

    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    
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
alert("accomodation '<?php echo $accomodation; ?>' created.");
window.location.href = "registration-PHP.php";
</script>