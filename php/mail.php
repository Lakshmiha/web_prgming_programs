<?php
	$to="harilaksh.i2003@gmail.com";
	$subject="Test email";
	$message="Hi,buddy...Nice to meet you!!";
	$headers="From:harilaksh.i2003@gmail.com";
	if(mail($to,$subject,$message,$headers))
	{
		echo"Email sent successfully!!.";
	}
	else
	{
		echo"Failed to send email.";
	}
?>