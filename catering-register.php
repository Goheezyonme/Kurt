<?php


$local_servername = "localhost";
$local_username = "root";
$local_password = "mysql";

$catering="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);


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


    
    $catering=$catering_name;

    $sql="INSERT INTO `catering`".
    " ( `name`, `logo`, `address`, ".
    " `city`, `postal_code`, `phone`,".
    "  `email`, `photo1`, `photo2`,".
    "  `photo3`, `description`, `food1`,".
    "  `food2`, `food3`, `review_stars`,".
    "  `review_desc`) ".
    " VALUES ".
    " ('".$catering_name."','','',".
    " '','','".$catering_phone."',".
    " '','".$catering_pic1."','".$catering_pic2."',".
    " '".$catering_pic3."','".$catering_desc."','1',".
    " '1','1','0',".
    " '')";
    
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
alert("catering '<?php echo $catering; ?>' created.");
window.location.href = "registration-HTML.html";
</script>