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
$servername = "localhost";
$username = "1142513";
$password = "59WR.D!tgXBYK.D";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>