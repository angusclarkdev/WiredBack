<?php

// Get Form Data
/*
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['message'];

  $mailTo = 'dingus_clark_@hotmail.co.uk';
  $headers = "From: ".$mailFrom;
  $txt = "You have received an email from ".$name.".\n\n".$message;

  mail($mailTo, $txt, $headers);
};
*/

$name = $_POST['name'];
$mailFrom = $_POST['mail'];
$message = $_POST['message'];


$mailSubject = "New Form Submission";

$emailBody = "Name: $name.\n".

              "Email: $mailFrom.\n".

                  "Message: $message.\n".;

$mailTo = "support@wiredback.com";

$header = "From: $mailFrom";

mail($mailTo, $emailBody, $header);

header("Location: index.html");
 ?>
