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

if (!isset($_POST['submit'])) {
    echo "Error. Please submit the form.";
}

if (isset($_POST['name'])) {

    $name = $_POST['name'];
}

$name = isset($_POST['name']) ? $_POST['name'] : '';
$visitor_email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

if (empty($name) || empty($phone) || empty($visitor_email)) {
    echo " Please enter your name, phone number and email.";
    exit;
}

$sql = "INSERT INTO contact_form_info (name, email, phone, comments) VALUES ('".$name."','".$visitor_email."', '".$phone."', '".$message."')";

$email_from = 'audrey@audreyborges.com';
$email_subject = "New Form Submission";
$email_body = "You have received a new message from $name.\n"."email address: $visitor_email\n".
"Here is the message: \n $message";

$to = "audrey@audreyborges.com";
$headers = "From: $email_from \r\n";
'Reply-To: audrey@audreyborges.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $email_subject, $email_body, $headers);

header('Location: thank-you.php');
exit();
?>