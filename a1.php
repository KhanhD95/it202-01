<?php
include ("a1funct.php");
include ("account.php");
include ("email.php");
 
( $dbh = mysql_connect ( $hostname, $username, $password ) )
       or die ( "Unable to connect to MySQL database" );

print "<b>Results from connection.php with data from a1.html</b><br>";	   
mysql_select_db($project);
print "Successfully connected to MySQL. <br><br><br>";

//input
$name = $_GET ["user"];
$pass = $_GET ["pass"];
$amount = $_GET["amount"];
$type = $_GET["type"];

//protection
$type = get_case ( $name, $pass, $amount, $type, $email );
if ($type == 'A') admin ($name, $pass);
if ($type != 'A') user ($name, $pass, $amount, $type);

//update
if ($type != 'A') update ($name, $amount, $type);

//show

//mail

?>