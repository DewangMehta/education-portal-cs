<?php
 
$post_data = file_get_contents("config.php");
$data = json_decode($post_data);
 
//Just to display the form values
echo "Name : " . $data->name;
echo "Email : " . $data->email;
echo "Message : " . $data->message;
 
// send an email
$to = $data->email;
 
$subject = 'Test email from eduportal.com to test angularjs contact form';
 
$message = $data->message;
 
$headers = 'From: ' . $data->name . 'submit@eduportal.com' . "\r\n" .
        'Reply-To: sdc@eduportal.com. "\r\n" .
        'X-Mailer: PHP/' . phpversion();
 
//php mail function to send email on your email address
mail($to, $subject, $message, $headers);
 
?>