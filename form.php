<?php

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Lf7jk0UAAAAAOdSxUtcyNf0nuM7lzw0sx3LU3RZ',
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
        echo '<h2>Please go back and make sure you check the security CAPTCHA box.</h2><br>';
    } else {
        // If CAPTCHA is successfully completed...

        $name = $_POST['name'];
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];
        $subject = '';

        $mailTo = "angusclark93@gmail.com"; //  Even gmail works!
        $server = "test@angusclark.me";

        $emailBody = "Name: $name.\n \n".

                      "Email: $mailFrom.\n \n \n \n".

                          "$message.\n";



        $headers = "From: ".$server;  // 'From' needs to be an email address registered




        mail($mailTo, $subject, $emailBody, $headers);

        echo '<br><p>Thanks for the inquiry. We\'ll get back to you soon. </p><br>';
    }
