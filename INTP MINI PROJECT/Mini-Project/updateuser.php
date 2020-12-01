<?php
if(!isset($_POST['update'])){
  echo "<script type='text/javascript'>location.href='logout.php';</script>";
  exit(0);
}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update user</title>
  <link rel="stylesheet" href="adduser.css">
  <script type="text/javascript" src="login.js"></script>
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
      <li><a class="login" href="/Mini-Project/landing_page/Home.html">Home</a></li>
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

echo "<div class='form1' >
<form id='register' name='reg' action='update.php' class='input_group' method='POST' onsubmit='return validateReg()'>
<input type='text' class='input_field' placeholder='USER ID' name='uname' required>
<input type='email' class='input_field' placeholder='EMAIL ID' name='email' required>
<input type='password' class='input_field' placeholder='PASSWORD' name='pswd' required>
<input type='password' class='input_field' placeholder='CONFIRM PASSWORD' name='cpswd'> <br><br>
<button type='submit' class='submit_btn' name='add'>Update</button>
</form>
</div>
";
?>

</div>
</body>
</html>


