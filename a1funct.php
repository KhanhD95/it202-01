<?php
 
/*
sql($type, $name, $s1, $s2);

$out1 = get_A($type, $s1);
print $out1;

$out1 = get_T($type, $s2);
print $out1;
*/

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); //error checking
  
ini_set('display_errors' , 1);

/*
function sql($type, $name, &$s1, &$s2)
{
 if ($type != 'A')  {$s1 = "select * from prototype1 where user = '$name'";}
 if ($type == 'A')  { $s1 = "select * from prototype1 ";}
 
 if ($type != 'A') {$s2 = "select * from prototype1TableT where user = '$name'";}
 if ($type == 'A') {$s2 = "select * from prototype1TableT ";}

}
*/
 
function get_case ($name, $pass, $amount, $type)

//stop if type doesnt make sense
{
	echo "user: $name, pass: $pass, amount: $amount, type: $type<br>";
//echo "<br>Entered get_case function.<br>";
	return $type;
	
	if ($type != "A" || $type != "D" || $type !="W")
	{
		echo "<br>Invalid type.";
	}
	
	else
	{
		exit;
	}
	
}

function admin ($name, $pass, $email, $address, $initial_balance, $current_balance)

//exit if bad credentials
{
	$fetch = ("SELECT * FROM prototype1 WHERE user = '$name' AND pass = '$pass'"); 
	$t = mysql_query($fetch);
	$rows = mysql_num_rows($t);
	
	if($rows !=0)
	{	
		
		if($name == "admin" && $pass == "007")
		{
			echo "You are the admin.<br><br>";

			while($r = mysql_fetch_array($t))
			{
				
				$user = $r ["user"];
				$email = $r ["email"];
				$current_balance = $r ["current_balance"];
				$result .= "<br>User is: $user";
				$result .= "<br>Current balance is: $$current_balance";
				
			}
						
			if (isset ($_GET["email"]))
			{
				$to 		= "thespecialnamewhatever@mailinator.com";
				$Subject 	= "...";
				$message    = "Hello<br>How are you?";
				$headers = 'MIME-Version: 1.0';
				$headers = 'Content-type: text/html; charset=iso-8859-1';
				$result .= "<br>Email is: $email";
				mail ( $to, $subject, $message , $headers );
			}
			
			echo $result;
		}		
	}
	
	else
	{
		die ("<br>Incorrect credentials.");
	}
}


function user ( $name, $pass, $amount, $type, $email ) 
{
	//exit if bad user crendtials
	
	$fetch = ("SELECT * FROM prototype1 WHERE user = '$name' AND pass = '$pass'"); 
	echo $fetch;
	$t = mysql_query($fetch);
	$rows = mysql_num_rows($t);
	
	if($rows !=0)
	{	
		echo "<br><br>You are the user.";	
		
		while($r = mysql_fetch_array($t))
			
		{
				
		$user = $r ["user"];
		$email = $r ["email"];
		$result .= "<br>User is: $user";
		$result .= "<br>Type is: $type";
		$result .= "<br>Amount is: $$amount";
		$result .= "<br>Date: "  . date("Y/m/d" . "<br><br>"); 
				
		}
		
		if (isset ($_GET["email"]))
			{
				$to 		= "j66@mailinator.com";
				$Subject 	= "...";
				$message    = "Hello<br>How are you?";
				$headers = 'MIME-Version: 1.0';
				$headers = 'Content-type: text/html; charset=iso-8859-1';
				$result .= "<br>Email is: $email";
				mail ( $to, $subject, $message , $headers );
			}
		
		echo $result;
	}
	
	else
	{
		die ("<br>Incorrect credentials.");
	}

}

function update ($name, $amount, $type)
{
//change a row in A - use an update SQL
	
	$s = "insert into prototype1TableT values ( '$name', '$type', '$amount', NOW())";
	echo "<br>SQL insert to prototype1TableT: $s.";
	mysql_query ($s) or die (mysql_error());
	
	if($type == 'D')
	{
		$s = "update prototype1TableT Set amount = amount + '$amount' where user = '$name' " ;
		echo "<br>SQL update of prototype1TableT: $s." ;
		mysql_query ($s) or die (mysql_error() );
	}
	else
	{
		$s = "update prototype1 Set current_balance = current_balance - '$amount' where user = '$name' " ;
		echo "<br>SQL update of prototype1: $s." ;
		mysql_query ($s) or die (mysql_error() );
	}	
}

/*function get_A
function get_A ( $type, $s1 ) 
{
	$out =  "<br> \$s1 is:    $s1 <br>";
	($t  = mysql_query($s1)) or die (  mysql_error() );
	while ( $r = mysql_fetch_array($t) ) 
  {
	   $user  = r["user"];
	   $mail  = r["email"];
     $current_balance = r["current_balance"];  
	   $out  .= "<br>user is $user";
	   $out  .= "<br>mail is $email";
     $out  .= "<br>current balance is $current_balance";
    }
	return $out;

}
*/
/*function get_t
function get_T($type, $s2)
{
 $out =  "<br> \$s1 is:    $s1 <br>";
	($t  = mysql_query($s2)) or die (  mysql_error() );
	while ( $r = mysql_fetch_array($t) ) 
  {
	   $user  = r["user"];
	   $type  = r["type"];
	   $out  .= "<br>user is $user";
	   $out  .= "<br>mail is $email";
    }
	return $out;
}
*/
?>