<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include Composer autoload
require 'vendor/autoload.php';

// Your email configuration
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_username = 'emeriebow78@gmail.com';
$smtp_password = 'bmoyqgmodswblekp';

$name = $_POST['contact_name'];
$email = $_POST['contact_email'];
$message = $_POST['contact_message'];

// Sender's email and name
$sender_email = $email;
$sender_name = $name;

// Recipient's email
$recipient_email = 'emeriebow78@gmail.com';

// Get form data
$name = $_POST['contact_name'];
$email = $_POST['contact_email'];
$message = $_POST['contact_message'];
// Add other form fields as needed

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = $smtp_host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_username;
    $mail->Password   = $smtp_password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $smtp_port;

    // Sender information
    $mail->setFrom($sender_email, $sender_name);

    // Recipient information
    $mail->addAddress($recipient_email);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Form Submission';

    // Build the email body as an HTML table
    $emailBody = '<table border="1">';
    $emailBody .= "<tr><th>Field</th><th>Value</th></tr>";
    $emailBody .= "<tr><td>Name</td><td>$name</td></tr>";
    $emailBody .= "<tr><td>Email</td><td>$email</td></tr>";
    $emailBody .= "<tr><td>Message</td><td>$message</td></tr>";
    // Add other form fields as needed
    $emailBody .= '</table>';

    $mail->Body = $emailBody;

    // Send the email
    $mail->send();
    echo 'Message has been sent successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
