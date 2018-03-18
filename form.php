<?php


// Conditions for server side validation 

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

  // Get Form Data

  $name = $_POST['name'];
  $mailFrom = $_POST['email'];
  $message = $_POST['message'];

  $mailTo = "garry@wiredback.com";


  $emailBody = "Name: $name.\n".

                "Email: $mailFrom.\n".

                    "Message: $message.\n";



  $header = "From: $mailFrom";

  mail($mailTo, $emailBody, $header);

  header("Location: index.php");

} else {
  echo "Error: All fields are required to have a value";
}


 ?>
