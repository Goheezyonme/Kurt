<?php


$local_servername = "localhost";
$local_username = "root";
$local_password = "mysql";

$transport="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);

    $transport_name = htmlspecialchars($_POST['transport-name']);
    if (empty($transport_name)) {
    echo "transport-name is empty";
    } /*else {
    echo $transport_name."\n";
    }*/

    $transport_email = htmlspecialchars($_POST['transport-email']);
    if (empty($transport_email)) {
    echo "transport_email is empty";
    } /*else {
    echo $transport_email."\n";
    }*/

    $transport_phone = htmlspecialchars($_POST['transport-phone']);
    if (empty($transport_email)) {
    echo "transport_phone is empty";
    } /*else {
    echo $transport_phone."\n";
    }*/

    $transport_location = htmlspecialchars($_POST['transport-location']);
    if (empty($transport_email)) {
    echo "transport_location is empty";
    } /*else {
    echo $transport_location."\n";
    }*/
	
	$transport_city = htmlspecialchars($_POST['transport-city']);
    if (empty($transport_city)) {
    echo "transport_city is empty";
    } /*else {
    echo $transport_city."\n";
    }*/
	
	$transport_website = htmlspecialchars($_POST['transport-website']);
    if (empty($transport_website)) {
    echo "transport_website is empty";
    } /*else {
    echo $transport_website."\n";
    }*/
	
	$transport_postalCode = htmlspecialchars($_POST['transport-postalCode']);
    if (empty($transport_postalCode)) {
    echo "transport_postalCode is empty";
    } /*else {
    echo $transport_postalCode."\n";
    }*/

    $transport_capacity = htmlspecialchars($_POST['transport-capacity']);
    if (empty($transport_capacity)) {
    echo "transport_capacity is empty";
    } /*else {
    echo $transport_capacity."\n";
    }*/

    $wheelchair_access = htmlspecialchars($_POST['wheelchair-access']);
    if (empty($wheelchair_access)) {
    echo "wheelchair_access is empty";
    } /*else {
    echo $wheelchair_access."\n";
    }*/

    $transport_desc = htmlspecialchars($_POST['transport-desc']);
    if (empty($transport_desc)) {
    echo "transport_desc is empty";
    } /*else {
    echo $transport_desc."\n";
    }*/
	
	$transport_logo = htmlspecialchars($_POST['transport-logo']);
    if (empty($transport_logo)) {
    echo "transport_logo is empty";
    } /*else {
    echo $transport_logo."\n";
    }*/

    $transport_pic1 = htmlspecialchars($_POST['transport-pic1']);
    if (empty($transport_pic1)) {
    echo "transport_pic1 is empty";
    } /*else {
    echo $transport_pic1."\n";
    }*/

    $transport_pic2 = htmlspecialchars($_POST['transport-pic2']);
    if (empty($transport_pic2)) {
    echo "transport_pic2 is empty";
    } /*else {
    echo $transport_pic2."\n";
    }*/

    $transport_pic3 = htmlspecialchars($_POST['transport-pic3']);
    if (empty($transport_pic3)) {
    echo "transport_pic3 is empty";
    } /*else {
    echo $transport_pic3."\n";
    }*/

    

    $transport=$transport_name;

    $sql="INSERT INTO `transportations`".
    " ( `name`, `logo`, `address`, ".
    " `city`, `postal_code`, `phone`, ".
    " `email`, `web`, `photo1`, `photo2`, ".
    " `photo3`, `description`, `review_stars`, ".
    " `review_desc`, `vehicle_capacities`, `wheel_chair_accessible_vehicles`) ".
    " VALUES ".
    " ('".$transport_name."','".$transport_logo."','".$transport_location."',".
    " '".$transport_city."','".$transport_postalCode."',".
    " '".$transport_phone."',".
    " '".$transport_email."','".$transport_website."',".
    " '".$transport_pic1."','".$transport_pic2."',".
    " '".$transport_pic3."','".$transport_desc."','0',".
    " '','".$transport_capacity."','".(($wheelchair_access == 'yes') ? 1 : 0)."')";


    
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
alert("transport '<?php echo $transport; ?>' created.");
window.location.href = "registration-HTML.html";
</script>