<?php
$email_address = filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL);

// Check for empty fields
if(empty($_POST['user_name'])  		||
   empty($_POST['user_email']) 		||
   empty($_POST['contact_number']) 		||
   empty($_POST['message'])	|| 
   !$email_address)
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['user_name'];
if ($email_address === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$contact_number = $_POST['contact_number'];
$message = $_POST['message'];

if (empty($_POST['_gotcha'])) { // If hidden field was filled out (by spambots) don't send!
    // Create the email and send the message
    $to = '반려 개발자'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    $email_subject = "Website Contact Form:  $name";
    $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: coco5855@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
    return true;
}
echo "Gotcha, spambot!";
return false;
?>
