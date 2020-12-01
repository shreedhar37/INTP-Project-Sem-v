<?php 
if(!isset($_POST['ceaser'])){
  echo "<script type='text/javascript' >
  alert('you are not logged in!!');
  window.location='logout.php';
 </script>"; 

}
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="login.css">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ceaser Cipher</title>
    <link rel="stylesheet" href="ceasercipher.css">
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

      .ceaser {
        color: rgba(88, 185, 49, 0.911);
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
      <br><br><br><br>
      <div class="ceaser">
        <h1 style="text-align: center;">Caesar Cipher Converter</h1><br>
        <div class="info" style="text-align: center;">
          <p><b>The Caesar Cipher was developed by the Roman Emperor Julius Caesar.</b><br><br>The Caesar Cipher
            technique is one of the earliest and simplest method of encryption technique.<br><br>It’s simply a type of
            substitution cipher, i.e., each letter of a given text is replaced by a letter some fixed number of
            positions down the alphabet. <br><br>For example with a shift of 1, A would be replaced by B, B would become
            C, and so on. The method is apparently named after Julius Caesar, who apparently used it to communicate with
            his officials.
            <br><br>Thus to cipher a given text we need an integer value, known as shift which indicates the number of
            position each letter of the text has been moved down.
            The encryption can be represented using modular arithmetic by first transforming the letters into numbers,
            according to the scheme, A = 0, B = 1,…, Z = 25. Encryption of a letter by a shift n can be described
            mathematically as.<br>
            <br>
            E_n(x)=(x+n)mod\ 26
            (Encryption Phase with shift n)
            <br>
            D_n(x)=(x-n)mod\ 26
            (Decryption Phase with shift n)<br><br>
            <h2>Algorithm for Caesar Cipher:</h2><br>
            <h3>Input:</h3>
            A String of lower case letters, called Text.
            An Integer between 0-25 denoting the required shift.
            <br><br>
            <h3>Procedure:</h3><br>
            1.Traverse the given text one character at a time .<br>
            2.For each character, transform the given character as per the rule, depending on whether we’re encrypting
            or decrypting the text.<br>
            3.Return the new string generated.<br><br>
            <h3>Example:</h3><br>
            <strong>Plaintext:</strong> defend the east wall of the castle<br><br>
            <strong>Key: 1</strong><br><br>
            <strong>Ciphertext:</strong> efgfoe uif fbtu xbmm pg uif dbtumf
          </p><br>
          <div>
            <p>
              <h2>Implmentation:</h2>Just one thing: this is not the final version so <strong style="color:red">do not
                  enter numbers and symbols</strong> in the textbox! (only alphabet allowed)
            </p>

            <script language="JavaScript">
              function c_ciph() {
                var f = document.getElementById("key").value;
                var x = document.getElementById("myTextArea").value;
                var key1 = Number(f)
                console.log(key1);
                var result = '';
                for (var i = 0, len = x.length; i < len; i++) {
                  if (x[i] == x[i].toUpperCase()) {
                    var a = x[i].charCodeAt(0);
                    var e = (((a - 65 + key1) % 26) + 97);
                    result = result + String.fromCharCode(e).toUpperCase();
                  } else if (x[i] == x[i].toLowerCase()) {
                    var a = x[i].charCodeAt(0);
                    var e = (((a - 97 + key1) % 26) + 97);
                    result = result + String.fromCharCode(e);
                  } else {
                    result = result + x[i];
                  }
                }
                document.getElementById('result').value = result;
              }
            </script>
            <br>
            <textarea id="myTextArea" rows="4" cols="50">
</textarea>
          </div class="input">

          <div class="user">
            <br><label><strong>Key</strong></label>
            <input type="number" id="key" value="text here" />

            <button onclick="c_ciph()" style="color:green;border-radius:2px;width:4%;">Convert</button>
          </div>

          <div class="resulta">
            <br>
            <textarea id="result" rows="4" cols="50">
  </textarea>
          </div>
        </div>
      </div>
  </body>

  </html>