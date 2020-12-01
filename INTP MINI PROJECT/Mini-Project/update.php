<?php
session_start();
if(!isset($_POST['update'])){
  echo "<script type='text/javascript'>location.href='logout.php';</script>";
  exit(0);
}
?>
 <html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update"</title>
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
            location.href="updateuser.php";
            </script>';
    }

    if(empty($email) or (!filter_var($email, FILTER_VALIDATE_EMAIL))){
      echo "<script type='text/javascript'>
      alert('e-mail cannot be empty or Invalid e-mail address!!');
      window.location.href='updateuser.php';
      </script>";
    }
    

    if(empty($pswd) or ($pswd===null or $pswd==="" or $pswd===" ")){
        echo "<script>
        alert('password is required!!');
        window.location.href='updateuser.php';
        </script>";
    }

    if($pswd!= $cpswd){
        echo "<script>
        alert('confirm password doesn't match!!');
        window.location.href='updateuser.php';
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



$query = "SELECT * from user where username=?";
$stmt= $conn->prepare($query);
$stmt->bind_param("s",$uname);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 0)
  {
    $stmt->close();
    $conn->close(); 
    echo"<script type='text/javascript'>
    alert('Unable to update the record please check username!!');
    window.location.href='updateuser.php';
    </script>";
  }

$pswd = md5($pswd); //encrypting password using md5() 
$sql="UPDATE user SET email='$email', password='$pswd' WHERE username='$uname'";
if($conn->query($sql)===TRUE){
    echo"<p style='margin-top:100px;color:green;text-align:center;'>Record Updated Sucessfully.</p>";
}
else{   
    $conn->close(); 
    echo"<script type='text/javascript'>
    alert('Something went wrong');
    window.location.href='updateuser.php';
    </script>";
}

$conn->close();
?>

</div>
</body>
</html> 