<?php 
error_reporting(0);
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
  <style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #000;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      color: green;
    }

    li a:hover {
      background-color: black;
    }

    #affine
  {   
      height: 3%;
      width:7%;
      border-radius: 10px;

  }

  #affine:hover{
    box-shadow: 0 12px 16px 0 rgba(5, 192, 14, 0.24),0 17px 50px 0 rgba(0,0,0,0.19); 
    background-color: green;
  }
  #ceaser
  {   
      height: 3%;
      width:7%;
      border-radius: 10px;

  }

  #ceaser:hover{
    box-shadow: 0 12px 16px 0 rgba(5, 192, 14, 0.24),0 17px 50px 0 rgba(0,0,0,0.19); 
    background-color: green;
  }
    #logout
  {   
      height: 3%;
      width:5%;
      border-radius: 10px;

  }

  #logout:hover{
    box-shadow: 0 12px 16px 0 rgba(5, 192, 14, 0.24),0 17px 50px 0 rgba(0,0,0,0.19); 
    background-color: green;
  }

  </style>
</head>

<body>
  <div class="main">
  <!-- Creating nav bar -->
    <ul>
      <li><a class="login" href="/index.html">Home</a></li>
      <li><a class="contact" href="contact.html" style="margin-left: 1000px;">Contact</a></li>
      <li><a class="aboutus" href="about.html">About Us</a></li>
    </ul>

    <b>
      <p id="heading" style="color:#039e03;margin-top:10px;">Let's C!pher</p>
    </b>

    <div class="icon-lock" style="clear: left; float: left">
      <div class="lock-top-1" style="background-color: #17ac2e"></div>
      <div class="lock-top-2"></div>
      <div class="lock-body" style="background-color: #17ac2e"></div>
      <div class="lock-hole"></div>
    </div>

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
  $uid = test_input($_POST['uid']);
  $paswd = md5(test_input($_POST['paswd']));

}

$servername = "localhost";
$username = "id15504604_root";
$password = "Shree2018PE@!";
$dbname = "id15504604_letscipher";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed; ".$conn->connect_error);
}

$query = "SELECT * from user where username=? or email=?";
$stmt= $conn->prepare($query);
$stmt->bind_param("ss",$uid,$uid);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()){
  $duid = $row['username'];
  $demail = $row['email'];
  $dpswd= $row['password'];
}

if($result->num_rows === 0)
{
 echo"<p style='margin-top:100px;color:green;text-align:center;'>Sorry no record found!! Please <a style='color:green' href='index.html'> register </a>first</p>";
 exit(0);
 $stmt->close();
$conn->close();
}

if ($dpswd!=$paswd){
  echo "<script>
  alert('Wrong Password!!');
  window.location.href='index.html';
  </script>";
}

else{

   echo"
   <div style='margin-top:100px;color:green;text-align:center;'> 
   <h1>Welcome <strong>$duid </strong></p><br><br><br><br>
   <h2>Try these algorithms:<br><br>
   <div class='same' style='text-align:center;color:green;'>
        <form action='affinecipher.php' method='POST'><br><br>
        <input type='submit' name='affine' id='affine' value='AffineCipher'>
        </form></div>
        <div class='same' style='text-align:center;color:green;'>
        <form action='ceasercipher.php' method='POST'><br><br>
        <input type='submit' name='ceaser' id='ceaser' value='CeaserCipher'>
        </form></div></h2>
   </div>";

   print ('<div style="text-align:center;color:green;">
        <form action="logout.php" method="POST"><br><br>
        <input type="submit" name="login" id="logout" value="Logout">
        </form></div>');
 }

$stmt->close();
$conn->close();

?>
</div>
</body>
</html> 