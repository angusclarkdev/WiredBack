<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdlX00UAAAAAJkIsbWtYKDoJt1tJ8kYb_XOTxIu',
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
        echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
    } else {
        // If CAPTCHA is successfully completed...

        $name = $_POST['name'];
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];
        $subject = '';

        $mailTo = "garry@wiredback.com";


        $emailBody = "Name: $name.\n \n".

                      "Email: $mailFrom.\n \n \n \n".

                          "$message.\n";



        $header = "From: ".$mailTo;



        mail($mailTo, $subject, $emailBody, $header);

        echo '<br><p>Thanks for the inquiry. We\'ll get back to you soon. </p><br>';
    }
