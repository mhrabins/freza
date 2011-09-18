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
session_start(); // Starts the session.
if ($_SESSION['logged'] == 1) { // User is already logged in.
    header("Location: logged.php"); // Goes to main page.
    exit(); // Stops the rest of the script.
} else {
    if (!isset($_POST['submit'])) { // The form has not been submitted.
        echo "<form action=\"login.php\" method=\"POST\">";
        echo "<table>";
        echo "<tr>";
        echo "<td colspan=\"2\">Login:</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td width=\"50%\">Username:</td><td width=\"50%\"><input name=\"username\" size=\"18\" type=\"text\" />";
        echo "</tr>";
        echo "<tr>";
        echo "<td width=\"50%\">Password:</td><td width=\"50%\"><input name=\"password\" size=\"18\" type=\"text\" />";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"submit\"</td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
    } else {
        $username = form($_POST['username']);
        $password = md5($_POST['password']); // Encrypts the password.
 
        $q = mysql_query("SELECT * FROM `users` WHERE username = '$username' AND password = '$password'") or die (mysql_error()); // mySQL query
        $r = mysql_num_rows($q); // Checks to see if anything is in the db. 
 
        if ($r == 1) { // There is something in the db. The username/password match up.
            $_SESSION['logged'] = 1; // Sets the session.
            header("Location: logged.php"); // Goes to main page.
            exit(); // Stops the rest of the script.
        } else { // Invalid username/password.
            exit("Incorrect username/password!"); // Stops the script with an error message.
        }
    }
}
mysql_close($db_connect); // Closes the connection.
?>
     </td>
   </tr> 
</table> 
  </body>
</html>