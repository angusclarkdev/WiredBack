<?php

// Get Form Data

$mailTo = "garry@wiredback.com";

$name = $_POST['name'];
$mailFrom = $_POST['mail'];
$message = $_POST['message'];


$mailSubject = "New Form Submission";

$emailBody = "Name: $name.\n".

              "Email: $mailFrom.\n".

                  "Message: $message.\n";



$header = "From: $mailFrom";

mail($mailTo, $emailBody, $header);

header("Location: index.php");

 ?>
