<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>
</head>

<body>

<p>
	Dear <?php echo $_POST['firstname']; ?> <?php echo $_POST['lastname']; ?>
</P>
<p>
	Thank you for contacting us. 
</P>
<p>
	We have you interest info <?php echo $_POST['interests']; ?>
</P>
<p>
	You have shared the following comments which we will review:
	<p><?php echo $_POST['inputMessage']; ?></p>
</P>
	

<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "support@leosaraivafilho.com";
    $to = $_POST['emailAddress'] . ',';  
    $to .=  "support@leosaraivafilho.com";    
    $personal_mail = "leosaraivafilho@outlook.com";
    $subject = "Happy Hands DayCare Contact Us";
    date_default_timezone_set('America/Chicago');  
    $DateAndTime = date('m-d-Y h:i:s a', time()); 
    $message = "PHP mail works just fine";
    $firstname = $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $interest = $_POST['interests'];
    $coment = $_POST['inputMessage'];  
    $message = "
   Dear $firstname.	
   
	Thank you for contacting us.
	
	We have your interest info about $interest.
	
	You have shared the following comments which we will review:
	
	$coment
	
	
	
	This e-mail was sent on $DateAndTime.
		";      
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers))
    {
 echo "<br><br><center><b><font color='green'>Message sent successfully!";
} 
 else
 {
 echo "<br><br><center><b><font color='red'>An error occurred while sending the message!";
}
    

?>


</body>
</html>