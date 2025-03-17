<?php


$local_servername = "localhost";
$local_username = "root";
$local_password = "mysql";

$entertainer="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //print_r($_POST);

    $entertainer_name = htmlspecialchars($_POST['entertainer-name']);
    if (empty($entertainer_name)) {
    echo "entertainer-name is empty";
    } /*else {
    echo $entertainer_name."\n";
    }*/

    $entertainer_phone = htmlspecialchars($_POST['entertainer-phone']);
    if (empty($entertainer_phone)) {
    echo "entertainer_phone is empty";
    } /*else {
    echo $entertainer_phone."\n";
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
    " (`name`, `logo`,".
    " `address`, `city`, `postal_code`,".
    "  `photo1`, `photo2`, `photo3`,".
    "  `description`, `genre1`, `genre2`,".
    "  `genre3`, `review_stars`, `review_desc`)".
    "  VALUES ".
    " ('".$entertainer_name."','','',".
    " '','','".$entertainer_pic1."',".
    " '".$entertainer_pic2."','".$entertainer_pic3."','".$entertainer_description."',".
    " 1,1,1,0,'')";
    
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
alert("entertainer '<?php echo $entertainer; ?>' created.");
window.location.href = "registration-HTML.html";
</script>