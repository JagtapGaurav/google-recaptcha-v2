<?php



function sendemail($frmid,$frmname,$toid,$toname,$sub,$message,$attachment,$attach_name='',$encoding='',$attach_type='')



{



$mail = new PHPMailer();



$mail->IsSMTP();



$mail->SMTPDebug = 0; // 1 tells it to display SMTP errors and messages, 0 turns off all errors and messages, 2 prints messages only.



$mail->SMTPAuth = true;



$mail->SMTPSecure = "";//"tls";



$mail->Host = "host address";//host address



$mail->Port = 587;







$mail->Username = "username";//username



$mail->Password = "password";//password







$mail->From = $frmid;



$mail->FromName = $frmname;



$mail->AddAddress($toid,$toname);



//$mail->AddReplyTo("Email Address HERE", "Name HERE"); // Adds a "Reply-to" address. Un-comment this to use it.



$mail->Subject = $sub;





$mail->Body = $message;



//-------added for leave app & leave authorisation email sending

$mail->IsHTML(true);

//--------------------------------------------------------------



//to send attachment with mail

if(trim($attachment)!='')

{

		//$mail->AddAttachment($attachment,'automail.pdf','base64', 'application/pdf');

		$mail->AddAttachment($attachment,$attach_name,$encoding,$attach_type);

}		

$mail->Send();



/*if($mail->Send()== true) {



echo "The message has been sent";



}



else {



echo "The email message has NOT been sent for some reason. Please try again later.";



echo "Mailer error: " . $mail->ErrorInfo;



}*/



}



 ?>