<?php
$db_user = "root"; // Username
$db_pass = "root"; // Password
$db_database = "freza.us"; // Database Name
$db_host = "localhost"; // Server Hostname
$db_connect = mysql_connect ($db_host, $db_user, $db_pass); // Connects to the database.
$db_select = mysql_select_db ($db_database); // Selects the database.
 
function form($data) { // Prevents SQL Injection
   global $db_connect;
   //$data = preg_replace("[\')(;|`,<>]", "", $data);
   $data = mysql_real_escape_string(trim($data), $db_connect);
   return stripslashes($data);
}
?>
