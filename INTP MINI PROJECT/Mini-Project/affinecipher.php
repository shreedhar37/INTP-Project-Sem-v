<?php 
 
if(!isset($_POST['affine'])){
  echo "<script type='text/javascript' >
          alert('you are not logged in!!');
          window.location='logout.php';
         </script>"; 

}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="login.css">

<body>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Affine Cipher</title>
        <link rel="stylesheet" href="affinecipher.css">
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

            .affine {
                color: rgba(88, 185, 49, 0.911);
            }
        </style>

        <script type="text/javascript">
            function Encrypt(f) {
                var word, newword, code, newcode, newletter
                var addkey, multkey
                word = f.p.value
                word = word.toLowerCase()
                word = word.replace(/\W/g, "")
                addkey = 0

                for (i = 0; i < f.add.options.length; i++) {
                    addkey = addkey + (f.add.options[i].text) * (f.add.options[i].selected)
                }

                multkey = 0

                for (i = 0; i < f.mult.options.length; i++) {
                    multkey = multkey + (f.mult.options[i].text) * (f.mult.options[i].selected)
                }

                newword = ""

                for (i = 0; i < word.length; i++) {
                    code = word.charCodeAt(i) - 97
                    newcode = ((multkey * code + addkey) % 26) + 97
                    newletter = String.fromCharCode(newcode)
                    newword = newword + newletter
                }

                f.c.value = newword + " "
            }

            function Decrypt(f) {
                var word, newword, code, newcode, newletter
                var addkey, multkey, multinverse

                word = f.c.value
                word = word.toLowerCase()
                word = word.replace(/\W/g, "")
                addkey = 0

                for (i = 0; i < f.add.options.length; i++) {
                    addkey = addkey + (f.add.options[i].text) * (f.add.options[i].selected)
                }

                multkey = 0

                for (i = 0; i < f.mult.options.length; i++) {
                    multkey = multkey + (f.mult.options[i].text) * (f.mult.options[i].selected)
                    //if (i==3) alert(multkey +" + "+f.mult.options[i].text + " * " + f.mult.options[i].selected+" = "+(f.mult.options[i].text) * ( f.mult.options[i].selected));
                }

                multinverse = 1

                for (i = 1; i <= 25; i = i + 2) {
                    if ((multkey * i) % 26 == 1) {
                        multinverse = i
                    }
                }

                newword = ""

                for (i = 0; i < word.length; i++) {
                    code = word.charCodeAt(i) - 97
                    newcode = ((multinverse * (code + 26 - addkey)) % 26) + 97
                    newletter = String.fromCharCode(newcode)
                    newword = newword + newletter
                }

                f.p.value = newword.toLowerCase()
            }
        </script>

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
            <div class="affine">
                <h1 style="text-align:center">Affine Cipher Converter</h1><br>
                <div class="info" style="text-align:center;">
                    <p>The Affine cipher is a type of monoalphabetic substitution cipher, wherein each letter in an
                        alphabet is mapped to its numeric equivalent,<br> encrypted using a simple mathematical
                        function, and converted back to a letter.<br><br>The formula used means that each letter
                        encrypts to one other letter, and back again, meaning the cipher is essentially a standard
                        substitution cipher with a rule governing which letter goes to which.
                        <br>The whole process relies on working modulo m (the length of the alphabet used).<br><br> In
                        the affine cipher, the letters of an alphabet of size m are first mapped to the integers in the
                        range 0 … m-1.
                        The ‘key’ for the Affine cipher consists of 2 numbers, we’ll call them a and b. <br>The
                        following discussion assumes the use of a 26 character alphabet (m = 26). a should be chosen to
                        be relatively prime to m (i.e. a should have no factors in common with m).<br>
                        <br>
                        <h2><u>Encryption</u></h2><br>
                        It uses modular arithmetic to transform the integer that each plaintext letter corresponds to
                        into another integer that correspond to a ciphertext letter.<br><br>The encryption function for
                        a single letter is:
                        <br><br>
                        <b>E ( x ) = ( a x + b ) mod m</b>
                        <br>modulus m: size of the alphabet
                        <br>a and b: key of the cipher.
                        <i>(a must be chosen such that a and m are coprime.)</i>
                        <br>
                        <br>
                        <h2><u>Decryption</u></h2><br>
                        In deciphering the ciphertext, we must perform the opposite (or inverse) functions on the
                        ciphertext to retrieve the plaintext.<br>Once again, the first step is to convert each of the
                        ciphertext letters into their integer values. <br><br>The decryption function is:<br>
                        <br>
                        <b>D ( x ) = a^-1 ( x - b ) mod m</b>
                        <br>a^-1 : modular multiplicative inverse of a modulo m. <i>i.e., it satisfies the equation 1 =
                            a^-1 mod m .</i>
                        <br>
                        <br>
                        <h3><u>To find a multiplicative inverse:</u></h3><br>
                        We need to find a number x such that:<br>
                        If we find the number x such that the equation is true, then<br> x is the inverse of a, and we
                        call it a^-1. <br>The easiest way to solve this equation is to search each of the numbers 1 to
                        25, and see which one satisfies the equation.
                        <br><br><b>[g,x,d] = gcd(a,m)</b>
                        <br><br>
                        If you now multiply x and a and reduce the result (mod 26), you will get the answer 1.<br>
                        Remember, this is just the definition of an inverse i.e. if a*x = 1 (mod 26), then x is an
                        inverse of a (and a is an inverse of x)
                    </p><br>
                    <div>
                        <p>
                            <h3><b><u>Implmentation:</u></b></h3><br>Just one thing: this is not the final version so
                            <strong style="color:red;">do not enter numbers and symbols</strong> in the textbox! (only
                            alphabet allowed)
                        </p>
                        <br>
                        <form><b>Plaintext:</b><br><br>
                            <textarea name="p" rows="4" cols="50"
                                wrap="soft">Defend the east wall of the castle</textarea> <br><br>
                            <p><b>a</b>=
                                <select name="mult" size="1">
                                    <option>1</option>
                                    <option>3</option>
                                    <option>5</option>
                                    <option>7</option>
                                    <option>9</option>
                                    <option>11</option>
                                    <option>15</option>
                                    <option>17</option>
                                    <option>19</option>
                                    <option>21</option>
                                    <option>23</option>
                                    <option>25</option>
                                </select>
                                <b>b</b>=
                                <select name="add" size="1">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                </select>
                            </p>
                            <br>
                            <p><input name="btnEn" value="&#8595; Encrypt &#8595;" onclick="Encrypt(this.form)"
                                    type="button">
                                <input name="btnDe" value="&uarr; Decrypt &uarr;" onclick="Decrypt(this.form)"
                                    type="button"></p> <br>
                            <p><b>Ciphertext:</b><br> <br>
                                <textarea name="c" rows="4" cols="50"
                                    wrap="soft">wbgbuwyqbbhtynhkkzgyqbrhtykb</textarea> </p>
                        </form>
                    </div>
    </body>

    </html>