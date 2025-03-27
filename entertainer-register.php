<?php
include 'connection-php.php';

$entertainer="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);
    //echo "<br>";
    //die(); 

    $entertainer_name = htmlspecialchars($_POST['entertainer-name']);
    if (empty($entertainer_name)) {
    echo "entertainer-name is empty";
    } /*else {
    echo $entertainer_name."\n";
    }*/

    $entertainer_email = htmlspecialchars($_POST['entertainer-email']);
    if (empty($entertainer_email)) {
    echo "entertainer-email is empty";
    } /*else {
    echo $entertainer_email."\n";
    }*/

    $entertainer_phone = htmlspecialchars($_POST['entertainer-phone']);
    if (empty($entertainer_phone)) {
    echo "entertainer_phone is empty";
    } /*else {
    echo $entertainer_phone."\n";
    }*/

    $entertainer_website = htmlspecialchars($_POST['entertainer-website']);
    if (empty($entertainer_phone)) {
    echo "entertainer_website is empty";
    } /*else {
    echo $entertainer_website."\n";
    }*/

    $entertainer_address = htmlspecialchars($_POST['entertainer-address']);
    if (empty($entertainer_address)) {
    echo "entertainer_address is empty";
    } /*else {
    echo $entertainer_address."\n";
    }*/

    $entertainer_city = htmlspecialchars($_POST['entertainer-city']);
    if (empty($entertainer_address)) {
    echo "entertainer_address is empty";
    } /*else {
    echo $entertainer_address."\n";
    }*/

    $entertainer_postal_code = htmlspecialchars($_POST['entertainer-postal_code']);
    if (empty($entertainer_postal_code)) {
    echo "entertainer_postal_code is empty";
    } /*else {
    echo $entertainer_postal_code."\n";
    }*/

    $entertainer_genre1 = htmlspecialchars($_POST['entertainer-genre1']);
    if (empty($entertainer_genre1)) {
    echo "entertainer_genre1 is empty";
    } /*else {
    echo $entertainer_genre1."\n";
    }*/

    $entertainer_genre2 = htmlspecialchars($_POST['entertainer-genre2']);
    if (empty($entertainer_genre2)) {
    echo "entertainer_genre2 is empty";
    } /*else {
    echo $entertainer_genre2."\n";
    }*/

    $entertainer_genre3 = htmlspecialchars($_POST['entertainer-genre3']);
    if (empty($entertainer_genre3)) {
    echo "entertainer_genre3 is empty";
    } /*else {
    echo $entertainer_genre3."\n";
    }*/
    
    $entertainer_service_area = $_POST['entertainer-service_area'];
    if (empty($entertainer_service_area)) {
    echo "entertainer_service_area is empty";
    } /*else {
    print_r( $entertainer_service_area);
    }*/

    $entertainer_logo = htmlspecialchars($_POST['entertainer-logo']);
    if (empty($entertainer_logo)) {
    echo "entertainer_logo is empty";
    } /*else {
    echo $entertainer_logo."\n";
    }*/

    $entertainer_video = htmlspecialchars($_POST['entertainer-video']);
    if (empty($entertainer_video)) {
    echo "entertainer_video is empty";
    } /*else {
    echo $entertainer_video."\n";
    }*/

    $entertainer_pic1 = htmlspecialchars($_POST['entertainer-pic1']);
    if (empty($entertainer_pic1)) {
    echo "entertainer_pic1 is empty";
    } /*else {
    echo $entertainer_pic1."\n";
    }*/

    $entertainer_pic2 = htmlspecialchars($_POST['entertainer-pic2']);
    if (empty($entertainer_pic2)) {
    echo "entertainer_pic2 is empty";
    } /*else {
    echo $entertainer_pic2."\n";
    }*/

    $entertainer_pic3 = htmlspecialchars($_POST['entertainer-pic3']);
    if (empty($entertainer_pic3)) {
    echo "entertainer_pic3 is empty";
    } /*else {
    echo $entertainer_pic3."\n";
    }*/

    $entertainer_description = htmlspecialchars($_POST['entertainer-description']);
    if (empty($entertainer_description)) {
    echo "entertainer_description is empty";
    } /*else {
    echo $entertainer_description."\n";
    }*/



    
    $entertainer=$entertainer_name;

    $sql="INSERT INTO `musicians`".
    " (`name`, `logo`,`email`,".
    " `address`, `city`, `postal_code`,".
    "  `photo1`, `photo2`, `photo3`,".
    "  `description`, `genre1`, `genre2`,".
    "  `genre3`, `review_stars`, `review_desc`)".
    "  VALUES ".
    " ('".$entertainer_name."','".$entertainer_logo."', '".$entertainer_email."', ".
    " '".$entertainer_address."', '".$entertainer_city."','".$entertainer_postal_code."', ".
    " '".$entertainer_pic1."', '".$entertainer_pic2."','".$entertainer_pic3."', ".
    " '".$entertainer_description."', '".$entertainer_genre1."','".$entertainer_genre2."', ".
    " '".$entertainer_genre3."','0','')";
    
    //echo "<br>".$sql;
    //die();
 
    //$servername = $local_servername;
    //$username = $local_username;
    //$password = $local_password;
    
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


    $insert_sql="INSERT INTO `musician_areas`(`id_musician`, `id_area`) VALUES ";


    //iterate with array of areas to write the sql
    foreach($entertainer_service_area as $x => $y){
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
alert("entertainer '<?php echo $entertainer; ?>' created.");
window.location.href = "registration-PHP.php";
</script>