<?php 
error_reporting(0);
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Home</title>
  <link rel="stylesheet" href="admin.css">
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

    #add{
  height: 3%;
      width:7%;
      border-radius: 10px;
}

#update{
  height: 3%;
      width:7%;
      border-radius: 10px;
}

#delete{
  height: 3%;
      width:7%;
      border-radius: 10px;
}

#find{
  height: 3%;
      width:7%;
      border-radius: 10px;
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

  #add:hover{
    box-shadow: 0 12px 16px 0 rgba(5, 192, 14, 0.24),0 17px 50px 0 rgba(0,0,0,0.19); 
    background-color: green;
  }
  #update:hover{
    box-shadow: 0 12px 16px 0 rgba(5, 192, 14, 0.24),0 17px 50px 0 rgba(0,0,0,0.19); 
    background-color: green;
  }
  #delete:hover{
    background-color: green;
    box-shadow: 0 12px 16px 0 rgba(5, 192, 14, 0.24),0 17px 50px 0 rgba(0,0,0,0.19); 
  }
  #find:hover{
    box-shadow: 0 12px 16px 0 rgba(5, 192, 14, 0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    background-color: green; 
  }
  

  </style>
</head>

<body>
  <div class="main">
  <!-- Creating nav bar -->
    <ul>
      <li><a class="login" href="/landing_page/Home.html">Home</a></li>
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

echo "<link rel='stylesheet' type='text/css' href='admin.css'/>";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if($_SERVER["REQUEST_METHOD"] == "POST" )
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
    exit(0);
}

$query = "SELECT * FROM admin WHERE aname=?";
$stmt= $conn->prepare($query);
$stmt->bind_param("s",$uid);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()){
  $duid = $row['aname'];
  $dpswd= $row['apass'];
}

if($result->num_rows === 0)
{
 echo"<p style='margin-top:100px;color:green;text-align:center;'>Sorry no record found!!</p>";
 exit(0);
 $stmt->close();
$conn->close();
}

if ($dpswd!=$paswd){
  echo "<script>
  alert('Wrong Password!!');
  window.location.href='admin.html';
  </script>";
}

else{
 
  echo "<link rel='stylesheet' href='admin.css'>";
  echo '<div class="same" style="margin-top:105px;text-align:center;color:green;">
        <form action="adduser.php" method="POST"><br><br>
        <input type="submit" name="add" id="add" value="Add a user">
        </form></div>';

  echo '<div class="same"  style="margin-top:10px;text-align:center;color:green;">
        <form action="updateuser.php" method="POST"><br><br>
        <input type="submit" name="update" id="update" value="Update a user">
        </form></div>';
 
  echo '<div class="same"  style="margin-top:10px;text-align:center;color:green;">
        <form action="deleteuser.php" method="POST"><br><br>
        <input type="submit" name="delete" id="delete" value="Delete a user">
        </form></div>';
   
   
   echo '<div class="same" style="margin-top:10px;text-align:center;color:green;">
        <form action="finduser.php" method="POST"><br><br>
        <input type="submit" name="find" id="find" value="Find user details">
        </form></div>';

   echo '<div class="same" style="margin-top:10px;text-align:center;">
        <form action="logout.php" method="POST"><br><br>
        <input type="submit" name="logout" id="logout" value="Logout">
        </form></div>';     
 }

$stmt->close();
$conn->close();

?>
</div>
</body>
</html> 