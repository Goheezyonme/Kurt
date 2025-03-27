<?php
include 'connection-php.php';

$foodtruck="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);
    //die();


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

    $foodtruck_address = htmlspecialchars($_POST['foodtruck-address']);
    if (empty($foodtruck_address)) {
    echo "foodtruck_address is empty";
    } /*else {
    echo $foodtruck_address."\n";
    }*/

    $foodtruck_city = htmlspecialchars($_POST['foodtruck-city']);
    if (empty($foodtruck_city)) {
    echo "foodtruck_city is empty";
    } /*else {
    echo $foodtruck_city."\n";
    }*/

    $foodtruck_web = htmlspecialchars($_POST['foodtruck-web']);
    if (empty($foodtruck_web)) {
    echo "foodtruck_web is empty";
    } /*else {
    echo $foodtruck_web."\n";
    }*/

    $foodtruck_postal_code = htmlspecialchars($_POST['foodtruck-postal_code']);
    if (empty($foodtruck_postal_code)) {
    echo "foodtruck_postal_code is empty";
    } /*else {
    echo $foodtruck_postal_code."\n";
    }*/

    $foodtruck_food1 = htmlspecialchars($_POST['foodtruck-food1']);
    if (empty($foodtruck_food1)) {
    echo "foodtruck_food1 is empty";
    } /*else {
    echo $foodtruck_food1."\n";
    }*/

    $foodtruck_food2 = htmlspecialchars($_POST['foodtruck-food2']);
    if (empty($foodtruck_food2)) {
    echo "foodtruck_food2 is empty";
    } /*else {
    echo $foodtruck_food2."\n";
    }*/

    $foodtruck_food3 = htmlspecialchars($_POST['foodtruck-food3']);
    if (empty($foodtruck_food3)) {
    echo "foodtruck_food3 is empty";
    } /*else {
    echo $foodtruck_food3."\n";
    }*/

    $foodtruck_service_area = $_POST['foodtruck-service_area'];
    if (empty($foodtruck_service_area)) {
    echo "foodtruck_service_area is empty";
    } /*else {
      print_r( $foodtruck_service_area)."\n";
    }*/


    $foodtruck=$foodtruck_name;

    $sql="INSERT INTO `foodtrucks`  ".
    " (`name`, `logo`, `address`,  ".
    "  `city`, `postal_code`, `phone`,  ".
    "  `email`,`web`, `photo1`,  ".
    "  `photo2`, `photo3`, `description`,  ".
    "  `review_stars`,`review_desc`, `food1`,  ".
    " `food2`, `food3`)  ".
    " VALUES ".
    " ('".$foodtruck_name."','".$foodtruck_logo."','".$foodtruck_address."', ".
    " '".$foodtruck_city."','".$foodtruck_postal_code."','".$foodtruck_phone."', ".
    " '".$foodtruck_email."','".$foodtruck_web."', '".$foodtruck_pic1."', ".
    " '".$foodtruck_pic2."', '".$foodtruck_pic3."','".$foodtruck_desc."', ".
    " '0', '','".$foodtruck_food1."', ".
    " '".$foodtruck_food2."', '".$foodtruck_food3."')";
    
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


    $insert_sql="INSERT INTO `foodtruck_area`(`id_foodtruck`, `id_area`) VALUES ";


    //iterate with array of areas to write the sql
    foreach($foodtruck_service_area as $x => $y){
      $insert_sql.="('".$last_id."','".$y."'),";
    }

    $insert_sql=ltrim($insert_sql );
    $insert_sql=substr($insert_sql,0,strlen($insert_sql)-1);
    $insert_sql.=";";
    //echo "<br>".$insert_sql."<br>";
    //die();
    $conn->query($insert_sql);

    //insertamos en tabla intermedia
    $conn->close();

    
  }
?>
<script type="text/javascript">
alert("foodtruck '<?php echo $foodtruck; ?>' created.");
window.location.href = "registration-PHP.php";
</script>