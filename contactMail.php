<?php

require __DIR__.'./bibliotecas/PHPMailer/PHPMailer.php';
require __DIR__.'./bibliotecas/PHPMailer/SMTP.php';
require __DIR__.'./bibliotecas/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


date_default_timezone_set('America/Sao_Paulo');

$name = $email = $message = $subject = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$myDate = date('d/m/Y H:i:s');

if (isset($_POST['name']) && $_POST['name'] != null) {
$name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_SPECIAL_CHARS);
}
if (isset($_POST['email']) && $_POST['email'] != null) {
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
}
if (isset($_POST['message']) && $_POST['message'] != null) {
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
}
if (isset($_POST['subject']) && $_POST['subject'] != null) {
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
}

########################################## PHPMailer#############################################
$mail = new PHPMailer();

$mail->SMTPDebug = 2; //Enable verbose debug output
$mail->isSMTP(); //Send using SMTP
$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
$mail->SMTPAuth = true; //Enable SMTP authentication
$mail->Username = 'renatoguara2020@gmail.com'; //SMTP username
$mail->Password = 'agci'; // password is optional //SMTP password 
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port = 587;
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';



//Use a fixed address in your own domain as the from address
//**DO NOT** use the submitter's address here as it will be forgery
//and will cause your messages to fail SPF checks
$mail->setFrom('renatoguara2020@gmail.com', 'bootstrapfriendly');


$mail->addAddress('renatoguara2019@yahoo.com', 'bootstrapfriendly');
$mail->addAddress('renatoguara2023@gmail.com', 'bootstrapfriendly');
$mail->addAddress('gcreuza.alves@gmail.com', 'bootstrapfriendly');
$mail->addAddress('renatoguara2020@gmail.com', 'bootstrapfriendly');


//Put the submitter's address in a reply-to header
//This will fail if the address provided is invalid,
//in which case we should ignore the whole request
if ($mail->addReplyTo($_POST['email'], 'bootstrapfriendly')) {
$mail->Subject = 'Contact Request from bootstrapfriendly demo form';
//Keep it simple - don't use HTML
$mail->isHTML(true);
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<?php
$mail->Body = "
<table
    style=' border:5px solid #00ff00; width:440px; margin:auto; padding:15px; font-size:17px; border-radius:6px; background: linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)); background-size: contain; background-repeat: no-repeat; background-position: center; color:#222;'>
    <tr>
        <td style='padding:8px; border:1px solid #1111;'>Name:</td>
        <td style='padding:8px;border:1px solid #cccc;'> {$_POST['name']} </td>
    </tr>
    <tr>
        <td style='padding:8px; border:1px solid #ccc;'>Email ID :</td>
        <td style='padding:8px;border:1px solid #ccc;'> {$_POST['email']} </td>
    </tr>
    <tr>
        <td style='padding:8px; border:1px solid #ccc;'>Subject:</td>
        <td style='padding:8px;border:1px solid #ccc;'> {$_POST['subject']} </td>
    </tr>
    <tr>
        <td style='padding:8px; border:1px solid #ccc;'>Message:</td>
        <td style='padding:8px;border:1px solid #ccc;'> {$_POST['message']} </td>
    </tr>
    <tr>
        <td style='padding:8px; border:1px solid #ccc;'>Query Date :</td>
        <td style='padding:8px;border:1px solid #ccc;'> $myDate </td>
    </tr>
</table>
";
//Send the message, check for errors
if (!$mail->send()) {
//The reason for failing to send will be in $mail->ErrorInfo
//but you shouldn't display errors to users - process the error, log it on your server.
http_response_code(500);
echo "<div class='alert alert-danger'>Sorry, something went wrong. Please try again later.</div>";
} else {

echo "<div class='alert alert-success' role='alert'>message sent successfully </div>";
}
} else {

echo "<b class='text-danger'>Invalid email address, message ignored.</b>";
}

} else {
echo "<b class='text-danger'>Sorry, something went wrong. Please try again later.</b>";
}

header('Location:http://localhost/car-repair-html-template/contact.html')
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
</body>

</html>