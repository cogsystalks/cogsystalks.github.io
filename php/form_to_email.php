<?php
if(isset($_POST['submit'])){
  if(empty($_POST['name'])  ||
  empty($_POST['email']) ||
  empty($_POST['message']))
  {
    $errors .= "\n Error: all fields are required";
  }

  $to = "cogsystalks@gmail.com"; // this is your Email address
  $from = $_POST['email']; // this is the sender's Email address
  $first_name = $_POST['name'];
  $subject = "Form submission";
  $subject2 = "Copy of your form submission";
  $message = $first_name .  " wrote the following:" . "\n\n" . $_POST['message'];
  $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

  $headers = "From:" . $from;
  $headers2 = "From:" . $to;


  $response = mail($to,$subject,$message,$headers);
  mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender

  if($response)
  {
    echo "Thank you for showing an interest on this project," . $first_name . ". \n We will
    contact you shortly.";
  }
  else
  {
    echo "Sorry for the inconvenience" . $first_name . ". Try to send the email again.";
  }

}
?>
