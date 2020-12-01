<?php
if(!isset($_POST['find'])){
  echo "<script type='text/javascript'>location.href='logout.php';</script>";
  exit(0);
}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="finduser.css">
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

if(!isset($_POST['find'])){
  echo "<script type='text/javascript'>alert('Your are not logged in');
  location.href='admin.html';
  </script>";
  
}

echo "<script type='text/javascript'>
   function getUser() {
    usrEmailID = document.getElementById('usrEmailID').value;
    if (usrEmailID == ''){
       return
    }
    var obj = {usrEmail: usrEmailID};
    console.log(usrEmailID);
    var userJSON = JSON.stringify(obj);
    
    var UserName ='';
    var Email = '';
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
     if (this.readyState==4 && this.status==200) {
         myObj = JSON.parse(this.responseText); 
         console.log(myObj);
         if (myObj.length === 0) { 
             UserName += 'No record found';
             Email += 'No record found';
         }
         else{
         for (x in myObj) { 
             UserName += myObj[x].username +'<br>';
             Email += myObj[x].email + '<br>'; 
         } 
         }
         document.getElementById('userName').innerHTML = UserName;
         document.getElementById('Email').innerHTML = Email;
          
       
     }
    }
    xmlhttp.open('POST','userdetails.php',true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); 
    console.log(userJSON);
    xmlhttp.send('user=' + userJSON ); 
    }
   </script>    
<div style='margin-top:100px;color:green;text-align:center;'>
<h2>Enter user Email-Id:</h2><br>
<input type='text' name='usrEmailID' id ='usrEmailID'>
<br/><br/>
<input type='button' id='cbtn' onclick='getUser();' value='Find'/>
</div>
<div>
<br><br>
<table border='2' style='text-align:center;'>
<tbody>
<tr> 
    <th>Username</th>
    <th>Email</th>
</tr> 
<tr>
    <td id='userName'></td>
    <td id='Email'></td>
</tr>
</tbody>
</table> 
</div>
</div>";

?>
</div>
</body>
</html> 