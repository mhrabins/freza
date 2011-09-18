<html>
  <head>
  <link rel="stylesheet" type="text/css" href="style1.css" />
  <link rel="shortcut icon" href="http://www.freza.us/favicon.jpg" />

    <title>Freza.us</title>
  </head>
  <body>
  <p>&nbsp;</p>
  <p><br />
    <br />
  </p>
  <table cellpadding="2" cellspacing="0" border="0" align="center">

    <tr>
      <td align="center">
        <a><img src="uomo_universale.jpeg" alt="uomo_univerale" border="0"/></a>
      </td>
    </tr>
     <tr><td align="center" font><font size="1" color="#0d3724" face="Charlemagne Std"><a href="login.php">Login</a> / <a href="register.php">Register</a></font></td></tr>
 
</table>
<br />
<table align="center">    
    <tr>
      <td>
<?php
include("conf.inc.php"); // Includes the db and form info.
if (!isset($_POST['submit'])) { // If the form has not been submitted.
    echo "<form action=\"register.php\" method=\"POST\">";
    echo "<table>";
    echo "<tr>";
    echo "<td colspan=\"2\"></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td width=\"50%\">Username:</td><td width=\"50%\"><input name=\"username\" size=\"18\" type=\"text\" />";
    echo "</tr>";
    echo "<tr>";
    echo "<td width=\"50%\">Password:</td><td width=\"50%\"><input name=\"password\" size=\"18\" type=\"text\" />";
    echo "</tr>";
    echo "<tr>";
    echo "<td width=\"50%\">Email:</td><td width=\"50%\"><input name=\"email\" size=\"18\" type=\"text\" />";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"submit\"</td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
} else { // The form has been submitted.
    $username = form($_POST['username']);
    $password = md5($_POST['password']); // Encrypts the password.
    $email = form($_POST['email']);
 
    if (($username == "") || ($password == "") || ($email == "")) { // Checks for blanks.
        exit("There was a field missing, please correct the form.");
    }
 
    $q = mysql_query("SELECT * FROM `users` WHERE username = '$username' OR email = '$email'") or die (mysql_error()); // mySQL Query
    $r = mysql_num_rows($q); // Checks to see if anything is in the db.
 
    if ($r > 0) { // If there are users with the same username/email.
        exit("That username/email is already registered!");
    } else {
        mysql_query("INSERT INTO `users` (username,password,email) VALUES ('$username','$password','$email')") or die (mysql_error()); // Inserts the user.
        header("Location: login.php"); // Back to login.
    }
}
mysql_close($db_connect); // Closes the connection.
?>
     </td>
   </tr> 
</table> 
  </body>
</html>