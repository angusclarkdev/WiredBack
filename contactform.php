<?php

// Get Form Data

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['message'];

  $mailTo = 'dingus_clark_@hotmail.co.uk';
  $headers = "From: ".$mailFrom;
  $txt = "You have received an email from ".$name.".\n\n".$message;

  mail($mailTo, $txt, $headers);
  header("Location: index.html?mailsent");

}





 ?>
