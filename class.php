//MAIN
 
sql($type, $name, $s1, $s2);

$out1 = get_A($type, $s1);
print $out1;

$out1 = get_T($type, $s1);
print $out1;



error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); //error checking
  
ini_set('display_errors' , 1);


//FUNCTIONS FILE

function sql($type, $name, &$s1, &$s2)
{
 IF TYPE NOT 'A' THEN $s1 = "select * from prototype1 where user = '$name'";
 IF TYPE 'A'     THEN $s1 = "select * from prototype1 ";
 
 IF TYPE NOT 'A' THEN $s1 = "select * from prototype1TableT where user = '$name'";
 IF TYPE 'A'     THEN $s1 = "select * from prototype1TableT ";


}


function get_A ( $s1 ) {
	$out =  "<br> \$s1 is:    $s1 <br>";
	($t  = mysql_query($s1)) or die (  mysql_error() );
	while ( $r = mysql_fetch_array($t) ) 
  {
	   $user  = r["user"];
	   $mail  = r["email"];
	   $out  .= "<br>user is $user";
	   $out  .= "<br>mail is $email";
    }
	return $out;

}


//function get_T()













	//MAIL  FEATURE:

	//in HTML     name = "mailrequest"             //You need an html checkbox on the form. If checked the scriptshould send the mail.
	//in PHP 		isset ( $_GET ["mailrequest"] )


	if ( isset ( $_GET ["email"]  ) ) {
  
  $to 		= "j66@njit.edu";
	$Subject 	= "...";
	$message    = "Hello<br>How are you?";
  $headers = 'MIME-Version: 1.0';
  $headers = 'Content-type: text/html; charset=iso-8859-1';
	
	mail ( $to, $subject, $message , $headers );
	

//HTML: checkbox: <input type=checkbox name="mailresult">mail?;
//PHP: if (isset ($_GET["mailresult"])) {---,---,---};
  
  }; 
	


