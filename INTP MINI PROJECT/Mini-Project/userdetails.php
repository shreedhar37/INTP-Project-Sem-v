
<?php header("Content-Type: application/json; charset=UTF-8"); ?>
<?php

$obj = json_decode($_POST["user"], false);
//echo json_encode($obj->usrEmail);

// Create connection
$servername = "localhost";
$username = "id15504604_root";
$password = "Shree2018PE@!";
$dbname = "id15504604_letscipher";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$emailid=$obj->usrEmail;
//$emailid = "ralop@ertocp.com";
$output = array();

$sql = "SELECT * from user where email ='$emailid'";
//echo $sql;
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_assoc($result)) {
	$output[]=$row;
  }
$sresult = json_encode($output);
echo $sresult;

mysqli_close($conn);
?>