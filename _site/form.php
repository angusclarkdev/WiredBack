<?php

//error_reporting(-1);
ini_set('display_errors', 'On');
//set_error_handler("var_dump");

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
        echo '<div style="text-align: center;"><h1 style="color:#1A4A9B;font-size:2rem;">Please go back and make sure you check the security CAPTCHA box.</h1><br><br><img src="/images/logo.png"/></div>';
    } else {
        // If CAPTCHA is successfully completed...


        // Verify data



        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["name"]) && empty($_POST["email"]) && empty($_POST["message"])) {  // If field is empty
              echo '<div style="text-align: center;"><h1 style="color:#1A4A9B;font-size:2rem;">Sorry, all fields are required. Please go back and retry.</h1><br><br><img src="/images/logo.png"/></div>';
            } else {

              $name = test_input($_POST["name"]);

              $mailFrom = test_input($_POST["email"]);

              // check if e-mail address is well-formed

              if (!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {

                echo  '<div style="text-align: center;"><h1 style="color:#1A4A9B;font-size:2rem;">Invalid email format</h1><br><br><img src="/images/logo.png"/></div>';

                die();
    }
              $message = test_input($_POST['message']);
              $subject = "";

            }
        }



        $mailTo = "angusclark93@gmail.com"; //  Even gmail works!
        $server = "test@angusclark.me";

        if (preg_match("(\r|\n)i",$server)) {

            die();
}
        $emailBody = "Name: $name.\n \n".

                      "Email: $mailFrom.\n \n \n \n".

                          "$message.\n";



        $headers = "From: ".$server;  // 'From' needs to be an email address registered




        mail($mailTo, $subject, $emailBody, $headers);

        echo '<div style="text-align: center;"><h1 style="color:#1A4A9B;font-size:2rem;"> Thanks for the inquiry. We\'ll get back to you soon. </h1><br><br><img src="/images/logo.png"/></div>';
    }

    function test_input($data) {

          $data = stripslashes($data);
          $data = htmlspecialchars($data);

        return $data;
}
