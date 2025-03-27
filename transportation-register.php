<?php
include 'connection-php.php';

$transport="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST)."<br>";
    //die();

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

    $transport_address = htmlspecialchars($_POST['transport-address']);
    if (empty($transport_address)) {
    echo "transport_address is empty";
    } /*else {
    echo $transport_address."\n";
    }*/
	
	$transport_city = htmlspecialchars($_POST['transport-city']);
    if (empty($transport_city)) {
    echo "transport_city is empty";
    } /*else {
    echo $transport_city."\n";
    }*/

	$transport_website = htmlspecialchars($_POST['transport-web']);
    if (empty($transport_website)) {
    echo "transport_website is empty";
    } /*else {
    echo $transport_website."\n";
    }*/
	
	$transport_postalCode = htmlspecialchars($_POST['transport-postal_code']);
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
    
    $transport_service_area = $_POST['transport-service_area'];
    if (empty($transport_service_area)) {
    echo "transport_service_area is empty";
    } /*else {
    print_r( $transport_service_area);
    }*/
 

    $transport=$transport_name;

    $sql="INSERT INTO `transportations`".
    " ( `name`, `logo`, `address`, ".
    " `city`, `postal_code`, `phone`, ".
    " `email`, `web`, `photo1`, `photo2`, ".
    " `photo3`, `description`, `review_stars`, ".
    " `review_desc`, `vehicle_capacities`, `wheel_chair_accessible_vehicles`) ".
    " VALUES ".
    " ('".$transport_name."','".$transport_logo."','".$transport_address."',".
    " '".$transport_city."','".$transport_postalCode."', '".$transport_phone."',".
    " '".$transport_email."','".$transport_website."',  '".$transport_pic1."','".$transport_pic2."',".
    " '".$transport_pic3."','".$transport_desc."','0',".
    " '','".$transport_capacity."','".(($wheelchair_access == 'yes') ? 1 : 0)."')";

    //echo "<br>".$sql."<br>";
    //die();

    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //echo $sql."<br>";
    $result = $conn->query($sql);
    //we obtain the last id
    $last_id = $conn->insert_id;
    //echo "<br>".$last_id."<br>\n";

    $insert_sql="INSERT INTO `transportation_area`(`id_transport`, `id_area`) VALUES ";


    //iterate with array of areas to write the sql
    foreach($transport_service_area as $x => $y){
      $insert_sql.="('".$last_id."','".$y."'),";
    }

    $insert_sql=ltrim($insert_sql );
    $insert_sql=substr($insert_sql,0,strlen($insert_sql)-1);
    $insert_sql.=";";
    //echo $insert_sql."<br>";
    //die();
    $conn->query($insert_sql);

    //insertamos en tabla intermedia
    $conn->close();
    
  }
?>
<script type="text/javascript">
alert("transport '<?php echo $transport; ?>' created.");
window.location.href = "registration-PHP.php";
</script>