<?php


$local_servername = "localhost";
$local_username = "root";
$local_password = "mysql";

$catering="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);
    //echo "<br>";

    $catering_name = htmlspecialchars($_POST['catering-name']);
    if (empty($catering_name)) {
    echo "catering-name is empty";
    } /*else {
    echo $catering_name."\n";
    }*/

    $catering_phone = htmlspecialchars($_POST['catering-phone']);
    if (empty($catering_phone)) {
    echo "catering_phone is empty";
    } /*else {
    echo $catering_phone."\n";
    }*/

    $catering_pic1 = htmlspecialchars($_POST['catering-pic1']);
    if (empty($catering_pic1)) {
    echo "catering_pic1 is empty";
    } /*else {
    echo $catering_pic1."\n";
    }*/

    $catering_pic2 = htmlspecialchars($_POST['catering-pic2']);
    if (empty($catering_pic2)) {
    echo "catering_pic2 is empty";
    } /*else {
    echo $catering_pic2."\n";
    }*/

    $catering_pic3 = htmlspecialchars($_POST['catering-pic3']);
    if (empty($catering_pic3)) {
    echo "catering_pic3 is empty";
    } /*else {
    echo $catering_pic3."\n";
    }*/
    $catering_desc = htmlspecialchars($_POST['catering-desc']);
    if (empty($catering_desc)) {
    echo "catering_desc is empty";
    } /*else {
    echo $catering_desc."\n";
    }*/

    $catering_email = htmlspecialchars($_POST['catering-email']);
    if (empty($catering_email)) {
    echo "catering_email is empty";
    } /*else {
    echo $catering_email."\n";
    }*/

    $catering_address = htmlspecialchars($_POST['catering-address']);
    if (empty($catering_address)) {
    echo "catering_address is empty";
    } /*else {
    echo $catering_address."\n";
    }*/



    $catering_city = htmlspecialchars($_POST['catering-city']);
    if (empty($catering_city)) {
    echo "catering_city is empty";
    } /*else {
    echo $catering_city."\n";
    }*/

    $catering_postal_code = htmlspecialchars($_POST['catering-postal_code']);
    if (empty($catering_postal_code)) {
    echo "catering_postal_code is empty";
    } /*else {
    echo $catering_postal_code."\n";
    }*/

    $catering_web = htmlspecialchars($_POST['catering-web']);
    if (empty($catering_web)) {
    echo "catering_web is empty";
    } /*else {
    echo $catering_web."\n";
    }*/

    $catering_food1 = htmlspecialchars($_POST['catering-food1']);
    if (empty($catering_food1)) {
    echo "catering_food1 is empty";
    } /*else {
    echo $catering_food1."\n";
    }*/

    $catering_food2 = htmlspecialchars($_POST['catering-food2']);
    if (empty($catering_food2)) {
    echo "catering_food2 is empty";
    } /*else {
    echo $catering_food2."\n";
    }*/

    $catering_food3 = htmlspecialchars($_POST['catering-food3']);
    if (empty($catering_food3)) {
    echo "catering_food3 is empty";
    } /*else {
    echo $catering_food3."\n";
    }*/

    $catering_logo = htmlspecialchars($_POST['catering-logo']);
    if (empty($catering_logo)) {
    echo "catering_logo is empty";
    } /*else {
    echo $catering_logo."\n";
    }*/
    
    $catering_service_area = $_POST['catering-service_area'];
    if (empty($catering_service_area)) {
    echo "catering_service_area is empty";
    } /*else {
    print_r( $catering_service_area);
    }*/




    
    $catering=$catering_name;

    $sql="INSERT INTO `catering`".
    " ( `name`, `logo`, `address`, ".
    " `city`, `postal_code`, `phone`,".
    "  `email`, `photo1`, `photo2`,".
    "  `photo3`, `description`, `food1`,".
    "  `food2`, `food3`, `review_stars`,".
    "  `review_desc`,`web`) ".
    " VALUES ".
    " ('".$catering_name."','".$catering_logo."','".$catering_address."',".
    " '".$catering_city."','".$catering_postal_code."','".$catering_phone."',".
    " '".$catering_email."','".$catering_pic1."','".$catering_pic2."',".
    " '".$catering_pic3."','".$catering_desc."','".$catering_food1."',".
    " '".$catering_food2."','".$catering_food3."','0',".
    " '', '".$catering_web."')";
    
    //echo "<br>".$sql."<br>\n";
    //die();

    
 
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
    $last_id = $conn->insert_id;

    $insert_sql="INSERT INTO `catering_area`(`id_catering`, `id_area`) VALUES ";
    //tenemos el ultimo id
    //echo "<br>".$last_id."<br>\n";
    //iteramos con arreglo de areas para componer sql
    foreach($catering_service_area as $x => $y){
      //echo "x=".$x."/y=".$y;
      //echo "y=".$y."<br>";
      $insert_sql.="('".$last_id."','".$y."'),";
    }
    $insert_sql=ltrim($insert_sql );
    $insert_sql=substr($insert_sql,0,strlen($insert_sql)-1);
    $insert_sql.=";";
    //echo $insert_sql."<br>";

    $conn->query($insert_sql);

    //insertamos en tabla intermedia
    $conn->close();

    
  }
?>
<script type="text/javascript">
alert("catering '<?php echo $catering; ?>' created.");
window.location.href = "registration-PHP.php";
</script>