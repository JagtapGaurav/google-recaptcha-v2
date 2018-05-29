<?php
include"class.phpmailer.php";
include"class.smtp.php";
include"sendmail.php";


    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '------------- secret key ------------',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        
        echo "
        <script>
	         alert('Please click on the reCAPTCHA box');
       	</script>";
        
        
    } else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        if(isset($_POST['subbtn']))
        {
            $emailid="-----------email id -------------";
         
          $name=ucwords(strtolower(trim($_POST['name'])));
          $mail_header="Client Information";
          $subject="Inquiry On Website Message from:".$name;

          $maildata="Name : ".$_POST['name']." ";
            $email_send_id="-------------   email id ------------";
            sendemail($email_send_id,$mail_header,$emailid,"",$subject,$maildata,"");
        }
    }
?>