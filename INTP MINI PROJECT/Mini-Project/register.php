<?php  
error_reporting(0);
?>
 <html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration"</title>
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
  </style>
</head>

<body>
  <div class="main">
  <!-- Creating nav bar -->
  
    <ul>
      <li><a class="login" href="/index.html">Home</a></li>      
      <li><a class="login" href="index.html">Log-In / Register</a></li>
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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
  $uname = test_input($_POST['uname']);
  $email = test_input($_POST['email']);
  $pswd = test_input($_POST['pswd']);
  $cpswd = test_input($_POST['cpswd']);

  
  if(empty($uname) or ($uname===null or $uname==="" or $uname===" "))
  {
    
      echo '<script type="text/javascript">
            alert("User Id is required!!");
            location.href="index.html";
            </script>';
    }

    if(empty($email) or (!filter_var($email, FILTER_VALIDATE_EMAIL))){
      echo "<script type='text/javascript'>
      alert('e-mail cannot be empty or Invalid e-mail address!!');
      window.location.href='index.html';
      </script>";
    }
    

    if(empty($pswd) or ($pswd===null or $pswd==="" or $pswd===" ")){
        echo "<script>
        alert('password is required!!');
        window.location.href='index.html';
        </script>";
    }

    if($pswd!= $cpswd){
        echo "<script>
        alert('confirm password doesn't match!!');
        window.location.href='index.html';
        </script>";
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


$servername = "localhost";
$username = "id15504604_root";
$password = "Shree2018PE@!";
$dbname = "id15504604_letscipher";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed; ".$conn->connect_error);
}

$query = "SELECT * from user where email=?";
$stmt= $conn->prepare($query);
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()){
  $demail = $row['email'];
}

if ($demail == $email){
  echo"<p style='margin-top:100px;color:green;text-align:center;'>Sorry this $email is already registered!! please <a style='color:green' href='index.html'>register again</a> with different email or <a style='color:green' href='index.html'>login</a></p>";  
  $conn->close();
  exit(0);
}


$pswd = md5($pswd); //encrypting password using md5() 
$sql="INSERT INTO user (username,email,password) VALUES ('$uname','$email','$pswd')";

if($conn->query($sql)===TRUE){
    echo"<p style='margin-top:100px;color:green;text-align:center;'>New record created successfully. Now  <a style='color:green' href='index.html'>login</a></p>";
}else{
    echo"<p style='margin-top:100px;color:green;text-align:center;'>Sorry $uname is already taken!! please <a style='color:green' href='index.html'>register again</a> with different username</p>";
}

$conn->close();
?>

</div>
</body>
</html> 