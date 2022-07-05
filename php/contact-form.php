<?php
/**
 * PHP version 7.3
 * 
 * @category None
 * @package  None
 * @author   "Audrey Borges <audrey@audreyborges.com>
 * @license  https://www.audreyborges.com/ GNU General Public License
 * @link     https://www.audreyborges.com/
 */

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$email_from = 'audreyborges7@gmail.com';

$email_subject = "New Form submission";

$email_body = "You have received a new message from the user $name.\n".
"Here is the message:\n $message".
$to = "audreyborges7@gmail.com";

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";

mail($to, $email_subject, $email_body, $headers);
header('Location: thank-you.php')
?>