<?php


$local_servername = "localhost";
$local_username = "root";
$local_password = "mysql";

$venue="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);

    $venue_name = htmlspecialchars($_POST['venue-name']);
    if (empty($venue_name)) {
    echo "venue-name is empty";
    } /*else {
    echo $venue_name."\n";
    }*/

    $venue_email = htmlspecialchars($_POST['venue-email']);
    if (empty($venue_email)) {
    echo "venue_email is empty";
    } /*else {
    echo $venue_email."\n";
    }*/

    $venue_phone = htmlspecialchars($_POST['venue-phone']);
    if (empty($venue_phone)) {
    echo "venue_phone is empty";
    } /*else {
    echo $venue_phone."\n";
    }*/

    $venue_address = htmlspecialchars($_POST['venue-address']);
    if (empty($venue_address)) {
    echo "venue_address is empty";
    } /*else {
    echo $venue_address."\n";
    }*/

    $venue_bathrooms = htmlspecialchars($_POST['venue-bathrooms']);
    if (empty($venue_bathrooms)) {
    echo "venue_bathrooms is empty";
    } /*else {
    echo $venue_bathrooms."\n";
    }*/

    $venue_capacity = htmlspecialchars($_POST['venue-capacity']);
    if (empty($venue_capacity)) {
    echo "venue_capacity is empty";
    } /*else {
    echo $venue_capacity."\n";
    }*/

    $venue_parking = htmlspecialchars($_POST['venue-parking']);
    if (empty($venue_parking)) {
    echo "venue_parking is empty";
    } /*else {
    echo $venue_parking."\n";
    }*/

    $liquor_license = htmlspecialchars($_POST['liquor-license']);
    if (empty($liquor_license)) {
    echo "liquor_license is empty";
    } /*else {
    echo $liquor_license."\n";
    }*/

    $kitchen = htmlspecialchars($_POST['kitchen']);
    if (empty($kitchen)) {
    echo "kitchen is empty";
    } /*else {
    echo $kitchen."\n";
    }*/

    $venue_desc = htmlspecialchars($_POST['venue-desc']);
    if (empty($venue_desc)) {
    echo "venue_desc is empty";
    } /*else {
    echo $venue_desc."\n";
    }*/

    $venue_logo = htmlspecialchars($_POST['venue-logo']);
    if (empty($venue_logo)) {
    echo "venue_logo is empty";
    } /*else {
    echo $venue_logo."\n";
    }*/

    $venue_pic1 = htmlspecialchars($_POST['venue-pic1']);
    if (empty($venue_pic1)) {
    echo "venue_pic1 is empty";
    } /*else {
    echo $venue_pic1."\n";
    }*/

    $venue_pic2 = htmlspecialchars($_POST['venue-pic2']);
    if (empty($venue_pic2)) {
    echo "venue_pic2 is empty";
    } /*else {
    echo $venue_pic2."\n";
    }*/

    $venue_pic3 = htmlspecialchars($_POST['venue-pic3']);
    if (empty($venue_pic3)) {
    echo "venue_pic3 is empty";
    } /*else {
    echo $venue_pic3."\n";
    }*/
    
    $venue=$venue_name;

    $sql="INSERT INTO `venues`".
    "( `name`, `logo`,".
    " `address`, `city`, `postal_code`,".
    " `phone`, `email`, `photo1`,".
    " `photo2`, `photo3`, `description`,".
    "  `maximum_capacity`,".
    " `liquor_license`, `kitchen_available`, `bathrooms_available`,".
    " `parking_available`,`review_stars`,`review_desc`) ".
    "VALUES ".
    "('".$venue_name."','".$venue_logo."',".
    "'".$venue_address."',".
    "'','','".$venue_phone."',".
    "'".$venue_email."','".$venue_pic1."','".$venue_pic2."',".
    "'".$venue_pic3."','".$venue_desc."','".$venue_capacity."','".(($liquor_license == 'yes') ? 1 : 0)."',".
    "'".(($kitchen == 'yes') ? 1 : 0)."','".$venue_bathrooms."','".$venue_parking."',0,'')";
    
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
alert("Venue '<?php echo $venue; ?>' created.");
window.location.href = "registration-HTML.html";
</script>